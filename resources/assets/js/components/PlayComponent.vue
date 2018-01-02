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
            showPrize: false,
            fetchedPlays: false
        }
    },
    methods: {
        spin: function () {
            if (this.canPlay()) {
                var vm = this
                vm.disable()

                // TODO: Alert something like calculating trajectory for 1.5 seconds while network check goes on...
                // alert("Calculating...", "testing network...")

                // Test network
                vm.networkWorking(function(network) {
                    if (network) {
                        vm.showPrize = false
                        vm.prize = {}

                        var degree = 10000 + (Math.random() * 10000)
                        document.getElementById("pointer").style.setProperty('--rotation-degree', degree + 'deg')

                        vm.startRolling()

                        setTimeout(function() {
                            vm.stopRolling()
                            vm.savePointerPosition(degree)

                            var didWin = vm.didWin(degree)

                            var result = didWin ? "congratulations" : "sorry"
                            vm[result] = true
                            setTimeout(function() {
                                vm[result] = false
                            }, 3000);

                            vm.sendData(didWin)
                        }, 20000)
                    } else {
                        alert("Bad connection. Please refresh")
                        window.location = "/play"
                    }
                })
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
        },
        networkWorking: function (callback) {
            var network = 0

            axios.post('/network_test', {
                ping: true
            }).then(response => {
                network = 1
            })

            setTimeout(function () {
                callback(network)
            }, 1500)
        },
        sendData: function (didWin) {
            // If this fails, display flash... Bad network connection, refresh
            axios.post('/play', {
                play: didWin
            }).then(response => {
                if (response.data) {
                    var prize = response.data.prize
                    var pledger = response.data.pledger

                    this.plays = response.data.plays

                    if (prize) {
                        this.prize.pledger = pledger
                        this.prize.item = prize.item
                        this.prize.qty = prize.qty

                        this.displayPrize()
                    }

                    if (this.triesLeft > 0) {
                        this.enable()
                    }
                }
            })
        },
        canPlay: function() {
            return (!this.disabled && this.triesLeft && this.fetchedPlays)
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
        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector("meta[name=csrf-token]").content

        axios.post('/plays').then(response => {
            alert("Hello")
            this.plays = response.data
            this.fetchedPlays = true
        })
    }
}
</script>