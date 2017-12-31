@extends('master')

@section('heafoo')
@endsection

@section('content')
    <play-component inline-template>
        <div class="play-page">
            <div class="container" v-cloak>
                <div class="page-heading">
                    <div class="page-name">Play</div>
                    <div class="page-line"></div>

                    <div class="sub-menu">
                        <a href="{{ route('game') }}">Return to Home</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>

                <div class="play-game">
                    <div class="game">
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

                    <div class="winnings" v-cloak>
                        <div class="winnings-board">
                            <div class="spin" @click="spin">Spin</div>
                            <div class="tries" v-cloak>
                                <span class="tries-number">@{{ triesLeft }}</span>
                                <span class="tries-word">@{{ tryTries }} left</span>
                            </div>
                            <div class="prize" v-if="showPrize" v-cloak>
                                You've just won <b>@{{ prize.item }} @{{ "x" + prize.qty }}</b>. <br>
                                Redeem your prize from @{{ prize.pledger.name }},
                                <a :href="'https://twitter.com/' + prize.pledger.handle">@{{ "@" + prize.pledger.handle }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </play-component>
@endsection

@section('js')
@endsection