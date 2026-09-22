<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('orders')) {
            return;
        }

        $missing = fn (string $column): bool => ! Schema::hasColumn('orders', $column);

        Schema::table('orders', function (Blueprint $table) use ($missing) {
            if ($missing('email')) {
                $table->string('email')->nullable()->after('mobile');
            }

            if ($missing('currency')) {
                $table->string('currency', 10)->nullable()->default('BDT')->after('payment_method');
            }
        });

        if (Schema::hasColumn('orders', 'user_id')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->unsignedBigInteger('user_id')->nullable()->change();
            });
        }
    }

    public function down(): void
    {
        // Existing guest orders and checkout data must be preserved.
    }
};
