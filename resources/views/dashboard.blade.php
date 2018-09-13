<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{env('APP_NAME')}}</title>

    <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style>
        body {
            background: url('/img/wallpaper.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .overlay {
            height: 100%;
            width: 100%;
            display: block;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
        }

        hr {
            background-color: rgba(255, 255, 255, 0.3);
        }

        h1 {
            color: #FFF;
            font-size: 48px;
            font-weight: bold;
            text-transform: uppercase;
            font-style: italic;
        }

        .container {
            padding-top: 250px;
        }

        .card {
            border: 3px solid rgba(255, 255, 255, 0);
            background: none;
        }

        .card-img-top {
            background: url('/img/bg.svg');
            height: 130px;
            background-size: contain;
            background-blend-mode: multiply;
            background-size: cover;
            margin: 0px -16px;
        }

        .card-body {
            background-color: #fdfdfd;
            margin: 0px -16px;
        }

        .text-wrap {
            padding: 0px 20px;
        }

        .large {
            height: 332px;
        }

        .large-image {
            margin-top: 100px;
        }

        .deathmatch {
            background-color: red;
        }

        .gamemode-icon {
            margin: 0px auto;
        }

        .players {
            color: #3c3cea;
            margin-top: 10px;
            font-style: italic;
        }

        .gamemode-title {
            margin-top: -5px;
            margin-bottom: 10px;
            text-transform: uppercase;
            font-style: italic;
            font-weight: 700;
            letter-spacing: -1px;
            color: #404040;
        }
    </style>
</head>
<body>
<div class="overlay"></div>

<div class="container">
    <h1>Today's Overwatch Arcade</h1>
    <div class="row" style="">
        <div class="card col-md-6">
            <div class="card-img-top deathmatch large">
                <div class="gamemode-icon text-center">
                    <img src="/img/gamemodes/deathmatch.png" class="large-image">
                </div>
            </div>
            <div class="card-body">
                <div class="text-wrap">
                    <h6 class="players">8 PLAYER FFA</h6>
                    <h4 class="gamemode-title">Gamemode title</h4>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="card col-md-6">
                    <div class="card-img-top deathmatch">
                        <div class="gamemode-icon text-center">
                            <img src="/img/gamemodes/deathmatch.png">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-wrap">
                            <h6 class="players">8 PLAYER FFA</h6>
                            <h4 class="gamemode-title">Gamemode title</h4>
                        </div>
                    </div>
                </div>
                <div class="card col-md-6">
                    <div class="card-img-top deathmatch">
                        <div class="gamemode-icon text-center">
                            <img src="/img/gamemodes/deathmatch.png">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-wrap">
                            <h6 class="players">8 PLAYER FFA</h6>
                            <h4 class="gamemode-title">Gamemode title</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card col-md-6">
                    <div class="card-img-top deathmatch">
                        <div class="gamemode-icon text-center">
                            <img src="/img/gamemodes/deathmatch.png">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-wrap">
                            <h6 class="players">8 PLAYER FFA</h6>
                            <h4 class="gamemode-title">Gamemode title</h4>
                        </div>
                    </div>
                </div>
                <div class="card col-md-6">
                    <div class="card-img-top deathmatch">
                        <div class="gamemode-icon text-center">
                            <img src="/img/gamemodes/deathmatch.png">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-wrap">
                            <h6 class="players">8 PLAYER FFA</h6>
                            <h4 class="gamemode-title">Gamemode title</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <hr/>
            <span class="badge badge-success"><i class="fa fa-clock-o"></i> Updated 2h 30m ago</span>
            <span class="badge badge-success">JohnDoe#2991</span>

            <div class="float-right">
                <a href="javascript:about()" class="btn btn-warning"><i class="fa fa-book"></i> About</a>
                <a href="javascript:about()" class="btn btn-info"><i class="fa fa-pencil"></i> Become a maintainer</a>
            </div>
        </div>
    </div>
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
            text: "This website has been made by bluedog and maintained by everyone listed here. Special thanks to KVKH for XYZ",
            button: "Alright, neat!",
        });
    }
</script>
</html>
