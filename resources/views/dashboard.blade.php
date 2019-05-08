<!doctype html>
<html lang="{{ app()->getLocale() }}">

@include('partials.head')

<body class="arcades" style="background-image: url('{{getRandomBackground()}}')">

<div class="container-fluid arcade">
    <div class="row header">
        <h1><img src="/img/ow-icon-115.png" class="ow-icon">Today's Arcade<img src="/img/ow-arcade-115.png"
                                                                               class="ow-arcade-icon"></h1>
        <div class="reset">Day Resets in <span class="timer">00:00:00</span></div>
    </div>
    @if(!\App\Today::alreadyHaveGamemodeToday())
        <h3 class="notice"><span class="badge badge-warning">WARNING</span> Today's arcade hasn't been updated yet</h3>
    @endif

    <div class="row card-grid">
        <div class="card -large">
            <span class="card-ribbon">Changes weekly</span>
            <img src="{{getTileImageByCode($today->tile_large->code, true)}}" class="card-image">
            <div class="card-body">
                <p class="card-text item">{{$today->tile_large->players}}</p>
                <h5 class="card-title item">{{$today->tile_large->name}}</h5>
            </div>
        </div>
        <div class="secondary">
            <div class="row">
                <div class="card">
                    <span class="card-ribbon">Changes weekly</span>
                    <img src="{{getTileImageByCode($today->tile_weekly_1->code)}}" class="card-image">
                    <div class="card-body">
                        <p class="card-text item">{{$today->tile_weekly_1->players}}</p>
                        <h5 class="card-title item">{{$today->tile_weekly_1->name}}</h5>
                    </div>
                </div>
                <div class="card">
                    <span class="card-ribbon -secondary">Changes daily</span>
                    <img src="{{getTileImageByCode($today->tile_daily->code)}}" class="card-image">
                    <div class="card-body">
                        <p class="card-text item">{{$today->tile_daily->players}}</p>
                        <h5 class="card-title item">{{$today->tile_daily->name}}</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card">
                    <span class="card-ribbon">Changes weekly</span>
                    <img src="{{getTileImageByCode($today->tile_weekly_2->code)}}" class="card-image">
                    <div class="card-body">
                        <p class="card-text item">{{$today->tile_weekly_2->players}}</p>
                        <h5 class="card-title item">{{$today->tile_weekly_2->name}}</h5>
                    </div>
                </div>
                <div class="card">
                    <img src="{{getTileImageByCode($today->tile_permanent->code)}}" class="card-image">
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
                <span class="badge badge-warning">Logged in as: {{Auth::user()->battletag}}</span> <br/>
            @endif
            <span class="badge badge-success">Last updated: {{\Carbon\Carbon::parse($today->created_at)->diffForHumans()}}</span>
            <span class="badge badge-success">Last updated by: {{$today->byUser->battletag}}</span>
        </div>
        <div class="item action-buttons">
            @if( Auth::check() )
                <div class="btn-group">
                    <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <i class="fas fa-magic"></i> Staff actions
                    </a>
                    <div class="dropdown-menu">
                        @if(!\App\Today::alreadyHaveGamemodeToday())
                            <a class="dropdown-item" href="/gamemode"><i class="fas fa-check-circle"
                                                                         style="color:green;"></i> Set Today's
                                Arcade</a>
                        @else
                            <form method="POST" id="revertGamemode" action="{{route('gamemode.revert')}}">
                                {{csrf_field()}}
                                <a href="javascript:revertTodaysGamemode()" class="dropdown-item"><i
                                            class="fas fa-times-circle" style="color:red;"></i> Revert submittion</a>
                            </form>
                        @endif
                        <a href="/twitter" class="dropdown-item"><i class="fab fa-twitter" style="color:#1da1f2"></i>
                            Twitter text</a>
                    </div>
                </div>

            @endif
            <a href="javascript:fader('.arcade', '.api')" class="btn btn-info"><i class="fas fa-cog"></i> Free API</a>
            <a href="javascript:fader('.arcade', '.downloading')" class="btn btn-info"><i class="fas fa-bullhorn"></i>
                Notify me</a>
            <a href="javascript:fader('.arcade', '.contributors')" class="btn btn-info"><i class="far fa-life-ring"></i>
                Contributors</a>
        </div>
    </div>

    <div class="footer">
        <p>Game content and materials are trademarks and copyrights of their respective publisher and its licensors. All
            rights reserved.</p>
        <p>This site is made for fun by <a href="//bluedog.dev">bluedog</a></p>
    </div>
