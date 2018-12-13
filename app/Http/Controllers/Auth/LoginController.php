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
        $user = Socialite::with('battlenet')->user();

        $isWhitelisted = Whitelist::where('battletag', $user->user['id'])->get()->count();
        if(!$isWhitelisted){
            return abort('503', 'You are not whitelisted - #'.$user->user['id']);
        }


        $user = User::firstOrCreate(
            ['id' => $user->user['id']], ['battletag' => $user->user['battletag'], 'group' => 0]
        );

        Auth::login($user, true);

        return redirect('/');
    }
}
