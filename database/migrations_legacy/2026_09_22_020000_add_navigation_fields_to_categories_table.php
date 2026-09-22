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
        Schema::table('categories', function (Blueprint $table) {
            if (!Schema::hasColumn('categories', 'url')) {
                $table->string('url')->nullable()->unique();
            }

            if (!Schema::hasColumn('categories', 'parent_id')) {
                $table->unsignedBigInteger('parent_id')->nullable()->index();
            }

            if (!Schema::hasColumn('categories', 'is_popular')) {
                $table->boolean('is_popular')->default(false)->index();
            }

            if (!Schema::hasColumn('categories', 'is_menu')) {
                $table->boolean('is_menu')->default(false)->index();
            }
        });

        $usedSlugs = DB::table('categories')
            ->whereNotNull('url')
            ->pluck('url')
            ->filter()
            ->flip()
            ->all();

        DB::table('categories')
            ->select(['id', 'name', 'url'])
            ->whereNull('url')
            ->orderBy('id')
            ->chunkById(100, function ($categories) use (&$usedSlugs) {
                foreach ($categories as $category) {
                    $baseSlug = Str::slug((string) $category->name) ?: 'category-' . $category->id;
                    $slug = $baseSlug;
                    $suffix = 1;

                    while (isset($usedSlugs[$slug])) {
                        $slug = $baseSlug . '-' . $suffix++;
                    }

                    DB::table('categories')->where('id', $category->id)->update(['url' => $slug]);
                    $usedSlugs[$slug] = true;
                }
            });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            foreach (['url', 'parent_id', 'is_popular', 'is_menu'] as $column) {
                if (Schema::hasColumn('categories', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
