<?php

use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('usersHistory')->insert([
            'id'				 => 1,
            'account_id'		 => 1,
            'username_id'		 => 1,
            'imdbID'             => 'tt0411267',
            'created_at'  		 => date("Y-m-d H:i:s"), 
            'updated_at'  		 => date("Y-m-d H:i:s") 
        ]);    
	}
}
