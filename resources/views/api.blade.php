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
<div class="container api">
    <h1>Today's Overwatch Arcade REST API</h1>
    <p>Please be a nice person and don't abuse or sell or do any other unethical things with this free API.</p>
    <p>Giving credit is always appreciated 😁</p>
    <br />
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
                <td>/api/today</td>
                <td>get</td>
                <td>Returns empty json array when there's no today's gamemode set yet</td>
            </tr>
            <tr>
                <td>This week's gamemodes</td>
                <td>/api/week</td>
                <td>get</td>
                <td>-</td>
            </tr>
        </tbody>
    </table>
    <a href="/" class="btn btn-primary">Back</a>
</div>


</body>
<script src="{{ URL::asset('/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('/js/bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"
        integrity="sha256-FSEeC+c0OJh+0FI23EzpCWL3xGRSQnNkRGV2UF5maXs=" crossorigin="anonymous"></script>
</html>
