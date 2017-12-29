@extends('master')

@section('content')
<div class="play-page">
    <div class="central">
        <a href="{{ route('twitter_login') }}" class="twitter-link">
            <div class="card">
                <img src="{{ asset('img/Twitter_Logo_WhiteOnWhite.svg') }}" class="twitter-logo left" alt="">
                <div class="continue left">Continue with Twitter</div>
            </div>
        </a>
    </div>
</div>
@endsection
