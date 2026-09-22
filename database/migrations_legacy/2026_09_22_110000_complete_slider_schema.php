<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('sliders')) {
            return;
        }

        Schema::table('sliders', function (Blueprint $table) {
            if (! Schema::hasColumn('sliders', 'mobile_image')) {
                $table->string('mobile_image')->nullable()->after('image');
            }
            if (! Schema::hasColumn('sliders', 'title')) {
                $table->string('title')->nullable()->after('mobile_image');
            }
            if (! Schema::hasColumn('sliders', 'description')) {
                $table->text('description')->nullable()->after('title');
            }
            if (! Schema::hasColumn('sliders', 'link')) {
                $table->string('link')->nullable()->after('description');
            }
        });
    }

    public function down(): void
    {
        // Compatibility migrations intentionally preserve existing application data.
    }
};
