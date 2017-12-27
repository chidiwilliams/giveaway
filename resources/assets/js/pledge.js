const pledge = new Vue({
    el: '#pledge',
    data: {
        courses: [''],
        four_year_courses: [''],
        levels: [100, 200, 300, 400, 500],
        five_levels: [100, 200, 300, 400, 500],
        four_levels: [100, 200, 300, 400],
        selectedCourse: "",
        selectedLevel: 0,
        // to reset the levels so that the four year courses shows properly toggle this value
        resetLevel: false
    },
    methods: {
        changeCourse: function (course) {
            this.selectedCourse = course
        },
        changeLevel: function (level) {
            this.selectedLevel = level
        },
        in: function (item, arr) {
            return (arr.indexOf(item) > -1)
        }
    },
    watch: {
        selectedCourse: function (val, old) {
            if (this.in(val, this.four_year_courses)) 
                this.levels = this.four_levels
            else 
                this.levels = this.five_levels

            if (!(this.in(this.selectedLevel, this.levels)))
                this.resetLevel = !this.resetLevel
        }
    },
    created: function() {
        axios.get('/js/courses.json').then(response => {
            this.courses = response.data
        })

        axios.get('/js/four_year_courses.json').then(response => {
            this.four_year_courses = response.data
        })
    }
});
