@extends('master')

@section('heafoo')
@endsection

@section('content')
<div class="thank-you-page">
	<div class="central-text">
		<div class="thanks">Thank you for your gift!</div>
		<a href="{{ route('game') }}" class="master-button" style="color: #033; text-decoration: none; padding: 10px 30px;">Return to home</a>
	</div>
</div>
@endsection