<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            // Customer Information
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');

            // Order Type and Details
            $table->string('order_type')->default('delivery'); // dine-in, takeaway, delivery
            $table->string('table_no')->nullable();

            // Delivery Information
            $table->text('delivery_address')->nullable();
            $table->string('delivery_area')->nullable(); // Karachi area
            $table->string('delivery_city')->default('Karachi');

            // Payment Information
            $table->enum('payment_method', ['cash_on_delivery', 'card', 'paypal', 'amazon_pay'])->default('cash_on_delivery');
            $table->string('payment_status')->default('pending'); // pending, paid, failed

            // Order Financial Details
            $table->decimal('subtotal', 10, 2);
            $table->decimal('tax_amount', 10, 2)->default(0);
            $table->decimal('delivery_fee', 10, 2)->default(0);
            $table->decimal('discount_amount', 10, 2)->default(0);
            $table->decimal('total_price', 10, 2);

            // Order Status and Notes
            $table->enum('status', [
                'pending',
                'confirmed',
                'preparing',
                'ready',
                'on_the_way',
                'delivered',
                'cancelled'
            ])->default('pending');
            $table->text('notes')->nullable();
            $table->timestamp('estimated_delivery_time')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
