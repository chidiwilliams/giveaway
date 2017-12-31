@extends('master')

@section('content')
    <div class="game-page">
        <div class="new-pledge-box" onclick="window.location = `{{ route('pledge') }}`">
            <div class="game-label pledge-label">
                <div class="game-label-sub">I want to</div>
                <div class="game-label-main">Pledge</div>

                <div class="game-line"></div>
                <div class="clearfix"></div>
            </div>
        </div>

        @if (count(Auth::user()->pledges)) 
        <div class="new-play-box" onclick="window.location = `{{ route('play') }}`">
        @else
        <div class="new-play-box new-play-box-disabled">
        @endif
            <div class="game-label play-label">
                <div class="game-label-sub">I want to</div>
                <div class="game-label-main">Play</div>

                <div class="game-line"></div>
                <div class="clearfix"></div>

                @if (!count(Auth::user()->pledges)) 
                    <div class="pledge-plead" style="">
                        Playing is currently disabled
                        <br> 
                        Make a pledge to continue
                    </div>
                @endif 
            </div>
        </div>
    </div>

    <div class="master-menu">
        <a href="">View pledges</a>
        <a href="">View plays</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
@endsection