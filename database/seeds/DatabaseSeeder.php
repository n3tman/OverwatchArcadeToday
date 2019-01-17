<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GamemodeTableSeeder::class);
//        $this->call(UserTableSeeder::class);
//        $this->call(TodayTableSeeder::class);
    }
}
