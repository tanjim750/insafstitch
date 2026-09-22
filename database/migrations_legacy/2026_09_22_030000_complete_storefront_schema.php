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
        $this->completeTypesTable();
        $this->createCategorySelectionTables();
        $this->completeProductsTable();
        $this->completeVariationsTable();
        $this->completeProductStocksTable();
        $this->backfillProductSlugs();
    }

    private function completeTypesTable(): void
    {
        if (!Schema::hasColumn('types', 'is_top')) {
            Schema::table('types', function (Blueprint $table) {
                $table->boolean('is_top')->nullable()->index();
            });
        }
    }

    private function createCategorySelectionTables(): void
    {
        if (!Schema::hasTable('home_categories')) {
            Schema::create('home_categories', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('category_id')->unique();
                $table->unsignedInteger('serial')->nullable()->index();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('popular_categories')) {
            Schema::create('popular_categories', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('category_id')->unique();
                $table->timestamps();
            });
        }
    }

    private function completeProductsTable(): void
    {
        $missing = fn (string $column): bool => !Schema::hasColumn('products', $column);

        Schema::table('products', function (Blueprint $table) use ($missing) {
            if ($missing('slug')) $table->string('slug')->nullable()->unique();
            if ($missing('type')) $table->string('type', 20)->default('single');
            if ($missing('sub_category_id')) $table->unsignedBigInteger('sub_category_id')->nullable()->index();
            if ($missing('type_id')) $table->unsignedBigInteger('type_id')->nullable()->index();
            if ($missing('user_id')) $table->unsignedBigInteger('user_id')->nullable()->index();
            if ($missing('short_description')) $table->text('short_description')->nullable();
            if ($missing('feature')) $table->longText('feature')->nullable();
            if ($missing('sku')) $table->string('sku')->nullable()->index();
            if ($missing('purchase_prices')) $table->decimal('purchase_prices', 12, 2)->nullable()->default(0);
            if ($missing('regular_price')) $table->decimal('regular_price', 12, 2)->nullable();
            if ($missing('is_stock')) $table->boolean('is_stock')->default(true);
            if ($missing('stock_quantity')) $table->integer('stock_quantity')->default(0);
            if ($missing('video_link')) $table->string('video_link')->nullable();
            if ($missing('is_video_active')) $table->boolean('is_video_active')->default(true);
            if ($missing('discount_type')) $table->string('discount_type', 30)->nullable();
            if ($missing('dicount_amount')) $table->decimal('dicount_amount', 12, 2)->nullable();
            if ($missing('after_discount')) $table->decimal('after_discount', 12, 2)->nullable();
            if ($missing('weight')) $table->decimal('weight', 10, 3)->nullable();
            if ($missing('status')) $table->boolean('status')->default(true)->index();
            if ($missing('is_recommended')) $table->boolean('is_recommended')->nullable()->index();
            if ($missing('is_for_you')) $table->boolean('is_for_you')->nullable()->index();
            if ($missing('priority')) $table->unsignedInteger('priority')->nullable()->index();
            if ($missing('is_free_shipping')) $table->boolean('is_free_shipping')->nullable()->index();
        });
    }

    private function completeVariationsTable(): void
    {
        $missing = fn (string $column): bool => !Schema::hasColumn('variations', $column);

        Schema::table('variations', function (Blueprint $table) use ($missing) {
            if ($missing('image')) $table->string('image')->nullable();
            if ($missing('purchase_price')) $table->decimal('purchase_price', 12, 2)->default(0);
            if ($missing('price')) $table->decimal('price', 12, 2)->default(0);
            if ($missing('after_discount_price')) $table->decimal('after_discount_price', 12, 2)->nullable();
            if ($missing('stock_quantity')) $table->integer('stock_quantity')->default(0);
        });
    }

    private function completeProductStocksTable(): void
    {
        if (!Schema::hasColumn('product_stocks', 'variation_id')) {
            Schema::table('product_stocks', function (Blueprint $table) {
                $table->unsignedBigInteger('variation_id')->nullable()->index();
            });
        }
    }

    private function backfillProductSlugs(): void
    {
        $usedSlugs = DB::table('products')
            ->whereNotNull('slug')
            ->pluck('slug')
            ->filter()
            ->flip()
            ->all();

        DB::table('products')
            ->select(['id', 'name', 'slug'])
            ->whereNull('slug')
            ->orderBy('id')
            ->chunkById(100, function ($products) use (&$usedSlugs) {
                foreach ($products as $product) {
                    $baseSlug = Str::slug((string) $product->name) ?: 'product-' . $product->id;
                    $slug = $baseSlug;
                    $suffix = 1;

                    while (isset($usedSlugs[$slug])) {
                        $slug = $baseSlug . '-' . $suffix++;
                    }

                    DB::table('products')->where('id', $product->id)->update(['slug' => $slug]);
                    $usedSlugs[$slug] = true;
                }
            });
    }

    public function down(): void
    {
        Schema::dropIfExists('popular_categories');
        Schema::dropIfExists('home_categories');
    }
};
