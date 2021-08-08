<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anime', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->longText('sinopsis');
            $table->string('type');
            $table->integer('episode_count');
            $table->string('status');
            $table->date('aired_date');
            $table->string('producer');
            $table->string('studio');
            $table->string('video_link', 100)->nullable();
            $table->integer('rating')->nullable();
            $table->string('poster');
            $table->string('poster_wide');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anime');
    }
}
