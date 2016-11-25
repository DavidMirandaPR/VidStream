<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
  /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            'id' => 1,
            'type' => 'Action',
        	'created_at' => date("Y-m-d H:i:s"), 
        	'updated_at' => date("Y-m-d H:i:s") 
        ]);

        DB::table('genres')->insert([
            'id' => 2,
            'type' => 'Adventure',
        	'created_at' => date("Y-m-d H:i:s"), 
        	'updated_at' => date("Y-m-d H:i:s") 
        ]);

        DB::table('genres')->insert([
            'id' => 3,
            'type' => 'Animation',
        	'created_at' => date("Y-m-d H:i:s"), 
        	'updated_at' => date("Y-m-d H:i:s") 
        ]);

        DB::table('genres')->insert([
            'id' => 4,
            'type' => 'Comedy',
        	'created_at' => date("Y-m-d H:i:s"), 
        	'updated_at' => date("Y-m-d H:i:s") 
        ]);

        DB::table('genres')->insert([
            'id' => 5,
            'type' => 'Crime',
        	'created_at' => date("Y-m-d H:i:s"), 
        	'updated_at' => date("Y-m-d H:i:s") 
        ]);

        DB::table('genres')->insert([
            'id' => 6,
            'type' => 'Disaster',
        	'created_at' => date("Y-m-d H:i:s"), 
        	'updated_at' => date("Y-m-d H:i:s") 
        ]);

        DB::table('genres')->insert([
            'id' => 7,
            'type' => 'Documentary',
        	'created_at' => date("Y-m-d H:i:s"), 
        	'updated_at' => date("Y-m-d H:i:s") 
        ]);

        DB::table('genres')->insert([
            'id' => 8,
            'type' => 'Drama',
        	'created_at' => date("Y-m-d H:i:s"), 
        	'updated_at' => date("Y-m-d H:i:s") 
        ]);

        DB::table('genres')->insert([
            'id' => 9,
            'type' => 'Eastern',
        	'created_at' => date("Y-m-d H:i:s"), 
        	'updated_at' => date("Y-m-d H:i:s") 
        ]);

        DB::table('genres')->insert([
            'id' => 10,
            'type' => 'Fantasy',
        	'created_at' => date("Y-m-d H:i:s"), 
        	'updated_at' => date("Y-m-d H:i:s") 
        ]);

        DB::table('genres')->insert([
            'id' => 11,
            'type' => 'History',
        	'created_at' => date("Y-m-d H:i:s"), 
        	'updated_at' => date("Y-m-d H:i:s") 
        ]);

        DB::table('genres')->insert([
            'id' => 12,
            'type' => 'Horror',
        	'created_at' => date("Y-m-d H:i:s"), 
        	'updated_at' => date("Y-m-d H:i:s") 
        ]);
        DB::table('genres')->insert([
            'id' => 13,
            'type' => 'Musical',
        	'created_at' => date("Y-m-d H:i:s"), 
        	'updated_at' => date("Y-m-d H:i:s") 
        ]);

        DB::table('genres')->insert([
            'id' => 14,
            'type' => 'Romance',
        	'created_at' => date("Y-m-d H:i:s"), 
        	'updated_at' => date("Y-m-d H:i:s") 
        ]);

        DB::table('genres')->insert([
            'id' => 15,
            'type' => 'SciFi',
        	'created_at' => date("Y-m-d H:i:s"), 
        	'updated_at' => date("Y-m-d H:i:s") 
        ]);

        DB::table('genres')->insert([
            'id' => 16,
            'type' => 'Sport',
        	'created_at' => date("Y-m-d H:i:s"), 
        	'updated_at' => date("Y-m-d H:i:s") 
        ]);
        
        DB::table('genres')->insert([
            'id' => 17,
            'type' => 'Thriller',
        	'created_at' => date("Y-m-d H:i:s"), 
        	'updated_at' => date("Y-m-d H:i:s") 
        ]);

        DB::table('genres')->insert([
            'id' => 18,
            'type' => 'Western',
        	'created_at' => date("Y-m-d H:i:s"), 
        	'updated_at' => date("Y-m-d H:i:s") 
        ]);
    }
}
