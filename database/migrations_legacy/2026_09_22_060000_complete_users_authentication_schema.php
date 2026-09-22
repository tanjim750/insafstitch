<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('users', 'name')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('name')->nullable()->change();
            });
        }

        if (Schema::hasColumn('users', 'email')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('email')->nullable()->change();
            });
        }

        $missing = fn (string $column): bool => !Schema::hasColumn('users', $column);

        Schema::table('users', function (Blueprint $table) use ($missing) {
            if ($missing('first_name')) $table->string('first_name')->nullable();
            if ($missing('last_name')) $table->string('last_name')->nullable();
            if ($missing('username')) $table->string('username')->nullable()->unique();
            if ($missing('mobile')) $table->string('mobile', 30)->nullable()->unique();
            if ($missing('business_name')) $table->string('business_name')->nullable();
            if ($missing('image')) $table->string('image')->nullable();
            if ($missing('status')) $table->boolean('status')->default(true)->index();
            if ($missing('is_seller')) $table->boolean('is_seller')->default(false)->index();
            if ($missing('type')) $table->string('type', 30)->nullable();
        });

        $usedUsernames = DB::table('users')
            ->whereNotNull('username')
            ->pluck('username')
            ->filter()
            ->flip()
            ->all();

        $nameExpression = Schema::hasColumn('users', 'name') ? 'name' : DB::raw('NULL as name');
        $emailExpression = Schema::hasColumn('users', 'email') ? 'email' : DB::raw('NULL as email');

        DB::table('users')
            ->select(['id', $nameExpression, $emailExpression, 'username'])
            ->whereNull('username')
            ->orderBy('id')
            ->chunkById(100, function ($users) use (&$usedUsernames) {
                foreach ($users as $user) {
                    $base = Str::slug((string) ($user->name ?: Str::before((string) $user->email, '@')), '');
                    $base = $base ?: 'user' . $user->id;
                    $username = $base;
                    $suffix = 1;

                    while (isset($usedUsernames[$username])) {
                        $username = $base . $suffix++;
                    }

                    DB::table('users')->where('id', $user->id)->update([
                        'username' => $username,
                        'first_name' => $user->name,
                    ]);
                    $usedUsernames[$username] = true;
                }
            });
    }

    public function down(): void
    {
        // Compatibility migrations are intentionally irreversible.
    }
};
