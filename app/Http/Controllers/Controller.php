<?php

namespace App\Http\Controllers;

use App\Gamemode;
use App\Today;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function todaysGamemode()
    {
        if (Today::alreadyHaveGamemodeToday()) {
            abort('503', 'We already have a picks for today');
        }

        $gamemodes = Gamemode::all()->pluck('name', 'id')->toArray();
        return view('today', ['gamemodes' => $gamemodes]);
    }

    public function submitGamemode(\App\Http\Requests\Gamemode $request)
    {
        if (Today::alreadyHaveGamemodeToday()) {
            abort('503', 'We already have a picks for today');
        }

        $today = new Today();
        $today->fill($request->all());
        $today->created_by = Auth::user()->id;
        $today->save();

        return redirect('/');
    }


    public function index()
    {
        $today = Today::all()->first();
        $contributors = User::all()->sortByDesc(function ($user) {
            return $user->contributions();
        });

        return view('dashboard', ['today' => $today, 'contributors' => $contributors]);
    }

}
