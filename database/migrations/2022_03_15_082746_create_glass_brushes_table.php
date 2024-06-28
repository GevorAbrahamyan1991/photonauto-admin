<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlassBrushesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glass_brushes', function (Blueprint $table) {
            $table->id();
            $table->string('brushes_product_brand');
            $table->string('brushes_product_type');
            $table->string('brushes_product_title_am');
            $table->string('brushes_product_title_ru');
            $table->string('brushes_product_title_en');
            $table->string('brushes_product_desc_am');
            $table->string('brushes_product_desc_ru');
            $table->string('brushes_product_desc_en');
            $table->string('brushes_product_size');
            $table->string('brushes_product_code');
            $table->string('brushes_product_image');
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
        Schema::dropIfExists('glass_brushes');
    }
}
