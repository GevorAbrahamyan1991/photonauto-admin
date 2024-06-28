<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('for_homes', function (Blueprint $table) {
            $table->id();
            $table->string('for_home_title_am');
            $table->string('for_home_title_ru');
            $table->string('for_home_title_en');
            $table->text('for_home_description_am');
            $table->text('for_home_description_ru');
            $table->text('for_home_description_en');
            $table->string('for_home_code');
            $table->string('for_home_image');
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
        Schema::dropIfExists('for_homes');
    }
}
