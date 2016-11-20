<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->string('imdbID')->unique();
            $table->string('title');
            $table->integer('year');
            $table->string('rated');
            $table->dateTime('Released', 'dd mon yy');
            $table->string('runtime')->nullable();
            $table->integer('genre'); //must be an integer in order to match genre_id from genres table
            $table->string('director');
            $table->string('writer');
            $table->integer('actors');//must be an integer in order to match actors_id from actors table
            $table->string('plot');
            $table->string('language');
            $table->string('country');
            $table->string('awards')->nullable();
            $table->string('poster');
            $table->double('imdbRating')->nullable();
            $table->string('imdbVotes')->nullable() ; //for the commas
            $table->string('type'); //Movie, series
            $table->timestamps();
            //Adding Primary Key to the Table 'content'
            $table->primary('imdbID');
            //Foreign Keys
            $table->foreign('genre')
                  ->references('genre_id')->on('genres');

            $table->foreign('actors')
                  ->references('actor_id')->on('actors');

        });
      

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content');

    }
}
