@extends('master')

@section('css')
<link rel="stylesheet" href="{{ asset('css/messenger/messenger.css') }}">
<link rel="stylesheet" href="{{ asset('css/messenger/messenger-theme-future.css') }}">
<style>
    #twitter-widget-0
    {
        vertical-align: bottom !important;
    }
</style>
@endsection

@section('content')
    <play-component inline-template>
        <div class="play-page">
            <div class="container" v-cloak>
                <div class="page-heading">
                    <div class="page-name">Play</div>
                    <div class="page-line"></div>

                    @include('submenu')
                </div>

                <div class="play-game">
                    <div class="winnings" v-cloak>
                        <div class="tries" v-cloak v-if="fetchedPlays">
                            <span class="tries-number">@{{ triesLeft }}</span>
                            <span class="tries-word">@{{ tryTries }} left</span>
                        </div>
                        <div v-else>Fetching previous plays...</div>
                        <div class="prize" v-cloak>
                            <div class="show-prize" v-if="showPrize">
                                You've just won <b>@{{ prize.item }} @{{ "x" + prize.qty }}</b>! <br>
                                Redeem your prize from @{{ prize.pledger.name }}
                                <a class="prize-giver" :href="prize.pledger.link" v-if="prize.pledger.link">@{{ prize.pledger.handle }}</a>
                            </div>
                            <div class="broke" v-else-if="prizeless">
                                Let's put it this way: We're broke!
                            </div>
                            <div class="exceeded-tries" v-else-if="!triesLeft">
                                Sorry you have used up your number of tries!
                            </div>
                            <div class="please-play" v-else-if="canPlay">
                                Click the spin button to play!
                            </div>
                            <div class="fetching" v-else-if="suppBrowser">
                                Fetching your information...
                            </div>
                            <div class="nobrowser" v-else>
                                Your browser is unsupported.
                            </div>

                            <div class="share-buttons" style="margin: 0 0 5px 0; width: 165px;" v-cloak>
                                <div style="float: left; margin-right: 15px;">
                                    <a style="color: #fff !important;" href="https://twitter.com/intent/tweet?text=I%20just%20made%20a%20pledge%20on%20the%202018%20New%20Year%20Giveaway%21%20%23The2018Giveaway%20%23NewYearGiveaway%20%23EEE500%20%23the13thset&hastags=The2018Giveaway,NewYearGiveAway,EEE500,the13thset" class="twitter-share-button" data-size="large" data-show-count="true">Tweet</a>
                                </div>

                                <div  style="float: left;">
                                    <div class="fb-share-button" data-href="http://thegiveaway.herokuapp.com/" data-layout="button" data-size="large" data-mobile-iframe="true">
                                        <a style="color: #fff !important;" class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fthegiveaway.herokuapp.com%2F&amp;src=sdkpreparse">Share</a>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                        {{-- TODO: Share button. I just won xxx from yyy on the 2018 giveaway. --}}
                    </div>

                    <div class="game" v-cloak>
                        <div class="central spin-parent" v-if="canPlay()">
                            <div class="spin animated infinite pulse" @click="spin">Spin</div>
                        </div>
                        <img src="{{ asset('img/Cool Wheel 45.svg') }}" alt="" class="wheel">
                        <img src="{{ asset('img/Cool Pointer.svg') }}" alt="" :class="{ pointer: true, rotate: rolling}" id="pointer">

                        <img 
                            src="{{ asset('img/Congrats.svg') }}" 
                            alt="Congrats" 
                            v-show="congratulations" 
                            :class="{ display: true, congrats: true, animated: congratulations, infinite: congratulations, flash: congratulations }">

                        <img 
                            src="{{ asset('img/Sorry.svg') }}" 
                            alt="Sorry" 
                            v-show="sorry" 
                            :class="{ display: true, sorry: true, animated: sorry, infinite: sorry, flash: sorry }">
                    </div>
                </div>
            </div>
        </div>
    </play-component>
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
                message: "Your browser can't handle the fire. Change!",
                hideAfter: 100000,
                hideOnNavigate: true,
                type: "error"
            })
        }
    });
</script>
@endsection