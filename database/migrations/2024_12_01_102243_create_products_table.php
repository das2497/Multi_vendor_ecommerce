<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id');
            $table->string('shop');
            $table->string('name');
            $table->string('description');
            $table->string('category');
            $table->string('sub_category')->nullable();
            $table->string('price');
            $table->string('qty');
            $table->string('sold')->default(0);
            $table->string('ratings')->nullable();
            $table->string('brand')->nullable();
            $table->string('img1');
            $table->string('img2')->nullable();
            $table->string('img3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