</div>

<div class="container contributors" style="display:none;">
    <h1>Contributors</h1>
    @foreach($contributors->chunk(5) as $contributorRow)
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
    <a href="javascript:fader('.api, .downloading, .contributors', '.arcade')" class="btn btn-primary">Back</a>
</div>

<div class="container api" style="display: none;">
    <h1><img src="/img/ow-icon-115.png" class="ow-icon">Arcade REST API</h1>
    <p>Please be a nice person and don't abuse or sell or do any other unethical things with this free API.</p>
    <p>Giving credit is always appreciated 😁</p>
    <br/>
    <table class="table table-hover table-striped">
        <thead>
        <th>Name</th>
        <th>URL</th>
        <th>Method</th>
        <th>Notes</th>
        </thead>
        <tbody>
        <tr>
            <td>Today's gamemode</td>
            <td><a href="/api/today">/api/today</a></td>
            <td>get</td>
            <td>Returns empty json array when there's no today's gamemode set yet</td>
        </tr>
        <tr>
            <td>This week's gamemodes</td>
            <td><a href="/api/week">/api/week</a></td>
            <td>get</td>
            <td>-</td>
        </tr>
        <tr>
            <td>All gamemodes</td>
            <td><a href="/api/gamemodes">/api/gamemodes</a></td>
            <td>get</td>
            <td>-</td>
        </tr>
        </tbody>
    </table>
    <a href="javascript:fader('.api, .downloading, .contributors', '.arcade')" class="btn btn-primary">Back</a>
</div>

<div class="container downloading" style="display: none;">
    <h1><img src="/img/ow-icon-115.png" class="ow-icon">Get notified</h1>
    <div class="row mb-4 mt-4">
        <div class="col-md-4 col-sm-12">
            <h3><img src="/img/notify/microsoft.png" height="32px;"> Windows application</h3>
            <p style="min-height:80px;">Download the standalone desktop application built by RomanGL. Directly available
                from the Microsoft
                store. This application is <a href="https://github.com/RomanGL/OWArcadeToday">opensource</a></p>
            <a href="//www.microsoft.com/store/apps/9NJPP10NDSR4" class="btn btn-sm btn-warning"><i
                        class="fa fa-download"></i> Download</a>
        </div>
        <div class="col-md-4 col-sm-12">
            <h3><img src="/img/notify/discord.png" height="32px;"> Discord</h3>
            <p style="min-height:80px;">Join the Discord server and get a notified with the Discord bot built by
                Chaosx.</p>
            <a href="https://discord.gg/RAEyG9w" class="btn btn-sm btn-success">Join Discord</a>
        </div>
        <div class="col-md-4 col-sm-12">
            <h3><img src="/img/notify/twitter.png" height="32px;"> Twitter</h3>
            <p style="min-height:80px;">Follow the Twitter, when a user submits on the website it will be automatically
                posted on Twitter.</p>
            <a href="https://twitter.com/OWarcade?ref_src=twsrc%5Etfw" data-size="large" class="twitter-follow-button"
               data-show-count="true">Follow @OWarcade</a>
            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
    </div>
    <hr/>
    <a href="javascript:fader('.api, .downloading, .contributors', '.arcade')" class="btn btn-primary">Back</a>
</div>

</body>
<script src="{{ URL::asset('/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"
        integrity="sha256-FSEeC+c0OJh+0FI23EzpCWL3xGRSQnNkRGV2UF5maXs=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="{{ URL::asset('/js/reset-timer.js') }}"></script>
<script>

    @if(Auth::check())
    function revertTodaysGamemode() {
        swal({
            title: "Are you sure?",
            text: "You are about to revert today\'s gamemode",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $("#revertGamemode").submit();
                }
            });
    }

    @endif

    function fader(fadeOut, fadeIn) {
        $(fadeOut).fadeOut(250);
        $(fadeIn).delay(250).fadeIn(250);
    }
</script>
</html>