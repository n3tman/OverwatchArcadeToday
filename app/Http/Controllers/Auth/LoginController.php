<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Whitelist;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginBlizzard(Request $request)
    {
        return Socialite::with('battlenet')->redirect();
    }

    public function loginCallback(Request $request)
    {
//        $user = Socialite::with('battlenet')->user();
        $devResponse = json_decode('{"accessTokenResponseBody":{"access_token":"f893wbfmuxvvypjverzyhg9j","token_type":"bearer","expires_in":2591999},"token":"f893wbfmuxvvypjverzyhg9j","refreshToken":null,"expiresIn":2591999,"id":120653162,"nickname":"bluedog#21410","name":null,"email":null,"avatar":null,"user":{"battletag":"bluedog#21410","id":120653162}}',
            false);

        $isWhitelisted = Whitelist::where('battletag', $devResponse->user->id)->get()->count();
        if(!$isWhitelisted){
            return abort('503', 'You are not whitelisted - #'.$devResponse->user->id);
        }


        $user = User::firstOrCreate(
            ['id' => $devResponse->user->id], ['battletag' => $devResponse->user->battletag, 'group' => 0]
        );

        Auth::login($user, true);

        return redirect('/');
    }
}
