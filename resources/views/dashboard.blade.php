<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{env('APP_NAME')}}</title>

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{ URL::asset('css/overwatch_today.css') }}">
</head>
<body>
<div class="overlay"></div>

<div class="container arcade">
    <h1>Today's Overwatch Arcade</h1>
    @if(!\App\Today::alreadyHaveGamemodeToday())
        <h3><span class="badge badge-warning">WARNING</span> Today's arcade has not been updated yet</h3>
    @endif
    <div class="row" style="">
        <div class="card col-md-6">
            <div class="card-img-top {{$today->getTile_1->code}} large">
                <div class="gamemode-icon text-center">
                    <img src="/img/gamemodes/{{$today->getTile_1->code}}.png" class="large-image">
                </div>
            </div>
            <div class="card-body">
                <div class="text-wrap">
                    <h6 class="players">{{$today->getTile_1->players}}</h6>
                    <h4 class="gamemode-title">{{$today->getTile_1->name}}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="card col-md-6">
                    <div class="card-img-top {{$today->getTile_2->code}}">
                        <div class="gamemode-icon text-center">
                            <img src="/img/gamemodes/{{$today->getTile_2->code}}.png">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-wrap">
                            <h6 class="players">{{$today->getTile_2->players}}</h6>
                            <h4 class="gamemode-title">{{$today->getTile_2->name}}</h4>
                        </div>
                    </div>
                </div>
                <div class="card col-md-6">
                    <div class="card-img-top {{$today->getTile_3->code}}">
                        <div class="gamemode-icon text-center">
                            <img src="/img/gamemodes/{{$today->getTile_3->code}}.png">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-wrap">
                            <h6 class="players">{{$today->getTile_3->players}}</h6>
                            <h4 class="gamemode-title">{{$today->getTile_3->name}}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card col-md-6">
                    <div class="card-img-top {{$today->getTile_4->code}}">
                        <div class="gamemode-icon text-center">
                            <img src="/img/gamemodes/{{$today->getTile_4->code}}.png">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-wrap">
                            <h6 class="players">{{$today->getTile_4->players}}</h6>
                            <h4 class="gamemode-title">{{$today->getTile_4->name}}</h4>
                        </div>
                    </div>
                </div>
                <div class="card col-md-6">
                    <div class="card-img-top {{$today->getTile_5->code}}">
                        <div class="gamemode-icon text-center">
                            <img src="/img/gamemodes/{{$today->getTile_5->code}}.png">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-wrap">
                            <h6 class="players">{{$today->getTile_5->players}}</h6>
                            <h4 class="gamemode-title">{{$today->getTile_5->name}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-2">
            @if(Auth::check())
                <span class="badge badge-warning">Logged in as: {{Auth::user()->battletag}}</span>
            @endif
            <span class="badge badge-success">Last updated: {{\Carbon\Carbon::parse($today->created_at)->diffForHumans()}}</span>
            <span class="badge badge-success">Last updated by: {{$today->getUser->battletag}}</span>
        </div>
        <div class="col-md-6 offset-md-4 text-right">
            @if(Auth::check() && !\App\Today::alreadyHaveGamemodeToday())
                <a href="/gamemode" class="btn btn-success"><i class="fa fa-check-circle"></i> Set today's gamemodes</a>
            @endif
            <a href="javascript:about()" class="btn btn-warning"><i class="fa fa-book"></i> About</a>
            <a href="javascript:contributors()" class="btn btn-info"><i class="fa fa-users"></i> Contributors</a>
        </div>
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
            text: "This website has been made by bluedog and maintained by everyone listed here. Special thanks to KVKH for starting this idea.",
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
