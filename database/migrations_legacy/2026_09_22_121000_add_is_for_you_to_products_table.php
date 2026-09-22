<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('products') || Schema::hasColumn('products', 'is_for_you')) {
            return;
        }

        Schema::table('products', function (Blueprint $table) {
            $table->boolean('is_for_you')->nullable()->index()->after('is_recommended');
        });
    }

    public function down(): void
    {
        if (! Schema::hasTable('products') || ! Schema::hasColumn('products', 'is_for_you')) {
            return;
        }

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('is_for_you');
        });
    }
};
