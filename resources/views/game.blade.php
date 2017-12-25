@extends('master')

@section('content')
	<a href="{{ route('pledge') }}" class="pledge-box">
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
	</a>
@endsection