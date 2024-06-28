<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_news', function (Blueprint $table) {
            $table->id();
            $table->string('pre_unique');
            $table->text('desc_am');
            $table->text('desc_ru');
            $table->text('desc_en');
            $table->string('pre_images');
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
        Schema::dropIfExists('pre_news');
    }
}
