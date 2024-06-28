<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreshProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fresh_products', function (Blueprint $table) {
            $table->id();
            $table->string('fresh_product_brand');
            $table->string('fresh_product_type');
            $table->string('fresh_product_smell');
            $table->string('fresh_product_title_am');
            $table->string('fresh_product_title_ru');
            $table->string('fresh_product_title_en');
            $table->string('fresh_product_desc_am');
            $table->string('fresh_product_desc_ru');
            $table->string('fresh_product_desc_en');
            $table->string('fresh_product_code');
            $table->string('fresh_product_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fresh_products');
    }
}
