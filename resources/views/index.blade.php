@extends('master')

@section('css')
<link rel="stylesheet" href="{{ asset('css/messenger/messenger.css') }}">
<link rel="stylesheet" href="{{ asset('css/messenger/messenger-theme-future.css') }}">
@endsection

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
				<div class="sub">Brought to you by <a href="https://web.facebook.com/groups/317157295144382/">#EEE500</a> <a href="https://twitter.com/The13thSet">#the13set</a></div>
			</div>

			<div class="twitter-button" id="twitter_login">
				<img src="{{ asset('img/Twitter_Logo_WhiteOnWhite.svg') }}" alt="Twitter" class="new-twitter-logo left">
				<div class="new-twitter-text left" style="color: #fff;">Continue with Twitter</div>
			</div>

			<div class="twitter-button facebook-button" id="facebook_login">
				<img src="{{ asset('img/FB.png') }}" alt="Facebook" class="new-twitter-logo left">
				<div class="new-twitter-text left">Continue with Facebook</div>
			</div>

			<div class="menu-footer visible-xs">
				<div class="main">The New Year Giveaway</div>
				<div class="sub">Brought to you by <a href="https://web.facebook.com/groups/317157295144382/">#EEE500</a> <a href="https://twitter.com/The13thSet">#the13set</a></div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/messenger/messenger.min.js') }}"></script>
<script src="{{ asset('js/messenger/messenger-theme-future.js') }}"></script>
<script>
    $(document).ready(function() {
    	// Check browser support for animations
    	if (!!((window.CSS && window.CSS.supports) || window.supportsCSS || false) && window.CSS.supports('animation', 'f')) {
    		// continue
    	} else {
    		Messenger.options = {
			    extraClasses: 'messenger-fixed messenger-on-bottom',
			    theme: 'future'
			}

			Messenger().post({
				message: "Browser not supported. Update or switch for a better experience.",
				hideAfter: 100000,
				hideOnNavigate: true,
				type: "error"
			})
    	}

    	// Login buttons
        $('#twitter_login').on('click touchstart', function() {
            window.location = "{{ route('twitter_login') }}";
        });

        $('#facebook_login').on('click touchstart', function() {
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