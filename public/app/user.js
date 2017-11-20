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
eval("'use strict';\r\nvar usrApp = angular.module('usrApp', ['ngSanitize', 'ngResource', 'ngAnimate', 'usrContent']);\r\n\r\nusrApp.factory('Usr', function ($resource) {\r\n    return $resource('/user', {}, {\r\n        query : { method: 'GET', isArray: true }\r\n    });\r\n});\r\nusrApp.factory('Countries', function ($resource) {\r\n    return $resource('/countries', {}, {\r\n        query : { method: 'GET', isArray: true }\r\n    });\r\n});\r\n\r\nusrApp.config(function($interpolateProvider){\r\n    $interpolateProvider.startSymbol('<%=').endSymbol('%>');\r\n});\r\n\r\nusrApp.controller('ctrlHeader', ['$scope', '$rootScope', '$timeout', '$http', 'Usr',\r\n\tfunction($scope, $rootScope, $timeout, $http, Usr) {\r\n\r\n\tUsr.query().$promise.then(function(data) {\r\n     $rootScope.usr = data;\r\n \t});\r\n\r\n\r\n  $scope.timestamp = function(){\r\n  \treturn Date.now();\r\n  }\r\n}]);//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC91c2VyLmpzPzllNzIiXSwic291cmNlc0NvbnRlbnQiOlsiJ3VzZSBzdHJpY3QnO1xyXG52YXIgdXNyQXBwID0gYW5ndWxhci5tb2R1bGUoJ3VzckFwcCcsIFsnbmdTYW5pdGl6ZScsICduZ1Jlc291cmNlJywgJ25nQW5pbWF0ZScsICd1c3JDb250ZW50J10pO1xyXG5cclxudXNyQXBwLmZhY3RvcnkoJ1VzcicsIGZ1bmN0aW9uICgkcmVzb3VyY2UpIHtcclxuICAgIHJldHVybiAkcmVzb3VyY2UoJy91c2VyJywge30sIHtcclxuICAgICAgICBxdWVyeSA6IHsgbWV0aG9kOiAnR0VUJywgaXNBcnJheTogdHJ1ZSB9XHJcbiAgICB9KTtcclxufSk7XHJcbnVzckFwcC5mYWN0b3J5KCdDb3VudHJpZXMnLCBmdW5jdGlvbiAoJHJlc291cmNlKSB7XHJcbiAgICByZXR1cm4gJHJlc291cmNlKCcvY291bnRyaWVzJywge30sIHtcclxuICAgICAgICBxdWVyeSA6IHsgbWV0aG9kOiAnR0VUJywgaXNBcnJheTogdHJ1ZSB9XHJcbiAgICB9KTtcclxufSk7XHJcblxyXG51c3JBcHAuY29uZmlnKGZ1bmN0aW9uKCRpbnRlcnBvbGF0ZVByb3ZpZGVyKXtcclxuICAgICRpbnRlcnBvbGF0ZVByb3ZpZGVyLnN0YXJ0U3ltYm9sKCc8JT0nKS5lbmRTeW1ib2woJyU+Jyk7XHJcbn0pO1xyXG5cclxudXNyQXBwLmNvbnRyb2xsZXIoJ2N0cmxIZWFkZXInLCBbJyRzY29wZScsICckcm9vdFNjb3BlJywgJyR0aW1lb3V0JywgJyRodHRwJywgJ1VzcicsXHJcblx0ZnVuY3Rpb24oJHNjb3BlLCAkcm9vdFNjb3BlLCAkdGltZW91dCwgJGh0dHAsIFVzcikge1xyXG5cclxuXHRVc3IucXVlcnkoKS4kcHJvbWlzZS50aGVuKGZ1bmN0aW9uKGRhdGEpIHtcclxuICAgICAkcm9vdFNjb3BlLnVzciA9IGRhdGE7XHJcbiBcdH0pO1xyXG5cclxuXHJcbiAgJHNjb3BlLnRpbWVzdGFtcCA9IGZ1bmN0aW9uKCl7XHJcbiAgXHRyZXR1cm4gRGF0ZS5ub3coKTtcclxuICB9XHJcbn1dKTtcblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gcmVzb3VyY2VzL2Fzc2V0cy9qcy9hcHAvdXNlci5qcyJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwic291cmNlUm9vdCI6IiJ9");

/***/ }
/******/ ]);