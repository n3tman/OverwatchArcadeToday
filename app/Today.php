<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Today extends Model
{
    protected $guarded = [];

    public static function alreadyHaveGamemodeToday()
    {
        $lastGamemode = Today::select('created_at')->orderBy('created_at', 'desc')->first();
        $lastGamemode = Carbon::parse($lastGamemode->created_at);

        $now = Carbon::now('Europe/Amsterdam');
        $resetTime = Carbon::create($now->year, $now->month, $now->day, "2");

        if ($lastGamemode > $resetTime) {
            return true;
        }
        return false;
    }


    // Relations

    public function getTile_1()
    {
        return $this->hasOne('App\Gamemode', 'id', 'tile_1');
    }

    public function getTile_2()
    {
        return $this->hasOne('App\Gamemode', 'id', 'tile_2');
    }

    public function getTile_3()
    {
        return $this->hasOne('App\Gamemode', 'id', 'tile_3');
    }

    public function getTile_4()
    {
        return $this->hasOne('App\Gamemode', 'id', 'tile_4');
    }

    public function getTile_5()
    {
        return $this->hasOne('App\Gamemode', 'id', 'tile_5');
    }

    public function getUser()
    {
        return $this->hasOne('App\User', 'id', 'created_by');
    }
}
