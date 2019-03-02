<!doctype html>
<html lang="{{ app()->getLocale() }}" xmlns:javascript="http://www.w3.org/1999/xhtml">

@include('partials.head')

<body class="arcades" style="background-image: url('{{getRandomBackground()}}')">

<div class="container-fluid arcade">
    <h1>Pick Today's gamemodes</h1>

    {!! Form::open(['route' => 'gamemode.submit', 'style' => 'width:100%;']) !!}
    @include('partials.validation')

    <div class="row card-grid">
        <div class="card card_1 -large">
            <span class="card-ribbon">Changes weekly</span>
            <img src="/img/modes_large/petradeathmatch.jpg" class="card-image">
            <div class="card-body">
                <p class="card-text item players">-</p>
                <h5 class="card-title item">-</h5>
            </div>
            <div class="form-group">
                {!! Form::select('tile_1', $gamemodes, '', ['class' => 'selectpicker form-control', 'card' => 1, 'title' => 'Choose a gamemode', 'data-live-search' => 'true']); !!}
            </div>
        </div>
        <div class="secondary">
            <div class="row">
                <div class="card card_2">
                    <span class="card-ribbon">Changes weekly</span>
                    <img src="/img/modes/mysteryheroes.jpg" class="card-image">
                    <div class="card-body">
                        <p class="card-text item players">-</p>
                        <h5 class="card-title item">-</h5>
                    </div>
                    <div class="form-group">
                        {!! Form::select('tile_2', $gamemodes, '', ['class' => 'selectpicker form-control', 'card' => 2, 'title' => 'Choose a gamemode', 'data-live-search' => 'true']); !!}
                    </div>
                </div>
                <div class="card card_4">
                    <span class="card-ribbon -secondary">Changes daily</span>
                    <img src="/img/modes/mysteryheroes.jpg" class="card-image">
                    <div class="card-body">
                        <p class="card-text item players">-</p>
                        <h5 class="card-title item">-</h5>
                    </div>
                    <div class="form-group">
                        {!! Form::select('tile_4', $gamemodes, '', ['class' => 'selectpicker form-control', 'card' => 4, 'title' => 'Choose a gamemode', 'data-live-search' => 'true']); !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card card_3">
                    <span class="card-ribbon">Changes weekly</span>
                    <img src="/img/modes/mysteryheroes.jpg" class="card-image">
                    <div class="card-body">
                        <p class="card-text item players">-</p>
                        <h5 class="card-title item">-</h5>
                    </div>
                    <div class="form-group">
                        {!! Form::select('tile_3', $gamemodes, '', ['class' => 'selectpicker form-control', 'card' => 3, 'title' => 'Choose a gamemode', 'data-live-search' => 'true']); !!}
                    </div>
                </div>
                <div class="card card_5">
                    <img src="/img/modes/mysteryheroes.jpg" class="card-image">
                    <div class="card-body">
                        <p class="card-text item players">-</p>
                        <h5 class="card-title item">-</h5>
                    </div>
                    <div class="form-group">
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
<script src="{{ URL::asset('/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"
        integrity="sha256-FSEeC+c0OJh+0FI23EzpCWL3xGRSQnNkRGV2UF5maXs=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"
        integrity="sha256-BEqTcxuDdEftl1gxpORMY6kS6tR8RJIL3WxfXKKTI+g=" crossorigin="anonymous"></script>

<script>
    var modes = {!! $modes !!};

    function fillTile(index, cardId) {
        var mode = modes[index - 1];
        var folder = 'modes/';
        console.log(mode);
        $(".card_" + cardId + " .card-text").text(mode['players']);
        $(".card_" + cardId + " .card-title").text(mode['name']);
        if (cardId == 1) { folder = 'modes_large/' };
        $(".card_" + cardId + " .card-image").attr('src', '/img/' + folder + mode['code'] + '.jpg');
    }

    $(function() {
        $('.selectpicker').on('changed.bs.select', function () {
            fillTile($(this).val(), $(this).attr('card'));
        });

        @if($thisWeeksGamemode)
        $('.card_1 .selectpicker').val({{$thisWeeksGamemode->tile_1 }}).change();
        $('.card_2 .selectpicker').val({{$thisWeeksGamemode->tile_2 }}).change();
        $('.card_3 .selectpicker').val({{$thisWeeksGamemode->tile_3 }}).change();
        @endif
        $('.card_5 .selectpicker').val(14).change();
    });
</script>
</html>
