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
        Schema::create('tbl_product', function (Blueprint $table) { 
            $table->increments('product_id'); 
            $table->string('product_name');
            $table->string('product_slug');
            $table->integer('category_id')->unsigned(); 
            $table->integer('brand_id')->unsigned(); 
            $table->text('product_desc'); 
            $table->text('product_content'); 
            $table->decimal('product_price', 10, 2);  // Decimal type for price (max 10 digits, 2 decimals)
            $table->string('product_image');
            $table->integer('product_status')->default(1);  // Default status could be '1' (active)
            $table->timestamps();

            // Adding foreign keys (if necessary)
            $table->foreign('category_id')->references('category_id')->on('tbl_category_product')->onDelete('cascade');
            $table->foreign('brand_id')->references('brand_id')->on('tbl_brand')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_product');
    }
};
