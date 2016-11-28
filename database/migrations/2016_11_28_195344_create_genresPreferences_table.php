<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenresPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genresPreferences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id');
            $table->integer('username_id');
            $table->string('genre')->nullable();
            $table->timestamps();

            //===================================
            //          FOREIGN KEYS
            //===================================
            $table->foreign('account_id')
                  ->references('id')->on('accounts');

            $table->foreign('username_id')
                  ->references('id')->on('usernames');
        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genresPreferences');
   
    }
}
