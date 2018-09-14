<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Whitelist extends Model
{
    protected $primaryKey = "battletag";
    protected $table = 'user_whitelist';
}
