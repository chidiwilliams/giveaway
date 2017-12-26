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
</head>
<body>
    @section('heafoo')
        <div class="heafoo">
            <div class="header">
                <a href="/">The Christmas Giveaway</a>
            </div>
            <div class="footer">EEE500l #the13thset</div>
        </div>
    @show

    <div class="welcome-user">{{ "@" . Auth::user()->handle }}</div>

    <div id="app">
        @yield('content')
    </div> 

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
