@extends('master')

@section('content')
<div class="index-page" style="height: 100%;">
	<div class="container index-container">
		<div class="index-text">
			<div class="index-seller">
				<div class="index-seller-header">Welcome to the Giveaway</div>
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
				<div class="new-twitter-text left" style="color: #fff;">Continue with Twitter</div>
			</div>

			<div class="facebook-button">
				<img src="{{ asset('img/Twitter_Logo_WhiteOnWhite.svg') }}" alt="Facebook" class="new-twitter-logo left">
				<div class="new-twitter-text left">Continue with Facebook</div>
			</div>

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

        $('.facebook-button').on('click touchstart', function() {
            window.location = "{{ route('facebook_login') }}";
        });

        var texts = ["Share with friends", "Enjoy the new year season", "Welcome to 2018!", "Win amazing gifts", "Welcome to the Giveaway"];
        var rndint = Math.round(Math.random() * texts.length);
        var count = 0;

        setInterval(function() {
        	$('.index-seller-header').fadeOut(function () {
        		if (count == texts.length) count = 0;
        		$(this).text(texts[count]).fadeIn();
        		count++;
        	});
        }, 5000);
    });
</script>

@endsection