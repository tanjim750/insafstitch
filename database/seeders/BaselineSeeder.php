<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class BaselineSeeder extends Seeder
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

    private const ADMIN_PERMISSIONS = [
        'dashboard.access',
        'permission.create', 'permission.delete', 'permission.edit', 'permission.view',
        'role.create', 'role.delete', 'role.edit', 'role.view',
    ];

    public function run(): void
    {
        $now = now();

        DB::table('informations')->updateOrInsert(
            ['id' => 1],
            ['site_name' => 'trizync-solution', 'updated_at' => $now, 'created_at' => $now]
        );

        DB::table('admin_texts')->updateOrInsert(['id' => 1], [
            'popular_category_title' => 'Popular Categories',
            'view_all_text' => 'View All',
            'add_to_cart_text' => 'Add to Cart',
            'order_now_text' => 'Order Now',
            'product_code_label' => 'Product Code',
            'courier_delivery_title' => 'Delivery Charge',
            'short_description_title' => 'Short Description',
            'updated_at' => $now,
            'created_at' => $now,
        ]);

        DB::table('bangla_text')->updateOrInsert(['id' => 1], [
            'checkout_form_top_text' => 'Checkout',
            'name_text' => 'Name',
            'mobile_text' => 'Mobile',
            'address_text' => 'Address',
            'delivery_text' => 'Delivery Area',
            'order_confirm_text' => 'Confirm Order',
            'order_text' => 'Order Now',
            'cart_text' => 'Add to Cart',
            'fshipping_text' => 'Free Shipping',
        ]);

        $this->seedOrderStatuses($now);
        $this->seedCatalogDefaults($now);
        $this->seedAuthorization();
    }

    private function seedOrderStatuses(mixed $now): void
    {
        foreach (OrderStatus::defaults() as $status) {
            DB::table('order_statuses')->updateOrInsert(
                ['slug' => $status['slug']],
                array_merge([
                    'status_group' => 'active',
                    'badge_class' => 'bg-secondary',
                    'sort_order' => 999,
                    'is_active' => true,
                    'is_default' => true,
                    'counts_as_active' => false,
                    'counts_as_delivered' => false,
                    'counts_as_cancelled' => false,
                    'counts_as_return' => false,
                    'counts_as_shipped' => false,
                    'marks_payment_paid' => false,
                    'restores_stock' => false,
                    'reduces_stock' => false,
                    'sms_key' => null,
                    'created_at' => $now,
                    'updated_at' => $now,
                ], $status)
            );
        }
    }

    private function seedCatalogDefaults(mixed $now): void
    {
        DB::table('colors')->updateOrInsert(
            ['id' => 1],
            ['name' => 'Default', 'code' => '#000000', 'created_at' => $now, 'updated_at' => $now]
        );

        foreach ([1 => 'Small', 2 => 'Medium', 3 => 'Default'] as $id => $title) {
            DB::table('sizes')->updateOrInsert(
                ['id' => $id],
                ['title' => $title, 'created_at' => $now, 'updated_at' => $now]
            );
        }

        foreach ([1 => 'RedX', 2 => 'Pathao', 3 => 'Steadfast'] as $id => $name) {
            DB::table('couriers')->updateOrInsert(
                ['id' => $id],
                ['name' => $name, 'address' => '', 'created_at' => $now, 'updated_at' => $now]
            );
        }

        DB::table('delivery_charges')->updateOrInsert(
            ['id' => 1],
            ['title' => 'Inside Dhaka', 'amount' => 70, 'status' => true, 'charge_type' => 'flat', 'created_at' => $now, 'updated_at' => $now]
        );
        DB::table('delivery_charges')->updateOrInsert(
            ['id' => 2],
            ['title' => 'Outside Dhaka', 'amount' => 130, 'status' => true, 'charge_type' => 'flat', 'created_at' => $now, 'updated_at' => $now]
        );
    }

    private function seedAuthorization(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        foreach (self::PERMISSIONS as $name) {
            Permission::firstOrCreate(['name' => $name, 'guard_name' => 'web']);
        }

        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $admin->syncPermissions(
            Permission::where('guard_name', 'web')->whereIn('name', self::ADMIN_PERMISSIONS)->get()
        );

        Role::firstOrCreate(['name' => 'super-admin', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'worker', 'guard_name' => 'web']);

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
