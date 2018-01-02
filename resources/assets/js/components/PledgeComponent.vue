<script>
 export default {
    data () {
        return {
            courses: [''],
            four_year_courses: [''],
            levels: [100, 200, 300, 400],
            five_levels: [100, 200, 300, 400, 500],
            four_levels: [100, 200, 300, 400],
            toggleResetLevel: false,
            inputs: {
                item: {
                    value: "",
                    type: "",
                    error: false
                },
                qty: {
                    value: "",
                    type: "number",
                    error: false
                },
                course: {
                    value: "",
                    type: "custom",
                    error: false
                },
                level: {
                    value: 0,
                    type: "custom",
                    error: false
                }
            }
        }
    },
    methods: {
        changeCourse: function (course) {
            this.inputs["course"].value = course

            // If new course is for four years and levels are five years, reset level to 100l
            this.in(course, this.four_year_courses) && (this.levels == this.five_levels) ? this.resetLevel() : null

            // Set levels to course-specific
            this.levels = (this.in(course, this.four_year_courses)) ? this.four_levels : this.five_levels

            // Clear course input error
            this.inputs.course.error = false
        },
        changeLevel: function (level) {
            this.inputs["level"].value = level

            // Clear level input error
            this.inputs.level.error = false
        },
        in: function (item, arr) {
            return (arr.indexOf(item) > -1)
        },
        updateValue: function (event) {
            var inputName = event.target.name
            var inputVal = this.inputs[inputName].value
            var inputType = this.inputs[inputName].type

            this.inputs[inputName].error = !this.isCorrectInput(inputVal, inputType)

            this.inputs[inputName].value = inputVal
        },
        isCorrectInput: function (val, type) {
            switch (type) {
                case "word":
                    return this.isCorrectInputWord(val);
                    break;
                case "number":
                    return this.isCorrectInputNumber(val);
                    break;
                default:
                    return 1;
                    break;
            }
        },
        isCorrectInputWord: function (value) {
            return !(/[0-9]/.test(value))
        },
        isCorrectInputNumber: function (value) {
            return (value * 1) > 0
        },
        onSubmit: function (event) {
            var errors = false

        for (var i in this.inputs) errors = this.inputs[i].error ? true : errors

            if (!errors) event.target.submit()
        },
        resetLevel: function () {
            this.toggleResetLevel = !this.toggleResetLevel
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
}
</script>