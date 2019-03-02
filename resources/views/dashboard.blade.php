<!doctype html>
<html lang="{{ app()->getLocale() }}">

@include('partials.head')

<body class="arcades" style="background-image: url('{{getRandomBackground()}}')">

<div class="container-fluid arcade">
    <h1><img src="/img/ow-icon-115.png" class="ow-icon">Today's Arcade<img src="/img/ow-arcade-115.png" class="ow-arcade-icon"></h1>
    @if(!\App\Today::alreadyHaveGamemodeToday())
        <h3 class="notice"><span class="badge badge-warning">WARNING</span> Today's arcade hasn't been updated yet</h3>
    @endif

    <div class="row card-grid">
        <div class="card -large">
            <span class="card-ribbon">Changes weekly</span>
            <img src="/img/modes_large/{{$today->tile_large->code}}.jpg" class="card-image">
            <div class="card-body">
                <p class="card-text item">{{$today->tile_large->players}}</p>
                <h5 class="card-title item">{{$today->tile_large->name}}</h5>
            </div>
        </div>
        <div class="secondary">
            <div class="row">
                <div class="card">
                    <span class="card-ribbon">Changes weekly</span>
                    <img src="/img/modes/{{$today->tile_weekly_1->code}}.jpg" class="card-image">
                    <div class="card-body">
                        <p class="card-text item">{{$today->tile_weekly_1->players}}</p>
                        <h5 class="card-title item">{{$today->tile_weekly_1->name}}</h5>
                    </div>
                </div>
                <div class="card">
                    <span class="card-ribbon -secondary">Changes daily</span>
                    <img src="/img/modes/{{$today->tile_daily->code}}.jpg" class="card-image">
                    <div class="card-body">
                        <p class="card-text item">{{$today->tile_daily->players}}</p>
                        <h5 class="card-title item">{{$today->tile_daily->name}}</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card">
                    <span class="card-ribbon">Changes weekly</span>
                    <img src="/img/modes/{{$today->tile_weekly_2->code}}.jpg" class="card-image">
                    <div class="card-body">
                        <p class="card-text item">{{$today->tile_weekly_2->players}}</p>
                        <h5 class="card-title item">{{$today->tile_weekly_2->name}}</h5>
                    </div>
                </div>
                <div class="card">
                    <img src="/img/modes/{{$today->tile_permanent->code}}.jpg" class="card-image">
                    <div class="card-body">
                        <p class="card-text item">{{$today->tile_permanent->players}}</p>
                        <h5 class="card-title item">{{$today->tile_permanent->name}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="info-panel">
        <div class="item info">
            @if(Auth::check())
                <span class="badge badge-warning">Logged in as: {{Auth::user()->battletag}}</span>
            @endif
            <span class="badge badge-success">Last updated: {{\Carbon\Carbon::parse($today->created_at)->diffForHumans()}}</span>
            <span class="badge badge-success">Last updated by: {{$today->byUser->battletag}}</span>
        </div>
        <div class="item action-buttons">
            @if(Auth::check() && !\App\Today::alreadyHaveGamemodeToday())
                <a href="/gamemode" class="btn btn-success"><i class="fa fa-check-circle"></i> Set Today's Arcade</a>
            @endif
            <a href="javascript:about()" class="btn btn-warning"><i class="fa fa-book"></i> About</a>
            <a href="/api" class="btn btn-info"><i class="fa fa-gear"></i> Free API</a>
            <a href="javascript:contributors()" class="btn btn-info"><i class="fa fa-users"></i> Contributors</a>
        </div>
    </div>

    <div class="footer">
        <p>Game content and materials are trademarks and copyrights of their respective publisher and its licensors. All rights reserved.</p>
        <p>This site is made for fun by <a href="//bluedog.pw">bluedog</a></p>
    </div>
</div>

<div class="container contributors" style="display:none;">
    <h1>Contributors</h1>
    @foreach($contributors->chunk(6) as $contributorRow)
        <div class="row">
            @foreach($contributorRow as $contributor)
                <div class="card contributor-card" style="width: 12rem;">
                    <img class="card-image" src="{{$contributor->avatar}}">
                    <div class="card-body">
                        <p class="card-text item">{{$contributor->contributions()}} contribution(s)</p>
                        <h5 class="card-title item">{{$contributor->battletag}}</h5>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
    <a href="javascript:back()" class="btn btn-primary">Back</a>
</div>


</body>
<script src="{{ URL::asset('/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('/js/bootstrap.bundle.min.js') }}"></script>
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
        $(".contributors").fadeOut(250);
        $(".arcade").delay(250).fadeIn(250);
    }
</script>
</html>
