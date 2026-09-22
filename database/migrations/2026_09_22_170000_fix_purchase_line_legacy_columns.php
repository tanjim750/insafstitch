<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('purchase_lines')) {
            return;
        }

        if (! Schema::hasColumn('purchase_lines', 'variation_id')) {
            Schema::table('purchase_lines', function (Blueprint $table) {
                $table->unsignedBigInteger('variation_id')->nullable()->index()->after('product_id');
            });
        }

        if (Schema::hasColumn('purchase_lines', 'size_id')) {
            Schema::table('purchase_lines', function (Blueprint $table) {
                $table->unsignedBigInteger('size_id')->nullable()->change();
            });
        }
    }

    public function down(): void
    {
        // Existing variation-backed rows may legitimately have no size_id.
    }
};
