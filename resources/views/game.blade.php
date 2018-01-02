@extends('master')

@section('content')
    <div class="game-page">
        <div class="new-pledge-box">
            <div class="game-label pledge-label">
                <div class="game-label-sub">I want to</div>
                <div class="game-label-main">Pledge</div>

                <div class="game-line"></div>
                <div class="clearfix"></div>
            </div>
        </div>

        @if (count(Auth::user()->pledges)) 
        <div class="new-play-box new-play-box-enabled">
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
        <a href="{{ route('pledges') }}">Pledges</a>
        <a href="{{ route('plays') }}">Plays</a>
        <a href="{{ route('wins') }}">Wins</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('.new-pledge-box').on('click touchstart', function() {
            window.location = "{{ route('pledge') }}";
        })

        $('.new-play-box.new-play-box-enabled').on('click touchstart', function() {
            window.location = "{{ route('play') }}";
        })
    });
</script>

@endsection