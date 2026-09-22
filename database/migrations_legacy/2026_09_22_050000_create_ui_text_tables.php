<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('admin_texts')) {
            Schema::create('admin_texts', function (Blueprint $table) {
                $table->id();
                foreach ([
                    'popular_category_title', 'view_all_text', 'add_to_cart_text',
                    'order_now_text', 'product_code_label', 'courier_delivery_title',
                    'short_description_title', 'call_btn_text', 'whatsapp_btn_text',
                    'submit_review_btn_text', 'details_tab_text', 'reviews_tab_text',
                ] as $column) {
                    $table->string($column)->nullable();
                }
                $table->timestamps();
            });

            DB::table('admin_texts')->insert([
                'popular_category_title' => 'Popular Categories',
                'view_all_text' => 'View All',
                'add_to_cart_text' => 'Add to Cart',
                'order_now_text' => 'Order Now',
                'product_code_label' => 'Product Code',
                'courier_delivery_title' => 'Delivery Charge',
                'short_description_title' => 'Short Description',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if (!Schema::hasTable('bangla_text')) {
            Schema::create('bangla_text', function (Blueprint $table) {
                $table->id();
                foreach ([
                    'checkout_form_top_text', 'name_text', 'mobile_text', 'address_text',
                    'delivery_text', 'order_confirm_text', 'order_text', 'cart_text',
                    'fshipping_text',
                ] as $column) {
                    $table->string($column)->nullable();
                }
            });

            DB::table('bangla_text')->insert([
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
        }

        foreach ([
            'common_btn_color', 'common_btn_text_color',
            'order_now_btn_color', 'order_now_btn_text_color',
        ] as $column) {
            if (!Schema::hasColumn('informations', $column)) {
                Schema::table('informations', function (Blueprint $table) use ($column) {
                    $table->string($column, 30)->nullable();
                });
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('bangla_text');
        Schema::dropIfExists('admin_texts');
    }
};
