@extends('master')

@section('heafoo')
@endsection

@section('content')
<div class="thank-you-page">
	<div class="central-text">
		<div class="thanks">Thank you for your gift!</div>
		<div class="sub">We'll notify you when someone wins it</div>
		<a href="{{ route('game') }}" class="master-button">Return to home</a>
	</div>
</div>
@endsection