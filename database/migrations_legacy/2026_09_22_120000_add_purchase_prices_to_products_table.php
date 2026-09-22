<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('products') || Schema::hasColumn('products', 'purchase_prices')) {
            return;
        }

        Schema::table('products', function (Blueprint $table) {
            $table->decimal('purchase_prices', 12, 2)
                ->nullable()
                ->default(0)
                ->after('purchase_price');
        });
    }

    public function down(): void
    {
        if (! Schema::hasTable('products') || ! Schema::hasColumn('products', 'purchase_prices')) {
            return;
        }

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('purchase_prices');
        });
    }
};
