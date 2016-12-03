<?php

use Illuminate\Database\Seeder;

class GenrePrefSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('genresPreferences')->insert([
            'id'				 => 1,
            'account_id'		 => 1,
            'username_id'		 => 1,
            'genre'              => 'Action',
            'created_at'  		 => date("Y-m-d H:i:s"), 
            'updated_at'  		 => date("Y-m-d H:i:s") 
        ]);    
	}
}
