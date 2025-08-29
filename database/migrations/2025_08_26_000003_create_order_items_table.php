<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->unsignedBigInteger('menu_item_id');
            $table->foreign('menu_item_id')->references('id')->on('menu_items')->onDelete('cascade');
            $table->string('item_name'); // Store item name at time of order
            $table->text('item_description')->nullable(); // Store description at time of order
            $table->string('item_size')->nullable(); // Size selected (if applicable)
            $table->decimal('item_price', 8, 2); // Price at time of order
            $table->integer('quantity');
            $table->decimal('total_price', 10, 2); // item_price * quantity
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
