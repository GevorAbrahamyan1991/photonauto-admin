<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('care_products', function (Blueprint $table) {
            $table->id();
            $table->string('care_product_brand');
            $table->string('care_product_title_am');
            $table->string('care_product_title_ru');
            $table->string('care_product_title_en');
            $table->string('care_product_description_am');
            $table->string('care_product_description_ru');
            $table->string('care_product_description_en');
            $table->string('care_product_code');
            $table->string('care_product_image');
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
        Schema::dropIfExists('care_products');
    }
}
