<?php

use Illuminate\Database\Seeder;

class UsernameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('usernames')->insert([
            'id'				 => 1,
            'account_id'		 => 1,
            'username'			 => 'Luis',
            'history_id'		 => 1,
            'genrePreference_id' => 1,
            'created_at'  		 => date("Y-m-d H:i:s"), 
            'updated_at'  		 => date("Y-m-d H:i:s") 
        ]);    
	}
}
