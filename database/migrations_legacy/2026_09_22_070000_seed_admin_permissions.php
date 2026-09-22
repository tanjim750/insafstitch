<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

return new class extends Migration
{
    private const PERMISSIONS = [
        'category.create', 'category.delete', 'category.edit', 'category.view',
        'color.view',
        'combo.create', 'combo.delete', 'combo.edit', 'combo.view',
        'coupon_codes.create', 'coupon_codes.delete', 'coupon_codes.edit',
        'couriers.view',
        'dashboard.access',
        'delivery_charge.create', 'delivery_charge.delete', 'delivery_charge.edit', 'delivery_charge.view',
        'discount.create', 'discount.delete', 'discount.edit', 'discount.view',
        'image.create', 'image.delete', 'image.edit', 'image.view',
        'order.create', 'order.delete', 'order.edit', 'order.view', 'order.view_all',
        'page.view',
        'permission.create', 'permission.delete', 'permission.edit', 'permission.view',
        'product.create', 'product.delete', 'product.edit', 'product.view',
        'purchase.create', 'purchase.delete', 'purchase.edit', 'purchase.view',
        'role.create', 'role.delete', 'role.edit', 'role.view',
        'size.create', 'size.delete', 'size.edit', 'size.view',
        'slider.create', 'slider.delete', 'slider.edit', 'slider.view',
        'type.create', 'type.delete', 'type.edit', 'type.view',
        'user.create', 'user.delete', 'user.edit', 'user.view',
    ];

    private const ADMIN_BOOTSTRAP_PERMISSIONS = [
        'dashboard.access',
        'permission.create', 'permission.delete', 'permission.edit', 'permission.view',
        'role.create', 'role.delete', 'role.edit', 'role.view',
    ];

    public function up(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = collect(self::PERMISSIONS)->map(
            fn (string $name) => Permission::firstOrCreate([
                'name' => $name,
                'guard_name' => 'web',
            ])
        );

        $adminRole = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        $adminRole->syncPermissions(
            $permissions->whereIn('name', self::ADMIN_BOOTSTRAP_PERMISSIONS)
        );
        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }

    public function down(): void
    {
        // Authorization bootstrap data is intentionally preserved.
    }
};
