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

        if(!$lastGamemode){
            return false;
        }

        $lastGamemode = Carbon::parse($lastGamemode->created_at, 'Europe/Amsterdam');
        $lastGamemode->setTimezone('UTC');

        $now = Carbon::now('UTC');
        $resetTime = Carbon::create($now->year, $now->month, $now->day, "0");

        if ($lastGamemode > $resetTime) {
            return true;
        }
        return false;
    }

    // Relations

    public function tile_large()
    {
        return $this->hasOne('App\Gamemode', 'id', 'tile_1');
    }

    public function tile_weekly_1()
    {
        return $this->hasOne('App\Gamemode', 'id', 'tile_2');
    }

    public function tile_daily()
    {
        return $this->hasOne('App\Gamemode', 'id', 'tile_4');
    }

    public function tile_weekly_2()
    {
        return $this->hasOne('App\Gamemode', 'id', 'tile_3');
    }

    public function tile_permanent()
    {
        return $this->hasOne('App\Gamemode', 'id', 'tile_5');
    }

    public function byUser()
    {
        return $this->hasOne('App\User', 'id', 'created_by');
    }
}
