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
                <div class="col-md-6">
                    <div class="game" v-cloak>
                        <img src="{{ asset('img/07ehm9mc.svg') }}" alt="Wheel" class="wheel">
                        <img src="{{ asset('img/pointer.svg') }}" alt="" :class="{ pointer: true, rotate: rolling }" id="pointer">

                        <div v-if="congratulations" :class="{ bounce: animate }">Congratulations</div>
                        <div v-if="sorry" :class="{ bounce: animate }">Sorry</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="winnings">
                        <div class="spin" @click="spin">Spin</div>
                        <div class="tries" v-cloak>
                            <span class="tries-number">@{{ triesLeft }}</span>
                            <span class="tries-word">@{{ tryTries }} left</span>
                        </div>
                        <div class="prize" v-if="showPrize" v-cloak>You've just won @{{ prize.item }} x @{{ prize.qty }}. Redeem your prize from @{{ "@" + prize.pledger.handle }}</div>
                    </div>
                </div>
            </div>
        </div>
    </play-component>
@endsection

@section('js')
@endsection