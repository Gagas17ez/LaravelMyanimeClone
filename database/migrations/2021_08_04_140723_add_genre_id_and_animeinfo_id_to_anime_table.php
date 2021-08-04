<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGenreIdAndAnimeinfoIdToAnimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anime', function (Blueprint $table) {
            $table->unsignedBigInteger('genre_id');
            $table->foreign('genre_id')->references('id')->on('genre');
            
            $table->unsignedBigInteger('animeinfo_id');
            $table->foreign('animeinfo_id')->references('id')->on('animeinfo');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anime', function (Blueprint $table) {
            $table->dropForeign(['genre_id']);
            $table->dropForeign(['animeinfo_id']);
            $table->dropColumn(['genre_id']);
            $table->dropColumn(['animeinfo_id']);

        });
    }
}
