<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('informations')) {
            Schema::create('informations', function (Blueprint $table) {
                $table->id();
                $table->string('site_name')->nullable();
                $table->string('site_logo')->nullable();
                $table->string('footer_logo')->nullable();
                $table->string('fav_icon')->nullable();
                $table->string('owner_phone')->nullable();
                $table->string('owner_email')->nullable();
                $table->text('address')->nullable();
                $table->text('copyright')->nullable();
                $table->text('topbar_notice')->nullable();
                $table->boolean('topbar_active')->default(false);
                $table->string('currency', 20)->default('BDT');
                $table->string('whats_num')->nullable();
                $table->boolean('whats_active')->default(false);
                $table->longText('tracking_code')->nullable();
                $table->unsignedInteger('stock_warning_limit')->default(5);
                $table->boolean('is_ip_check')->default(false);
                $table->boolean('is_mobile_check')->default(false);
                $table->boolean('is_auto_assign')->default(false);
                $table->longText('auto_assign_rules')->nullable();
                $table->timestamps();
            });

            DB::table('informations')->insert([
                'site_name' => 'trizync-solution',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if (!Schema::hasTable('delivery_charges')) {
            Schema::create('delivery_charges', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->decimal('amount', 12, 2)->default(0);
                $table->boolean('status')->default(true)->index();
                $table->string('charge_type', 30)->default('flat');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('courier_rates')) {
            Schema::create('courier_rates', function (Blueprint $table) {
                $table->id();
                $table->string('courier_name')->unique();
                $table->decimal('base_weight', 8, 2)->default(1);
                $table->decimal('base_charge', 12, 2)->default(0);
                $table->decimal('extra_per_kg_charge', 12, 2)->default(0);
                $table->boolean('status')->default(true);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('pages')) {
            Schema::create('pages', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('page')->unique();
                $table->longText('body')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('manual_payments')) {
            Schema::create('manual_payments', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('number');
                $table->string('type')->default('Personal');
                $table->boolean('status')->default(true)->index();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('coupon_codes')) {
            Schema::create('coupon_codes', function (Blueprint $table) {
                $table->id();
                $table->string('code')->unique();
                $table->decimal('amount', 12, 2);
                $table->dateTime('start');
                $table->dateTime('end');
                $table->decimal('minimum_amount', 12, 2)->nullable();
                $table->string('discount_type', 30);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('product_reviews')) {
            Schema::create('product_reviews', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('product_id')->index();
                $table->unsignedBigInteger('user_id')->nullable()->index();
                $table->string('name')->nullable();
                $table->unsignedTinyInteger('review')->default(5);
                $table->text('message')->nullable();
                $table->string('image')->nullable();
                $table->boolean('status')->default(false)->index();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('review_product_images')) {
            Schema::create('review_product_images', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('landing_page_id')->index();
                $table->string('image');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('settings')) {
            Schema::create('settings', function (Blueprint $table) {
                $table->id();
                $table->string('key')->unique();
                $table->longText('value')->nullable();
            });
        }

        if (!Schema::hasTable('facebook_feed_settings')) {
            Schema::create('facebook_feed_settings', function (Blueprint $table) {
                $table->id();
                $table->boolean('is_active')->default(false);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        foreach ([
            'facebook_feed_settings',
            'settings',
            'review_product_images',
            'product_reviews',
            'coupon_codes',
            'manual_payments',
            'pages',
            'courier_rates',
            'delivery_charges',
            'informations',
        ] as $table) {
            Schema::dropIfExists($table);
        }
    }
};
