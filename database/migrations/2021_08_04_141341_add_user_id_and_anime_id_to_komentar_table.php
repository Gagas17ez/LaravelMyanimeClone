<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdAndAnimeIdToKomentarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('komentar', function (Blueprint $table) {
            $table->unsignedBigInteger('user_idkomen');
            $table->foreign('user_idkomen')->references('id')->on('users');
            
            $table->unsignedBigInteger('anime_id');
            $table->foreign('anime_id')->references('id')->on('anime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('komentar', function (Blueprint $table) {
            $table->dropForeign(['user_idkomen']);
            $table->dropForeign(['anime_id']);
            $table->dropColumn(['user_idkomen']);
            $table->dropColumn(['anime_id']);
        });
    }
}
