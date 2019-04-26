<?php

namespace App;

use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Database\Eloquent\Model;

class Twitter extends Model
{
    private $twitterapi;

    /**
     * Twitter constructor.
     */
    public function __construct(TwitterOAuth $twitterapi)
    {
        $this->twitterapi = new $twitterapi(env('consumer_key'), env('consumer_secret'), env('access_token'), env('access_token_secret'));
    }

    public static function postTodaysGamemode()
    {

    }
}
