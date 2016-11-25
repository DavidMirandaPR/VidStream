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
            $table->string('imdbID')->unique()->nullable();
            $table->string('title')->nullable();
            $table->integer('year')->nullable();
            $table->string('rated')->nullable();
            $table->dateTime('Released', 'dd mon yy')->nullable();
            $table->string('runtime')->nullable();
            $table->string('genre')->nullable(); //must be an integer in order to match genre_id from genres table
            $table->string('director')->nullable();
            $table->string('writer')->nullable();
            $table->string('actors')->nullable();//must be an integer in order to match actors_id from actors table
            $table->string('plot')->nullable();
            $table->string('language')->nullable();
            $table->string('country')->nullable();
            $table->string('awards')->nullable();
            $table->string('poster')->nullable();
            $table->double('imdbRating')->nullable();
            $table->string('imdbVotes')->nullable() ; //for the commas
            $table->string('type')->nullable(); //Movie, series
            $table->timestamps();
            //Adding Primary Key to the Table 'content'
            $table->primary('imdbID');
            //Foreign Keys
            $table->foreign('genre')
                  ->references('id')->on('genres');

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
