<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_datas', function (Blueprint $table) {
            $table->id();
            $table->string('tel')->nullable();
            $table->string('email')->nullable();
            $table->string('address_am')->nullable();
            $table->string('address_ru')->nullable();
            $table->string('address_en')->nullable();
            $table->string('insta_link')->nullable();
            $table->string('face_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('telegram_link')->nullable();
            $table->string('vk_link')->nullable();

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
        Schema::dropIfExists('home_datas');
    }
}