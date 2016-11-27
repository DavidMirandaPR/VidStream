<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$levels = ['Free', 'Premium', 'Staff', 'Admin'];
    	
    	for ($i = 0; $i < count($levels); $i++) { 
    		DB::table('levels')->insert([
	        'id' 		=> $i+1,
	        'type' 		=> $levels[$i],
	        'created_at'=> date("Y-m-d H:i:s"), 
	        'updated_at'=> date("Y-m-d H:i:s") 
	    	]);  
    	}
    }
}
