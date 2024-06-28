<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interiers', function (Blueprint $table) {
            $table->id();
            $table->string('interier_title_am');
            $table->string('interier_title_ru');
            $table->string('interier_title_en');
            $table->string('interier_description_am');
            $table->string('interier_description_ru');
            $table->string('interier_description_en');
            $table->string('interier_code');
            $table->string('interier_image');
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
        Schema::dropIfExists('interiers');
    }
}
