
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('custom-input', require('./components/CustomInput.vue'))

const app = new Vue({
    el: '#pledge',
    data: {
        courses: [''],
        levels: [100, 200, 300, 400, 500]
    },
    created: function() {
        axios.get('/js/courses.json').then(response => {
            this.courses_fetched = true
            this.courses = response.data
        })
    }
});
