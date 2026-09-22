<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class CreateSuperuser extends Command
{
    protected $signature = 'app:create-superuser
        {--username= : Login username}
        {--email= : Email address}
        {--first-name= : First name}
        {--last-name= : Last name}
        {--mobile= : Mobile number}
        {--password= : Password (prefer the secure interactive prompt)}
        {--force : Update an existing account without confirmation}';

    protected $description = 'Create or update a superuser and grant every registered permission';

    public function handle(): int
    {
        $username = trim((string) ($this->option('username') ?: $this->ask('Username', 'admin')));
        $existing = User::where('username', $username)->first();

        if ($existing && !$this->option('force') && !$this->confirm(
            "User '{$username}' already exists. Update it and grant full access?"
        )) {
            $this->info('No changes were made.');

            return self::SUCCESS;
        }

        $email = trim((string) ($this->option('email') ?: $this->ask(
            'Email address',
            $existing?->email ?: 'admin@example.com'
        )));
        $firstName = trim((string) ($this->option('first-name') ?: $this->ask(
            'First name',
            $existing?->first_name ?: 'Super'
        )));
        $lastName = trim((string) ($this->option('last-name') ?: $this->ask(
            'Last name',
            $existing?->last_name ?: 'Admin'
        )));
        $mobile = trim((string) ($this->option('mobile') ?: $this->ask(
            'Mobile number (optional)',
            $existing?->mobile
        )));
        $password = (string) ($this->option('password') ?: $this->secret(
            $existing ? 'New password (leave blank to keep current password)' : 'Password'
        ));

        $validator = Validator::make([
            'username' => $username,
            'email' => $email,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'mobile' => $mobile ?: null,
            'password' => $password ?: null,
        ], [
            'username' => [
                'required', 'string', 'min:3', 'max:255',
                Rule::unique('users', 'username')->ignore($existing?->id),
            ],
            'email' => [
                'required', 'email', 'max:255',
                Rule::unique('users', 'email')->ignore($existing?->id),
            ],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'mobile' => [
                'nullable', 'string', 'max:30',
                Rule::unique('users', 'mobile')->ignore($existing?->id),
            ],
            'password' => [$existing ? 'nullable' : 'required', 'nullable', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::FAILURE;
        }

        DB::transaction(function () use (
            $existing,
            $username,
            $email,
            $firstName,
            $lastName,
            $mobile,
            $password
        ) {
            $user = $existing ?: new User();
            $user->name = trim($firstName . ' ' . $lastName);
            $user->fill([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'username' => $username,
                'email' => $email,
                'mobile' => $mobile ?: null,
                'status' => 1,
                'is_seller' => 0,
            ]);

            if ($password !== '') {
                $user->password = Hash::make($password);
            }

            $user->save();

            $role = Role::firstOrCreate([
                'name' => 'super-admin',
                'guard_name' => 'web',
            ]);
            $role->syncPermissions(Permission::where('guard_name', 'web')->get());
            $user->syncRoles([$role]);
        });

        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $this->newLine();
        $this->info("Superuser '{$username}' is ready with all registered permissions.");

        return self::SUCCESS;
    }
}
