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
		    	@forelse($plays as $play)
		    		<div class="play">
		    			<div class="play-time">{{ Carbon\Carbon::parse($play->created_at)->diffForHumans()  }}</div>
		    			<div class="play-player">{{ $play->player->name }}</div>
		    			<div class="play-play">@if ($play->win) W @else L @endif</div>
		    		</div>
		    	@empty
		    		<i>No plays yet. Make a pledge and play!</i>
		    	@endforelse
		    </div>

		    <div class="plays plays-x">
		    	@forelse($plays as $play)
		    		<div class="play-x">
		    			<span class="play-time">{{ Carbon\Carbon::parse($play->created_at)->diffForHumans() }}</span> <br>
		    			<span class="play-player">{{ $play->player->name }}</span> scored
		    			<span class="play-play">@if ($play->win) W @else L @endif</span>
		    		</div>
		    	@empty
		    		<i>No plays yet. Make a pledge and play!</i>
		    	@endforelse
		    </div>
		</div>
	</div>
@endsection