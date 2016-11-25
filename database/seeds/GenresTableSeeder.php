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
        $genres = ['Action', 'Adventure','Animation','Comedy','Crime','Disaster','Documentary','Drama','Eastern','Fantasy','History','Horror','Musical','Romance','SciFi','Sport','Thriller','Western'];
        
        for ($i = 0; $i < count($genres); $i++) { 
            DB::table('genres')->insert([
            'id'            => $i+1,
            'type'          => $genres[$i],
            'created_at'    => date("Y-m-d H:i:s"), 
            'updated_at'    => date("Y-m-d H:i:s") 
            ]);
        }
    }
}
