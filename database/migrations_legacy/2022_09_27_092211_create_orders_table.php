<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->string('invoice_no',100)->nullable();
            $table->text('shipping_address')->nullable();
            $table->string('city',100)->nullable();
            $table->string('state',100)->nullable();
            $table->string('zip_code',100)->nullable();
            $table->string('first_name',200)->nullable();
            $table->string('last_name',200)->nullable();
            $table->string('mobile',50)->nullable();
            $table->string('email')->nullable();
            $table->date('date')->nullable();
            $table->string('payment_status',50)->nullable()->default('due');
            $table->string('status',50)->nullable()->default('pending');
            $table->decimal('amount',10,2)->nullable()->default(0);
            $table->decimal('tax',10,2)->nullable()->default(0);
            $table->decimal('discount',10,2)->nullable()->default(0);
            $table->decimal('final_amount',10,2)->nullable()->default(0);
            $table->decimal('shipping_charge',10,2)->nullable()->default(0);
            $table->tinyInteger('delivery_type')->nullable();
            $table->unsignedBigInteger('assign_user_id')->nullable()->index();
            $table->unsignedBigInteger('delivery_charge_id')->nullable()->index();
            $table->unsignedBigInteger('courier_id')->nullable()->index();
            $table->string('area_id')->nullable();
            $table->string('area_name')->nullable();
            $table->string('store_id')->nullable();
            $table->decimal('weight', 10, 3)->nullable();
            $table->text('note')->nullable();
            $table->string('payment_method', 50)->nullable();
            $table->string('currency', 10)->nullable()->default('BDT');
            $table->string('sender_number', 50)->nullable();
            $table->string('transaction_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable()->index();
            $table->string('courier_tracking_id')->nullable()->index();
            $table->string('courier_tracking_code')->nullable()->index();
            $table->string('courier_status')->nullable();
            $table->unsignedTinyInteger('call_attempt')->default(0);
            $table->string('order_source')->nullable()->index();
            $table->string('utm_source')->nullable();
            $table->string('utm_medium')->nullable();
            $table->string('utm_campaign')->nullable();
            $table->text('referer_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
