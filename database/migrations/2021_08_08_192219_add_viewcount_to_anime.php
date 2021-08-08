<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddViewcountToAnime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anime', function (Blueprint $table) {
            $table->integer('viewcount')->nullable()->after('judul');
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
            $table->dropColumn('viewcount');
        });
    }
}
