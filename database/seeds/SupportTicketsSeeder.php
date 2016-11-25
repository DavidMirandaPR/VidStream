<?php

use Illuminate\Database\Seeder;

class SupportTicketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('supportTicket')->insert([
            'id' 			=> 1,
            'username_id' 	=> 1,
            'message'	  	=> 'This is an example of a Support Ticket';
            'created_at'  	=> date("Y-m-d H:i:s"), 
            'updated_at'  	=> date("Y-m-d H:i:s") 
        ]);    
	}
}
