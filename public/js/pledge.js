/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 50);
/******/ })
/************************************************************************/
/******/ ({

/***/ 50:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(51);


/***/ }),

/***/ 51:
/***/ (function(module, exports) {

var pledge = new Vue({
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
        changeCourse: function changeCourse(course) {
            this.selectedCourse = course;
        },
        changeLevel: function changeLevel(level) {
            this.selectedLevel = level;
        },
        in: function _in(item, arr) {
            return arr.indexOf(item) > -1;
        }
    },
    watch: {
        selectedCourse: function selectedCourse(val, old) {
            if (this.in(val, this.four_year_courses)) this.levels = this.four_levels;else this.levels = this.five_levels;

            if (!this.in(this.selectedLevel, this.levels)) this.resetLevel = !this.resetLevel;
        }
    },
    created: function created() {
        var _this = this;

        axios.get('/js/courses.json').then(function (response) {
            _this.courses = response.data;
        });

        axios.get('/js/four_year_courses.json').then(function (response) {
            _this.four_year_courses = response.data;
        });
    }
});

/***/ })

/******/ });