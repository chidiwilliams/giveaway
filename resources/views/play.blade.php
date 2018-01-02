@extends('master')

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
                        <div class="tries" v-cloak>
                            <span class="tries-number">@{{ triesLeft }}</span>
                            <span class="tries-word">@{{ tryTries }} left</span>
                        </div>
                        <div class="prize" v-cloak>
                            <div class="show-prize" v-if="showPrize">
                                You've just won <b>@{{ prize.item }} @{{ "x" + prize.qty }}</b>! <br>
                                Redeem your prize from @{{ prize.pledger.name }}
                                <a :href="prize.pledger.link" v-if="prize.pledger.link">@{{ prize.pledger.handle }}</a>
                            </div>
                            <div class="exceeded-tries" v-else-if="!triesLeft">
                                Sorry you have exceeded your number of tries!
                            </div>
                            <div class="please-play" v-else>
                                Click the spin button to play!
                            </div>
                        </div>
                        {{-- TODO: Share button. I just won xxx from yyy on the 2018 giveaway. --}}
                    </div>

                    <div class="game" v-cloak>
                        <div class="central spin-parent" v-if="!disabled">
                            <div class="spin animated infinite pulse" @click="spin">Spin</div>
                        </div>
                        <img src="{{ asset('img/Cool Wheel.svg') }}" alt="" class="wheel">
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
<script>
</script>
@endsection