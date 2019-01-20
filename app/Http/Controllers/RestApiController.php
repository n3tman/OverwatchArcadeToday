<?php

namespace App\Http\Controllers;

use App\Today;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RestApiController extends Controller
{
    public function getTodaysGamemodes()
    {
        if(!Today::alreadyHaveGamemodeToday()){
            return response()->json([], 200, []);
        }
        $gamemodes = Today::orderBy('created_at', 'desc')->take(1)->with('tile_large:id,name',
            'tile_weekly_1:id,name,players', 'tile_daily:id,name,players', 'tile_weekly_2:id,name,players',
            'tile_permanent:id,name,players', 'byUser:id,battletag,avatar')->get()->toArray();
        $gamemodes = array_slice($gamemodes[0], 8);
        return response()->json($gamemodes, 200, [], JSON_PRETTY_PRINT);
    }

    public function thisWeeksGamemodes()
    {
        $currentTime = Carbon::now();

        $gamemodes = Today::where('created_at', '>=', $currentTime->startOfWeek())->orderBy('created_at', 'desc')->take(7)->with('tile_large:id,name',
            'tile_weekly_1:id,name,players', 'tile_daily:id,name,players', 'tile_weekly_2:id,name,players',
            'tile_permanent:id,name,players', 'byUser:id,battletag,avatar')->get()->toArray();
        foreach ($gamemodes as $key => $val) {
            $cleanArray = array_slice($val, 8);
            $gamemodes[$key] = $cleanArray;
        }
        return response()->json($gamemodes, 200, [], JSON_PRETTY_PRINT);
    }
}
