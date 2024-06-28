<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLampProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lamp_products', function (Blueprint $table) {
            $table->id();
            $table->string('lamp_product_brand');
            $table->string('lamp_product_type');
            $table->string('lamp_product_slot');
            $table->string('lamp_product_title_am');
            $table->string('lamp_product_title_ru');
            $table->string('lamp_product_title_en');
            $table->string('lamp_product_desc_am');
            $table->string('lamp_product_desc_ru');
            $table->string('lamp_product_desc_en');
            $table->string('lamp_product_code');
            $table->string('lamp_product_image');
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
        Schema::dropIfExists('lamp_products');
    }
}
