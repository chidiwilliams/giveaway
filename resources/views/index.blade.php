<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>The Christmas Giveaway</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Raleway:300,400,600");
        @import url("https://fonts.googleapis.com/css?family=Open+Sans");
        @import url("https://fonts.googleapis.com/css?family=Varela+Round");
        @import url("https://fonts.googleapis.com/css?family=Pacifico");
        @import url("https://fonts.googleapis.com/css?family=Lobster");

        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            /*background-color: #5BC3B8;*/
            background-color: #FCF665;
        }

        a, a:hover, a:selected, a:active {
            color: inherit;
            text-decoration: none;
        }

        .header {
            position: absolute;
            text-align: center;
            top: 0;
            margin: auto;
            width: 100%;
            margin-top: 30px;
            font-weight: 900;
            text-transform: uppercase;
            font-size: 32px;
            word-spacing: 7px;
            font-family: "Lobster", "Pacifico", "Raleway";
        }

        .header a {
            text-decoration: none;
            color: #022;
        }

        .footer {
            position: absolute;
            bottom: 0;
            text-align: center;
            margin: auto;
            width: 100%;
            margin-bottom: 20px;
            font-size: 20px;
            font-family: "Open Sans";
            color: #022c;
        }

        .central
        {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .card
        {
            width: 475px;
            height: 100px;
            box-shadow: 0 3px 3px #0005;
            border-radius: 7px;
            background: linear-gradient(#00aced 70%, #0384b5);
        }

        .continue {
            font-size: 30px;
            line-height: 36px;
            font-family: "Varela Round", "Open Sans", "Segoe UI", sans-serif;
            color: #fffffff0;
            margin: 35px 0;
            text-shadow: 0 2px 2px #0002;
        }

        .twitter-link:hover .card
        {
            -webkit-animation: darken 1s forwards;
            -o-animation: darken 1s forwards;
            animation: darken 1s forwards;
        }

        .twitter-logo
        {
            width: 50px;
            height: 50px;
            margin: 25px 32px 25px 37.5px;
        }

        .left {
            float: left;
        }

        @keyframes darken {
            0% {
                text-shadow: 0 2px 2px #0002;
                background: linear-gradient(#00aced 70%, #0384b5);
            }

            100% {
                text-shadow: 0 2px 2px #0003;
                background: linear-gradient(#00a1de 70%, #00739e);
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <a href="/">The Christmas Giveaway</a>
    </div>
    <div class="central">
        <a href="{{ route('twitter_login') }}" class="twitter-link">
            <div class="card">
                <img src="{{ asset('img/Twitter_Logo_WhiteOnWhite.svg') }}" class="twitter-logo left" alt="">
                <div class="continue left">Continue with Twitter</div>
            </div>
        </a>
    </div>
    <div class="footer">EEE500l #the13thset</div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
