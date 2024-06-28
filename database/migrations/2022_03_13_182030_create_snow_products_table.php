<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnowProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snow_products', function (Blueprint $table) {
            $table->id();
            $table->string('snow_product_brand');
            $table->string('snow_product_title_am');
            $table->string('snow_product_title_ru');
            $table->string('snow_product_title_en');
            $table->string('snow_product_description_am');
            $table->string('snow_product_description_ru');
            $table->string('snow_product_description_en');
            $table->string('snow_product_code');
            $table->string('snow_product_image');
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
        Schema::dropIfExists('snow_products');
    }
}
