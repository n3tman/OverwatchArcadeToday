<!doctype html>
<html lang="{{ app()->getLocale() }}" xmlns:javascript="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{env('APP_NAME')}}</title>

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css"
          integrity="sha256-sJQnfQcpMXjRFWGNJ9/BWB1l6q7bkQYsRqToxoHlNJY=" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ URL::asset('css/overwatch_today.css') }}?ver={{env('APP_VERSION')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/gamemodes.css') }}?ver={{env('APP_VERSION')}}">

</head>
<body>
<div class="overlay"></div>

<div class="container arcade">
    <h1>Pick Today's gamemodes</h1>

    {!! Form::open(['route' => 'gamemode.submit', 'style' => 'width:100%;']) !!}
    @include('partials.validation')

    <div class="row mt-4" style="">
        <div class="card card_1 col-md-6">
            <div class="card-img-top large">
                <div class="gamemode-icon text-center">
                    <span class="badge badge-success badge-secondary cardRibbon">Changes weekly</span>
                    <img src="/img/gamemodes/.png" class="large-image">
                </div>
            </div>
            <div class="card-body">
                <div class="text-wrap">
                    <h6 class="players">-</h6>
                    <h4 class="gamemode-title">-</h4>
                </div>
            </div>
            <div class="form-group mt-1" style="margin: 0px -16px;">
                {!! Form::select('tile_1', $gamemodes, '', ['class' => 'selectpicker form-control', 'card' => 1, 'title' => 'Choose a gamemode', 'data-live-search' => 'true']); !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="card card_2 col-md-6">
                    <div class="card-img-top">
                        <div class="gamemode-icon text-center">
                            <span class="badge badge-success badge-secondary cardRibbon">Changes weekly</span>
                            <img src="/img/gamemodes/.png" class="small-image">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-wrap">
                            <h6 class="players">-</h6>
                            <h4 class="gamemode-title">-</h4>
                        </div>
                    </div>
                    <div class="form-group mt-1" style="margin: 0px -16px;">
                        {!! Form::select('tile_2', $gamemodes, '', ['class' => 'selectpicker form-control', 'card' => 2, 'title' => 'Choose a gamemode', 'data-live-search' => 'true']); !!}
                    </div>
                </div>
                <div class="card card_4 col-md-6">
                    <div class="card-img-top ">
                        <div class="gamemode-icon text-center">
                            <span class="badge badge-warning badge-secondary cardRibbon">Changes daily</span>
                            <img src="/img/gamemodes/.png" class="small-image">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-wrap">
                            <h6 class="players">-</h6>
                            <h4 class="gamemode-title">-</h4>
                        </div>
                    </div>
                    <div class="form-group mt-1" style="margin: 0px -16px;">
                        {!! Form::select('tile_4', $gamemodes, '', ['class' => 'selectpicker form-control', 'card' => 4, 'title' => 'Choose a gamemode', 'data-live-search' => 'true']); !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card card_3 col-md-6">
                    <div class="card-img-top">
                        <div class="gamemode-icon text-center">
                            <span class="badge badge-success badge-secondary cardRibbon">Changes weekly</span>
                            <img src="/img/gamemodes/.png" class="small-image">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-wrap">
                            <h6 class="players">-</h6>
                            <h4 class="gamemode-title">-</h4>
                        </div>
                    </div>
                    <div class="form-group mt-1" style="margin: 0px -16px;">
                        {!! Form::select('tile_3', $gamemodes, '', ['class' => 'selectpicker form-control', 'card' => 3, 'title' => 'Choose a gamemode', 'data-live-search' => 'true']); !!}
                    </div>
                </div>
                <div class="card card_5 col-md-6">
                    <div class="card-img-top ">
                        <div class="gamemode-icon text-center">
                            <img src="/img/gamemodes/.png" class="small-image">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-wrap">
                            <h6 class="players">-</h6>
                            <h4 class="gamemode-title">-</h4>
                        </div>
                    </div>
                    <div class="form-group mt-1" style="margin: 0px -16px;">
                        {!! Form::select('tile_5', $gamemodes, '', ['class' => 'selectpicker form-control', 'card' => 5, 'title' => 'Choose a gamemode', 'data-live-search' => 'true']); !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::submit('Submit', ['class' => 'btn btn-primary']); !!}
    {!! Form::close() !!}
</div>
</div>
</body>
<script src="{{ URL::asset('/js/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"
        integrity="sha256-E/V4cWE4qvAeO5MOhjtGtqDzPndRO1LBk8lJ/PR7CA4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"
        integrity="sha256-FSEeC+c0OJh+0FI23EzpCWL3xGRSQnNkRGV2UF5maXs=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"
        integrity="sha256-BEqTcxuDdEftl1gxpORMY6kS6tR8RJIL3WxfXKKTI+g=" crossorigin="anonymous"></script>

<script>

    var modes = {!! $modes !!};

    $('.selectpicker').on('changed.bs.select', function (e, index) {
        fillTile(index, $(this).attr('card'));
    });

    function fillTile(index, cardId) {
        var mode = modes[index - 1];
        $(".card_" + cardId + " .card-img-top").addClass(mode['code']);
        $(".card_" + cardId + " h6").text(mode['players']);
        $(".card_" + cardId + " h4").text(mode['name']);
        $(".card_" + cardId + " img").attr('src', '/img/gamemodes/'+mode['code']+'.png');
    }

    function about() {
        return swal({
            title: "About",
            text: "This website has been made by bluedog and maintained by everyone listed here. Special thanks to KVKH for XYZ",
            button: "Alright, neat!",
        });
    }
</script>
</html>
