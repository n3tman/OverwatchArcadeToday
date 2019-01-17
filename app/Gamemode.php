<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gamemode extends Model
{
    public $timestamps = false;

    /**
     * @param string $name
     * @return integer id
     */
    public static function getGamemodeIdByName(string $name){
        $gamemode = Gamemode::where('name', $name)->firstOrFail();
        return $gamemode->id;
    }
}
