<!doctype html>
<html lang="{{ app()->getLocale() }}" xmlns:javascript="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{env('APP_NAME')}}</title>

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{ URL::asset('css/overwatch_today.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css" integrity="sha256-sJQnfQcpMXjRFWGNJ9/BWB1l6q7bkQYsRqToxoHlNJY=" crossorigin="anonymous" />
</head>
<body>
<div class="overlay"></div>

<div class="container">
    {!! Form::open(['route' => 'gamemode.submit', 'style' => 'width:100%;']) !!}
    @include('partials.validation')

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('tile_1', 'Large tile', ['class' => 'col-sm-12 control-label']); !!}
                {!! Form::select('tile_1', $gamemodes, '', ['class' => 'selectpicker form-control', 'title' => 'Choose a gamemode', 'data-live-search' => 'true']); !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('tile_2', 'Tile left upper', ['class' => 'col-sm-12 control-label']); !!}
                    {!! Form::select('tile_2', $gamemodes, '', ['class' => 'selectpicker form-control', 'title' => 'Choose a gamemode', 'data-live-search' => 'true']); !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('tile_3', 'Tile right upper', ['class' => 'col-sm-12 control-label']); !!}
                    {!! Form::select('tile_3', $gamemodes, '', ['class' => 'selectpicker form-control', 'title' => 'Choose a gamemode', 'data-live-search' => 'true']); !!}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('tile_4', 'Tile left bottom', ['class' => 'col-sm-12 control-label']); !!}
                    {!! Form::select('tile_4', $gamemodes, '', ['class' => 'selectpicker form-control', 'title' => 'Choose a gamemode', 'data-live-search' => 'true']); !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('tile_5', 'Tile right botom', ['class' => 'col-sm-12 control-label']); !!}
                    {!! Form::select('tile_5', $gamemodes, '7', ['class' => 'selectpicker form-control', 'title' => 'Choose a gamemode', 'data-live-search' => 'true']); !!}
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha256-E/V4cWE4qvAeO5MOhjtGtqDzPndRO1LBk8lJ/PR7CA4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"
        integrity="sha256-FSEeC+c0OJh+0FI23EzpCWL3xGRSQnNkRGV2UF5maXs=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js" integrity="sha256-BEqTcxuDdEftl1gxpORMY6kS6tR8RJIL3WxfXKKTI+g=" crossorigin="anonymous"></script>

<script>
    function about() {
        return swal({
            title: "About",
            text: "This website has been made by bluedog and maintained by everyone listed here. Special thanks to KVKH for XYZ",
            button: "Alright, neat!",
        });
    }
</script>
</html>
