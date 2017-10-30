/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
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
/******/ 	// identity function for calling harmory imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmory exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		Object.defineProperty(exports, name, {
/******/ 			configurable: false,
/******/ 			enumerable: true,
/******/ 			get: getter
/******/ 		});
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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports) {

"use strict";
eval("'use strict';\r\nvar ngApp = angular.module('ngApp', ['ngResource', 'ngAnimate']);\r\n\r\nngApp.controller('ctrlApp', ['$scope', '$timeout', '$http',\r\n    function($scope, $timeout, $http) {\r\n\r\n    $scope.usrRegister = function(usr){\r\n        $scope.loader = true;\r\n        $http({\r\n            method: 'POST',\r\n            url: \"register\",\r\n            headers: {'Content-Type': undefined},\r\n            data: {user : usr},\r\n            transformRequest: function (data) {\r\n                var fd = new FormData();\r\n                fd.append('user', angular.toJson(data.user));\r\n                return fd;\r\n            }\r\n        }).then(function(result){\r\n            $scope.msg = result.data;\r\n\r\n            $timeout(function(){\r\n                $scope.loader = false;\r\n                if($scope.msg['has_error'] == false){\r\n                    angular.element('#sccssrgstrtn').modal().velocity('transition.flipXIn');\r\n                    $scope.rgstr = {};    \r\n                }\r\n                console.log($scope.msg);\r\n            }, 500);\r\n        });\r\n    }\r\n\r\n}]);\r\n\r\nngApp.config(function($interpolateProvider){\r\n    $interpolateProvider.startSymbol('<%=').endSymbol('%>');\r\n});//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC9ob21lLmpzPzg2MGYiXSwic291cmNlc0NvbnRlbnQiOlsiJ3VzZSBzdHJpY3QnO1xyXG52YXIgbmdBcHAgPSBhbmd1bGFyLm1vZHVsZSgnbmdBcHAnLCBbJ25nUmVzb3VyY2UnLCAnbmdBbmltYXRlJ10pO1xyXG5cclxubmdBcHAuY29udHJvbGxlcignY3RybEFwcCcsIFsnJHNjb3BlJywgJyR0aW1lb3V0JywgJyRodHRwJyxcclxuICAgIGZ1bmN0aW9uKCRzY29wZSwgJHRpbWVvdXQsICRodHRwKSB7XHJcblxyXG4gICAgJHNjb3BlLnVzclJlZ2lzdGVyID0gZnVuY3Rpb24odXNyKXtcclxuICAgICAgICAkc2NvcGUubG9hZGVyID0gdHJ1ZTtcclxuICAgICAgICAkaHR0cCh7XHJcbiAgICAgICAgICAgIG1ldGhvZDogJ1BPU1QnLFxyXG4gICAgICAgICAgICB1cmw6IFwicmVnaXN0ZXJcIixcclxuICAgICAgICAgICAgaGVhZGVyczogeydDb250ZW50LVR5cGUnOiB1bmRlZmluZWR9LFxyXG4gICAgICAgICAgICBkYXRhOiB7dXNlciA6IHVzcn0sXHJcbiAgICAgICAgICAgIHRyYW5zZm9ybVJlcXVlc3Q6IGZ1bmN0aW9uIChkYXRhKSB7XHJcbiAgICAgICAgICAgICAgICB2YXIgZmQgPSBuZXcgRm9ybURhdGEoKTtcclxuICAgICAgICAgICAgICAgIGZkLmFwcGVuZCgndXNlcicsIGFuZ3VsYXIudG9Kc29uKGRhdGEudXNlcikpO1xyXG4gICAgICAgICAgICAgICAgcmV0dXJuIGZkO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSkudGhlbihmdW5jdGlvbihyZXN1bHQpe1xyXG4gICAgICAgICAgICAkc2NvcGUubXNnID0gcmVzdWx0LmRhdGE7XHJcblxyXG4gICAgICAgICAgICAkdGltZW91dChmdW5jdGlvbigpe1xyXG4gICAgICAgICAgICAgICAgJHNjb3BlLmxvYWRlciA9IGZhbHNlO1xyXG4gICAgICAgICAgICAgICAgaWYoJHNjb3BlLm1zZ1snaGFzX2Vycm9yJ10gPT0gZmFsc2Upe1xyXG4gICAgICAgICAgICAgICAgICAgIGFuZ3VsYXIuZWxlbWVudCgnI3NjY3NzcmdzdHJ0bicpLm1vZGFsKCkudmVsb2NpdHkoJ3RyYW5zaXRpb24uZmxpcFhJbicpO1xyXG4gICAgICAgICAgICAgICAgICAgICRzY29wZS5yZ3N0ciA9IHt9OyAgICBcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKCRzY29wZS5tc2cpO1xyXG4gICAgICAgICAgICB9LCA1MDApO1xyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxufV0pO1xyXG5cclxubmdBcHAuY29uZmlnKGZ1bmN0aW9uKCRpbnRlcnBvbGF0ZVByb3ZpZGVyKXtcclxuICAgICRpbnRlcnBvbGF0ZVByb3ZpZGVyLnN0YXJ0U3ltYm9sKCc8JT0nKS5lbmRTeW1ib2woJyU+Jyk7XHJcbn0pO1xuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyByZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC9ob21lLmpzIl0sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSIsInNvdXJjZVJvb3QiOiIifQ==");

/***/ }
/******/ ]);