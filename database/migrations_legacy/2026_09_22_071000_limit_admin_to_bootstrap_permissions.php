<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

return new class extends Migration
{
    private const PERMISSIONS = [
        'dashboard.access',
        'permission.create', 'permission.delete', 'permission.edit', 'permission.view',
        'role.create', 'role.delete', 'role.edit', 'role.view',
    ];

    public function up(): void
    {
        $role = Role::where('name', 'admin')->where('guard_name', 'web')->first();

        if (!$role) {
            return;
        }

        $role->syncPermissions(
            Permission::where('guard_name', 'web')
                ->whereIn('name', self::PERMISSIONS)
                ->get()
        );

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }

    public function down(): void
    {
        // Permission reductions are intentionally irreversible.
    }
};
