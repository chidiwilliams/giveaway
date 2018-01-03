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
            fetchedPlays: false,
            suppBrowser: true,
            prizeless: false
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
                        // One more to reset function
                        vm.showPrize = false
                        vm.prize = {}
                        vm.prizeless = false

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
                        Messenger.options = {
                            extraClasses: 'messenger-fixed messenger-on-bottom',
                            theme: 'future'
                        }

                        Messenger().post({
                            message: "Didn't quite get that. Please refresh your browser.",
                            hideAfter: 100000,
                            hideOnNavigate: true,
                            type: "error"
                        })
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
            var vm = this

            $.post("/network_test", {
                _token: document.querySelector("meta[name=csrf-token]").content
            }, function (data, status) {
                if (status == "success") {
                    network = 1
                }
            })

            setTimeout(function () {
                callback(network)
            }, 1500)
        },
        sendData: function (didWin) {
            var vm = this

            $.post("/play", {
                _token: document.querySelector("meta[name=csrf-token]").content,
                win: (didWin * 1)
            }, function (data, status) {
                if (status == "success") {
                    var prize = data.prize
                    var pledger = data.pledger

                    vm.plays = data.plays

                    if (didWin) {
                        if (prize) {
                            vm.prize.pledger = pledger
                            vm.prize.item = prize.item
                            vm.prize.qty = prize.qty

                            vm.displayPrize()
                        } else {
                            vm.prizeless = true
                        }
                    }

                    setTimeout(function () {
                        if (vm.triesLeft > 0) {
                            vm.enable()
                        }
                    }, 2000)
                }
            })
        },
        canPlay: function() {
            return (!this.disabled && this.triesLeft && this.fetchedPlays && this.suppBrowser)
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
        var vm = this

        $.post("/user/plays", {
            _token: document.querySelector("meta[name=csrf-token]").content
        }, function (data, status) {
            if (status == "success") {
                vm.plays = data
                vm.fetchedPlays = true
            } else {
                alert("Network error!")
                window.location = "/play"
            }
        })

        if (!!((window.CSS && window.CSS.supports) || window.supportsCSS || false) && window.CSS.supports('animation', 'f')) {
            // continue
        } else {
            this.suppBrowser = false

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
    }
}
</script>