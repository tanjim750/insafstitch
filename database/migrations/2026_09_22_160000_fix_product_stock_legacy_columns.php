<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('product_stocks') && Schema::hasColumn('product_stocks', 'size_id')) {
            Schema::table('product_stocks', function (Blueprint $table) {
                $table->unsignedBigInteger('size_id')->nullable()->change();
            });
        }

        if (Schema::hasTable('product_stocks') && Schema::hasColumn('product_stocks', 'quantity')) {
            Schema::table('product_stocks', function (Blueprint $table) {
                $table->decimal('quantity', 10, 2)->default(0)->change();
            });
        }

        if (Schema::hasTable('users') && Schema::hasColumn('users', 'password')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('password')->nullable()->change();
            });
        }
    }

    public function down(): void
    {
        // Existing variation-backed rows may legitimately have no size_id.
    }
};
