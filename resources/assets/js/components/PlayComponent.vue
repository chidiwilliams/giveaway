<script>
 export default {
    data () {
        return {
            rolling: false,
            plays: 0,
            maxPlays: 3,
            win: {
                min: 30,
                max: 330
            },
            disabled: false,
            congratulations: false,
            sorry: false,
            animate: false,
            prize: {
                pledger: "",
                item: "",
                qty: ""
            },
            showPrize: false
        }
    },
    methods: {
        spin: function () {
            if (!this.disabled) {
                if (!this.triesLeft) {
                    // TODO: Alert user that they have no more tries left!

                    return 0;
                } else {
                    this.disable()
                    this.showPrize = false
                    this.prize = {}

                    var degree = 10000 + (Math.random() * 10000)
                    document.getElementById("pointer").style.setProperty('--rotation-degree', degree + 'deg')

                    this.startRolling()

                    var vm = this
                    setTimeout(function() {
                        vm.stopRolling()
                        vm.savePointerPosition(degree)

                        var didWin = vm.didWin(degree)

                        var result = didWin ? "congratulations" : "sorry"

                        vm[result] = true

                        setTimeout(function() {
                            vm[result] = false
                        }, 5000);

                        // If this fails, display flash... Bad network connection, refresh
                        axios.post('/play', {
                            token: document.querySelector("meta[name=csrf-token]").content,
                            play: didWin
                        }).then(response => {
                            if (response.data) {
                                var prize = response.data.prize
                                var pledger = response.data.pledger

                                vm.plays = response.data.plays

                                if (prize) {
                                    vm.prize.pledger = pledger
                                    vm.prize.item = prize.item
                                    vm.prize.qty = prize.qty

                                    vm.displayPrize()
                                }

                                vm.enable()
                            }
                        })
                    }, 20000)
                }
            }
        },
        stopRolling: function () {
            this.rolling = false
        },
        startRolling: function () {
            this.rolling = true
        },
        enable: function () {
            this.disabled = false
        },
        disable: function () {
            this.disabled = true
        },
        savePointerPosition: function (degree) {
            var pointer = document.getElementById("pointer")
            pointer.style.transform = "rotate(" + degree + "deg)"
        },
        didWin: function (degree) {
            var deg = degree % 360

            return (deg < this.win.min) || (deg > this.win.max)
        },
        displayPrize: function () {
            this.showPrize = true
        }
    },
    computed: {
        playCount: function () {
            if (this.plays) return this.plays.length
            return 0
        },
        triesLeft: function () {
            var left = this.maxPlays - this.playCount

            return left
        },
        tryTries: function () {
            return (this.triesLeft == 1) ? "try" : "tries"
        }
    },
    created: function() {
        axios.get('/plays').then(
            response => {
                this.plays = response.data
            }
        )
    }
}
</script>