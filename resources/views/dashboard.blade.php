<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Overwatch - Today's gamemode (Daily updated)</title>

    <meta charset="UTF-8">
    <meta name="description" content="Discover today's overwatch arcade gamemode. Daily updated">
    <meta name="keywords" content="Overwatch, arcade, today, gamemode, gamemodes">
    <meta name="author" content="bluedog">

    <meta property="og:title" content="Overwatch arcade gamemodes - daily updated">
    <meta property="og:site_name" content="Overwatch Arcade">
    <meta property="og:url" content="https://overwatcharcade.today">
    <meta property="og:description" content="Discover today's Overwatch arcade gamemodes. Site gets updated daily.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="">

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{ URL::asset('css/overwatch_today.css?') }}?ver={{env('APP_VERSION')}}">
</head>
<body>
<div class="container arcade">
    <h1>Today's Overwatch Arcade</h1>
    @if(!\App\Today::alreadyHaveGamemodeToday())
        <h3><span class="badge badge-warning">WARNING</span> Today's arcade has not been updated yet</h3>
    @endif
    <div class="row mt-4" style="">
        <div class="card col-md-6">
            <div class="card-img-top {{$today->tile_large->code}} large">
                <div class="gamemode-icon text-center">
                    <img src="/img/gamemodes/{{$today->tile_large->code}}.png" class="large-image">
                </div>
            </div>
            <div class="card-body">
                <div class="text-wrap">
                    <h6 class="players">{{$today->tile_large->players}}</h6>
                    <h4 class="gamemode-title">{{$today->tile_large->name}}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="card col-md-6">
                    <div class="card-img-top {{$today->tile_weekly_1->code}}">
                        <div class="gamemode-icon text-center">
                            <img src="/img/gamemodes/{{$today->tile_weekly_1->code}}.png" class="small-image">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-wrap">
                            <h6 class="players">{{$today->tile_weekly_1->players}}</h6>
                            <h4 class="gamemode-title">{{$today->tile_weekly_1->name}}</h4>
                        </div>
                    </div>
                </div>
                <div class="card col-md-6">
                    <div class="card-img-top {{$today->tile_daily->code}}">
                        <div class="gamemode-icon text-center">
                            <img src="/img/gamemodes/{{$today->tile_daily->code}}.png" class="small-image">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-wrap">
                            <h6 class="players">{{$today->tile_daily->players}}</h6>
                            <h4 class="gamemode-title">{{$today->tile_daily->name}}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card col-md-6">
                    <div class="card-img-top {{$today->tile_weekly_2->code}}">
                        <div class="gamemode-icon text-center">
                            <img src="/img/gamemodes/{{$today->tile_weekly_2->code}}.png" class="small-image">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-wrap">
                            <h6 class="players">{{$today->tile_weekly_2->players}}</h6>
                            <h4 class="gamemode-title">{{$today->tile_weekly_2->name}}</h4>
                        </div>
                    </div>
                </div>
                <div class="card col-md-6">
                    <div class="card-img-top {{$today->tile_permanent->code}}">
                        <div class="gamemode-icon text-center">
                            <img src="/img/gamemodes/{{$today->tile_permanent->code}}.png" class="small-image">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-wrap">
                            <h6 class="players">{{$today->tile_permanent->players}}</h6>
                            <h4 class="gamemode-title">{{$today->tile_permanent->name}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-2 col-md-12 col-sm-12 text-md-center text-sm-center text-lg-left">
            @if(Auth::check())
                <span class="badge badge-warning">Logged in as: {{Auth::user()->battletag}}</span>
            @endif
            <span class="badge badge-success">Last updated: {{\Carbon\Carbon::parse($today->created_at)->diffForHumans()}}</span>
            <span class="badge badge-success">Last updated by: {{$today->byUser->battletag}}</span>
        </div>
        <div class="col-lg-7 offset-lg-3 col-md-12 mt-sm-4 text-right">
            @if(Auth::check() && !\App\Today::alreadyHaveGamemodeToday())
                <a href="/gamemode" class="btn btn-success"><i class="fa fa-check-circle"></i> Set today's gamemodes</a>
            @endif
            <a href="javascript:about()" class="btn btn-warning"><i class="fa fa-book"></i> About</a>
            <a href="/api" class="btn btn-info"><i class="fa fa-gear"></i> Free API</a>
            <a href="javascript:contributors()" class="btn btn-info"><i class="fa fa-users"></i> Contributors</a>
        </div>
    </div>
    <div class="row mt-4">
        <p class="footer">
            Game content and materials are trademarks and copyrights of their respective publisher and its licensors. All rights reserved.<br />
            This site is made for fun by <a href="//bluedog.pw">bluedog</a>
        </p>
    </div>
</div>

<div class="container contributors" style="display:none;">
    <table class="table table-hover table-striped">
        <thead>
        <th style="width:10%;"></th>
        <th>Contributor</th>
        <th>Amounts of submits</th>
        </thead>
        <tbody>
        @foreach($contributors as $contributor)
            <tr>
                <td>
                    @if($contributor->avatar)
                        <img src="{{$contributor->avatar}}" class="img" style="max-height:48px;">
                    @endif
                </td>
                <td>
                    {{$contributor->battletag}}
                </td>
                <td>{{$contributor->contributions()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="javascript:back()" class="btn btn-primary">Back</a>
</div>


</body>
<script src="{{ URL::asset('/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('/js/bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"
        integrity="sha256-FSEeC+c0OJh+0FI23EzpCWL3xGRSQnNkRGV2UF5maXs=" crossorigin="anonymous"></script>
<script>
    function about() {
        return swal({
            title: "About",
            text: "This website has been made by bluedog and maintained by everyone listed under 'contributors'. Special thanks to Superbunny for starting this idea. In order to become a contributor, please contact me.",
            button: "Alright, neat!",
        });
    }

    function contributors() {
        $(".arcade").fadeOut(250);
        $(".contributors").delay(250).fadeIn(250);
    }

    function back() {
        $(".container").fadeOut(250);
        $(".arcade").delay(250).fadeIn(250);
    }
</script>
</html>
