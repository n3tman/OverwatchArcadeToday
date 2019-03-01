<!doctype html>
<html lang="{{ app()->getLocale() }}" xmlns:javascript="http://www.w3.org/1999/xhtml">

@include('partials.head')

<body style="background-image: url('{{$background}}')">
<div class="overlay"></div>

<div class="container-fluid arcade">
    <h1>Pick Today's gamemodes</h1>

    {!! Form::open(['route' => 'gamemode.submit', 'style' => 'width:100%;']) !!}
    @include('partials.validation')

    <div class="row mt-4" style="">
        <div class="card card_1 col-md-6">
            <div class="head large" style="height:332px">
                <div class="gamemode-icon text-center">
                    <span class="badge badge-success badge-secondary card-ribbon">Changes weekly</span>
                    <img src="/img/gamemodes/mystery.png" class="large-image">
                </div>
            </div>
            <div class="body">
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
                    <div class="head">
                        <div class="gamemode-icon text-center">
                            <span class="badge badge-success badge-secondary card-ribbon">Changes weekly</span>
                            <img src="/img/gamemodes/mystery.png" class="small-image">
                        </div>
                    </div>
                    <div class="body">
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
                    <div class="head ">
                        <div class="gamemode-icon text-center">
                            <span class="badge badge-warning badge-secondary card-ribbon">Changes daily</span>
                            <img src="/img/gamemodes/mystery.png" class="small-image">
                        </div>
                    </div>
                    <div class="body">
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
                    <div class="head">
                        <div class="gamemode-icon text-center">
                            <span class="badge badge-success badge-secondary card-ribbon">Changes weekly</span>
                            <img src="/img/gamemodes/mystery.png" class="small-image">
                        </div>
                    </div>
                    <div class="body">
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
                    <div class="head">
                        <div class="gamemode-icon text-center">
                            <img src="/img/gamemodes/mystery.png" class="small-image">
                        </div>
                    </div>
                    <div class="body">
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

    $('.selectpicker').on('changed.bs.select', function () {
        fillTile($(this).val(), $(this).attr('card'));
    });

    function fillTile(index, cardId) {
        var mode = modes[index - 1];
        console.log(mode);
        $(".card_" + cardId + " .card-img-top").attr('class', 'card-img-top').addClass(mode['code']);
        $(".card_" + cardId + " h6").text(mode['players']);
        $(".card_" + cardId + " h4").text(mode['name']);
        $(".card_" + cardId + " img").attr('src', '/img/gamemodes/' + mode['code'] + '.png');
    }

    setTimeout(function () {
        @if($thisWeeksGamemode)
        $('.card_1 .selectpicker').val({{$thisWeeksGamemode->tile_1 }}).change();
        $('.card_2 .selectpicker').val({{$thisWeeksGamemode->tile_2 }}).change();
        $('.card_3 .selectpicker').val({{$thisWeeksGamemode->tile_3 }}).change();
        @endif
        $('.card_5 .selectpicker').val(14).change();
    }, 100);
</script>
</html>
