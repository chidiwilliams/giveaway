<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(Auth::check())
        <meta name="user-id" content="{{ Auth::user()->id }}">
    @endif

    <title>2018 New Year Giveaway</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    {{-- 
    <div class="header">2018 New Year Giveaway</div>
    <div>
        <div class="footer">EEE500l #the13thset</div>
    </div> --}}

    @if(Auth::check())
        <div class="welcome-user">{{ "@" . Auth::user()->handle }}</div>
    @endif

    <div id="app">
        @yield('content')
    </div> 

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>
</html>
