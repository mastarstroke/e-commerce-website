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
            $table->integer('cate_id');
            $table->string('name');
            $table->integer('original_price');
            $table->integer('selling_price');
            $table->integer('qty');
            $table->string('trending')->default('NO');
            $table->string('status')->default('NO');
            $table->string('image');
            $table->string('small_description')->nullable();
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
