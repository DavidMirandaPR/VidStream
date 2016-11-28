<?php

use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('accounts')->insert([
            'id'			=> 1,
            'username_id'	=> 1,
            'firstName'		=> 'Test',
            'lastName'		=> 'Testing',
            'email'			=> 'luis@luis',
            'password'		=> 'luis',
            'level' 		=> 1,
            'created_at'  	=> date("Y-m-d H:i:s"), 
            'updated_at'  	=> date("Y-m-d H:i:s") 
        ]);    
	}
}
