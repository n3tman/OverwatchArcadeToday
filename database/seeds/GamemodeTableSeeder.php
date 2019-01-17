<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class GamemodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/gamemodes-spreadsheet.json');

        \App\Gamemode::truncate();

        foreach(json_decode($json, true) as $gamemode){
            $newGamemode = new \App\Gamemode();
            $newGamemode->fill($gamemode);
            $newGamemode->save();
        }
    }
}
