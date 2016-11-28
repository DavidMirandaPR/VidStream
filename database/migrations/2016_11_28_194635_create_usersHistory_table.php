<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usersHistory', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id');
            $table->integer('username_id');
            $table->string('imdbID')->nullable();
            $table->timestamps();

            //===================================
            //          FOREIGN KEYS
            //===================================
            $table->foreign('account_id')
                  ->references('id')->on('accounts');

            $table->foreign('username_id')
                  ->references('id')->on('usernames');

            $table->foreign('imdbID')
                  ->references('imdbID')->on('content');
        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usersHistory');
   
    }
}
