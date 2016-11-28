<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AccountSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
        $this->call(HistorySeeder::class);
        $this->call(GenrePrefSeeder::class);
        $this->call(UsernameSeeder::class);
        $this->call(SupportTicketsSeeder::class);


    }
}
