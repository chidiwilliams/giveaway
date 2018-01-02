@extends('master')

@section('content')
	<div class="redeems-page">
		<div class="container" v-cloak>
			<div class="page-heading">
		        <div class="page-name">Wins</div>
		        <div class="page-line"></div>

		        @include('submenu')
		    </div>

		    <div class="redeems hidden-xs">
		    	<div class="redeem header">
		    		<div class="redeem-time">Time</div>
	    			<div class="redeem-winner">Winner</div>
	    			<div class="redeem-item">Item</div>
	    			<div class="redeem-qty">Qty</div>
	    			<div class="redeem-pledger">Pledger</div>
		    	</div>
		    	@foreach($redeems as $redeem)
		    		<div class="redeem">
		    			<div class="redeem-time">{{ Carbon\Carbon::parse($redeem->created_at)->diffForHumans() }}</div>
		    			<div class="redeem-winner">{{ $redeem->winner->name }}</div>
		    			<div class="redeem-item">{{ $redeem->pledge->item }}</div>
		    			<div class="redeem-qty">{{ $redeem->pledge->qty }}</div>
		    			<div class="redeem-pledger">{{ $redeem->pledge->pledger->name }}</div>
		    		</div>
		    	@endforeach
		    </div>

		    <div class="redeems redeems-x">
		    	@foreach($redeems as $redeem)
		    		<div class="redeem-x">
		    			<span class="redeem-time">{{ Carbon\Carbon::parse($redeem->created_at)->diffForHumans() }}</span> <br>
		    			<span class="redeem-winner">{{ $redeem->winner->name }}</span> won 
		    			<span class="redeem-item">{{ $redeem->pledge->item }}</span> 
		    			x<span class="redeem-qty">{{ $redeem->pledge->qty }}</span> from 
		    			<span class="redeem-pledger">{{ $redeem->pledge->pledger->name }}</span> 
		    		</div>
		    	@endforeach
		    </div>
		</div>
	</div>
@endsection