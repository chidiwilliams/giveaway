@extends('master')

@section('css')

@endsection

@section('content')
<div class="thank-you-page">
	<div class="central-text">
		<div class="thanks">Thank you for your gift!</div>
		<div class="tweet" style="margin-bottom: 10px;">I just made a pledge on the 2018 New Year Giveaway. #The2018Giveaway #NewYearGiveAway #EEE500 #the13thset</div>

		<div class="share-buttons" style="margin: auto; width: 165px;">
			<div style="float: left; margin-right: 15px;"><a href="https://twitter.com/intent/tweet?text=I%20just%20made%20a%20pledge%20on%20the%202018%20New%20Year%20Giveaway%21%20%23The2018Giveaway%20%23NewYearGiveaway%20%23EEE500%20%23the13thset&hastags=The2018Giveaway,NewYearGiveAway,EEE500,the13thset" class="twitter-share-button" data-size="large" data-show-count="true">Tweet</a></div>

			<div  style="float: left;"><div class="fb-share-button" data-href="http://thegiveaway.herokuapp.com/" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fthegiveaway.herokuapp.com%2F&amp;src=sdkpreparse">Share</a></div></div>

			<div class="clearfix"></div>
		</div>

		<div style="width: 225px; margin: 30px auto;">
			<a href="{{ route('game') }}" class="master-button" style="color: #033; text-decoration: none; padding: 10px 30px;">Return to home</a>
		</div>
	</div>
</div>
@endsection

@section('js')
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.11&appId=808732392643666';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
@endsection