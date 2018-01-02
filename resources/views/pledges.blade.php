@extends('master')

@section('content')
	<div class="pledges-page">
		<div class="container" v-cloak>
			<div class="page-heading">
		        <div class="page-name">Pledges</div>
		        <div class="page-line"></div>

		        @include('submenu')
		    </div>

		    <div class="pledges hidden-xs">
		    	<div class="pledge header">
		    		<div class="pledge-time">Time</div>
	    			<div class="pledge-pledger">Name</div>
	    			<div class="pledge-item">Item</div>
	    			<div class="pledge-qty">Quantity</div>
		    	</div>
		    	@forelse($pledges as $pledge)
		    		<div class="pledge">
		    			<div class="pledge-time">{{ Carbon\Carbon::parse($pledge->created_at)->diffForHumans()  }}</div>
		    			<div class="pledge-pledger">{{ $pledge->pledger->name }}</div>
		    			<div class="pledge-item">{{ ucwords(strtolower($pledge->item)) }}</div>
		    			<div class="pledge-qty">{{ $pledge->qty }}</div>
		    		</div>
		    	@empty
			    	<i>No pledges yet. Make one and win a prize!</i>
		    	@endforelse
		    </div>

		    <div class="pledges pledges-x">
		    	@forelse($pledges as $pledge)
		    		<div class="pledge-x">
		    			<span class="pledge-time">{{ Carbon\Carbon::parse($pledge->created_at)->diffForHumans() }}</span> <br>
		    			<span class="pledge-pledger">{{ $pledge->pledger->name }}</span>
		    			<span class="pledge-item">{{ ucwords(strtolower($pledge->item)) }}</span> x
		    			<span class="pledge-qty">{{ $pledge->qty }}</span>
		    		</div>
		    	@empty
			    	<i>No pledges yet. Make one and win a prize!</i>
		    	@endforelse
		    </div>
		</div>
	</div>
@endsection