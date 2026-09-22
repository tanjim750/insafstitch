<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $this->completeOrdersTable();
        $this->completeOrderDetailsTable();
    }

    private function completeOrdersTable(): void
    {
        $missing = fn (string $column): bool => !Schema::hasColumn('orders', $column);

        Schema::table('orders', function (Blueprint $table) use ($missing) {
            if ($missing('email')) $table->string('email')->nullable();
            if ($missing('assign_user_id')) $table->unsignedBigInteger('assign_user_id')->nullable()->index();
            if ($missing('delivery_charge_id')) $table->unsignedBigInteger('delivery_charge_id')->nullable()->index();
            if ($missing('courier_id')) $table->unsignedBigInteger('courier_id')->nullable()->index();
            if ($missing('area_id')) $table->string('area_id')->nullable();
            if ($missing('area_name')) $table->string('area_name')->nullable();
            if ($missing('store_id')) $table->string('store_id')->nullable();
            if ($missing('weight')) $table->decimal('weight', 10, 3)->nullable();
            if ($missing('note')) $table->text('note')->nullable();
            if ($missing('payment_method')) $table->string('payment_method', 50)->nullable();
            if ($missing('currency')) $table->string('currency', 10)->nullable()->default('BDT');
            if ($missing('sender_number')) $table->string('sender_number', 50)->nullable();
            if ($missing('transaction_id')) $table->string('transaction_id')->nullable()->index();
            if ($missing('ip_address')) $table->string('ip_address', 45)->nullable()->index();
            if ($missing('courier_tracking_id')) $table->string('courier_tracking_id')->nullable()->index();
            if ($missing('courier_tracking_code')) $table->string('courier_tracking_code')->nullable()->index();
            if ($missing('courier_status')) $table->string('courier_status')->nullable();
            if ($missing('call_attempt')) $table->unsignedTinyInteger('call_attempt')->default(0);
            if ($missing('order_source')) $table->string('order_source')->nullable()->index();
            if ($missing('utm_source')) $table->string('utm_source')->nullable();
            if ($missing('utm_medium')) $table->string('utm_medium')->nullable();
            if ($missing('utm_campaign')) $table->string('utm_campaign')->nullable();
            if ($missing('referer_url')) $table->text('referer_url')->nullable();
            if ($missing('deleted_at')) $table->softDeletes();
        });
    }

    private function completeOrderDetailsTable(): void
    {
        $missing = fn (string $column): bool => !Schema::hasColumn('order_details', $column);

        Schema::table('order_details', function (Blueprint $table) use ($missing) {
            if ($missing('variation_id')) $table->unsignedBigInteger('variation_id')->nullable()->index();
            if ($missing('quantity')) $table->unsignedInteger('quantity')->default(1);
            if ($missing('purchase_price')) $table->decimal('purchase_price', 10, 2)->nullable()->default(0);
            if ($missing('is_stock')) $table->boolean('is_stock')->default(true);
        });
    }

    public function down(): void
    {
        // Compatibility migrations are intentionally irreversible.
    }
};
