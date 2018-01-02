@extends('master')

@section('content')
	<div class="plays-page">
		<div class="container" v-cloak>
			<div class="page-heading">
		        <div class="page-name">Plays</div>
		        <div class="page-line"></div>

		        @include('submenu')
		    </div>

		    <div class="plays hidden-xs">
		    	<div class="play header">
		    		<div class="play-time">Time</div>
	    			<div class="play-player">Name</div>
	    			<div class="play-play">Play</div>
		    	</div>
		    	@foreach($plays as $play)
		    		<div class="play">
		    			<div class="play-time">{{ Carbon\Carbon::parse($play->created_at)->diffForHumans()  }}</div>
		    			<div class="play-player">{{ $play->player->name }}</div>
		    			<div class="play-play">@if ($play->win) W @else L @endif</div>
		    		</div>
		    	@endforeach
		    </div>

		    <div class="plays plays-x">
		    	@foreach($plays as $play)
		    		<div class="play-x">
		    			<span class="play-time">{{ Carbon\Carbon::parse($play->created_at)->diffForHumans() }}</span> <br>
		    			<span class="play-player">{{ $play->player->name }}</span> played
		    			<span class="play-play">@if ($play->win) W @else L @endif</span>
		    		</div>
		    	@endforeach
		    </div>
		</div>
	</div>
@endsection