<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimeinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animeinfo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->integer('episode_count');
            $table->string('status');
            $table->date('aired_date');
            $table->string('producer');
            $table->string('studio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animeinfo');
    }
}
