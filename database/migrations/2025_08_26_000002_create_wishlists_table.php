<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('menu_item_id');
            $table->string('item_name');
            $table->timestamps();

            $table->unique(['user_id','menu_item_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
};


