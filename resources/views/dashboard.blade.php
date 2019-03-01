<!doctype html>
<html lang="{{ app()->getLocale() }}">

@include('partials.head')

<body style="background-image: url('{{$background}}')">
<div class="container arcade">
    <h1>Today's Overwatch Arcade</h1>
    @if(!\App\Today::alreadyHaveGamemodeToday())
        <h3><span class="badge badge-warning">WARNING</span> Today's arcade has not been updated yet</h3>
    @endif
    <div class="row mt-4" style="">
        <div class="card col-md-6">
            <div class="card-img-top {{$today->tile_large->code}} large">
                <div class="gamemode-icon text-center">
                    <span class="badge badge-success badge-secondary cardRibbon">Changes weekly</span>
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
                            <span class="badge badge-success badge-secondary cardRibbon">Changes weekly</span>
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
                            <span class="badge badge-warning badge-secondary cardRibbon">Changes daily</span>
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
                            <span class="badge badge-success badge-secondary cardRibbon">Changes weekly</span>
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
    <h1 class="mb-4">Contributors</h1>
    @foreach($contributors->chunk(6) as $contributorRow)
        <div class="row">
            @foreach($contributorRow as $contributor)
                <div class="card contributor-card" style="width: 12rem;">
                    <img class="card-img-top" src="{{$contributor->avatar}}">
                    <div class="card-body">
                        <h6 class="players">{{$contributor->contributions()}} contribution(s)</h6>
                        <h4 class="gamemode-title">{{$contributor->battletag}}</h4>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
    <a href="javascript:back()" class="btn btn-primary mt-4">Back</a>
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
