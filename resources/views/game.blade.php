@extends('master')

@section('content')
{{--     <a href="{{ route('pledge') }}" class="pledge-box">
        <div class="choice-box">
            <div class="pledge-wish">I want to</div>
            <div class="pledge-action">Pledge</div>
            <div class="pledge-line"></div>
        </div>
    </a>

    <a href="{{ route('play') }}" class="play-box">
        <div class="choice-box">
            <div class="pledge-wish">I want to</div>
            <div class="pledge-action">Play</div>
            <div class="pledge-line"></div>
        </div>
    </a> --}}

    <div class="game-page">
        <div class="new-pledge-box" onclick="window.location = `{{ route('pledge') }}`">
            <div class="game-label pledge-label">
                <div class="game-label-sub">I want to</div>
                <div class="game-label-main">Pledge</div>
                <div class="game-line"></div>
            </div>
        </div>
        <div class="new-play-box" onclick="window.location = `{{ route('play') }}`">
            <div class="game-label pledge-label">
                <div class="game-label-sub">I want to</div>
                <div class="game-label-main">Play</div>
                <div class="game-line"></div>
            </div>
        </div>
    </div>
@endsection