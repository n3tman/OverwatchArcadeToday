<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Today extends Model
{
    protected $guarded = [];

    public static function alreadyHaveGamemodeToday()
    {
        $lastGamemode = Today::orderBy('created_at', 'desc')->first();
        $lastGamemodeTime = Carbon::parse($lastGamemode->created_at, 'Europe/Amsterdam')->setTimezone('UTC');
        $resetTime = Carbon::now('UTC')->hour(0);

        if ($resetTime->isSameDay($lastGamemodeTime)) {
            return $lastGamemode;
        }
        return false;
    }

    /**
     *  Creates twitter format for KVKH's twitter
     * @return string
     */
    public function getTwitterMessage()
    {
        $weekly = "🔹 ";
        $new = "🆕 ";
        if (Carbon::now("UTC")->dayOfWeek == Carbon::TUESDAY) {
            $weekly = $new;
        }
        return
            "Current modes - " . Carbon::now("UTC")->format("D M d, Y") . " UTC <br />" .
            $weekly . $this->tile_large->getTwitterLine() . " [Weekly]<br />" .
            $weekly . $this->tile_weekly_1->getTwitterLine() . " [Weekly]<br />" .
            $new . $this->tile_daily->getTwitterLine() . " [Daily]<br />" .
            $weekly . $this->tile_weekly_2->getTwitterLine() . " [Weekly]<br />" .
            $weekly . $this->tile_permanent->getTwitterLine() . " [Permanent]<br />";
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
