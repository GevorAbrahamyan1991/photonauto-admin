<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandSinglesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_singles', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name');
            $table->text('desc_am');
            $table->text('desc_ru');
            $table->text('desc_en');
            $table->string('brand_unique');
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
        Schema::dropIfExists('brand_singles');
    }
}
