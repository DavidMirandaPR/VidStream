<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsernamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usernames', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id');
            $table->string('username');
            $table->integer('history_id')->nullable();
            $table->integer('genrePreference_id')->nullable();
            $table->timestamps();

            $table->unique(array('account_id','username'));


            //===================================
            //          FOREIGN KEYS
            //===================================

            $table->foreign('account_id')
                  ->references('id')->on('accounts');

            $table->foreign('history_id')
                  ->references('id')->on('usersHistory');

            $table->foreign('genrePreference_id')
                  ->references('id')->on('genresPreferences');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usernames');

    }
}
