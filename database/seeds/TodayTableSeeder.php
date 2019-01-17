<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TodayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::parse("2010-02-03 00:00:00");

        $today = new \App\Today();
        $today->tile_1 = 1;
        $today->tile_2 = 2;
        $today->tile_3 = 3;
        $today->tile_4 = 4;
        $today->tile_5 = 5;
        $today->created_by = 1337;
        $today->created_at = $date;
        $today->updated_at = $date;
        $today->save();
    }
}
