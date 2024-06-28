<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lamps', function (Blueprint $table) {
            $table->id();
            $table->string('title_am');
            $table->string('title_ru');
            $table->string('title_en');
            $table->text('text_am');
            $table->text('text_ru');
            $table->text('text_en');
            $table->string('cover_image');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('lamps');
    }
}