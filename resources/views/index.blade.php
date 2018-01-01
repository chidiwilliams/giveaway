@extends('master')

@section('content')
<div class="index-page" style="height: 100%;">
	<div class="container index-container">
		<div class="index-text">
			<div class="index-seller">
				<div class="index-seller-header">Share gifts with friends</div>
			</div>
		</div>
		
		<div class="index-menu">
			{{-- TODO: Add Twitter / FB links --}}
			<div class="menu-header hidden-xs">
				<div class="main">The New Year Giveaway</div>
				<div class="sub">Brought to you by #EEE500 #the13set</div>
			</div>

			<div class="twitter-button">
				<img src="{{ asset('img/Twitter_Logo_WhiteOnWhite.svg') }}" alt="Twitter" class="new-twitter-logo left">
				<div class="new-twitter-text left">Continue with Twitter</div>
			</div>

			<!-- {{-- TODO: Login with Facebook --}}
			<a href="{{ route('twitter_login') }}" class="twitter-link">
				<div class="twitter-button">
					<img src="{{ asset('img/Twitter_Logo_WhiteOnWhite.svg') }}" alt="Twitter" class="new-twitter-logo left">
					<div class="new-twitter-text left">Continue with Facebook</div>
				</div>
			</a> -->

			<div class="menu-footer visible-xs">
				<div class="main">The New Year Giveaway</div>
				<div class="sub">Brought to you by #EEE500 #the13set</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('.twitter-button').on('click touchstart', function() {
            window.location = "{{ route('twitter_login') }}";
        });
    });
</script>

@endsection