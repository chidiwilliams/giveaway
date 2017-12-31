@extends('master')

@section('heafoo')
@endsection

@section('content')
    <play-component inline-template>
        <div class="play-page">
            <div class="container">
                <div class="page-heading">
                    <div class="page-name">Play</div>
                    <div class="page-line"></div>
                </div>

                <div class="play-game">
                    <div class="game" v-cloak>
                        <img src="{{ asset('img/Cool Wheel.svg') }}" alt="">
                        <img src="{{ asset('img/Cool Pointer.svg') }}" alt="Wheel">
                        <div class="stop"></div>

                        <div v-if="congratulations" :class="{ bounce: animate }">Congratulations</div>
                        <div v-if="sorry" :class="{ bounce: animate }">Sorry</div>
                    </div>
                    
                    <div class="winnings" v-cloak>
                        <div class="spin" @click="spin">Spin</div>
                        <div class="tries" v-cloak>
                            <span class="tries-number">@{{ triesLeft }}</span>
                            <span class="tries-word">@{{ tryTries }} left</span>
                        </div>
                        <div class="prize" v-if="showPrize" v-cloak>
                        You've just won @{{ prize.item }} x @{{ prize.qty }}. 
                        Redeem your prize from 
                        <a :href="'https://twitter.com/' + prize.pledger.handle">@{{ "@" + prize.pledger.handle }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </play-component>
@endsection

@section('js')
@endsection