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
eval("'use strict';\r\nvar usrApp = angular.module('usrApp', ['ngResource', 'ngAnimate', 'usrContent']);\r\n\r\nusrApp.factory('Usr', function ($resource) {\r\n    return $resource('/user', {}, {\r\n        query : { method: 'GET', isArray: true }\r\n    });\r\n});\r\n\r\nusrApp.config(function($interpolateProvider){\r\n    $interpolateProvider.startSymbol('<%=').endSymbol('%>');\r\n});\r\n\r\nusrApp.controller('ctrlHeader', ['$scope', '$timeout', '$http', 'Usr',\r\n\tfunction($scope, $timeout, $http, Usr) {\r\n\r\n\tUsr.query().$promise.then(function(data) {\r\n       $rootScope.usr = data;\r\n   \t});\r\n\r\n\r\n    $scope.timestamp = function(){\r\n    \treturn Date.now();\r\n    }\r\n}]);//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC91c2VyLmpzPzllNzIiXSwic291cmNlc0NvbnRlbnQiOlsiJ3VzZSBzdHJpY3QnO1xyXG52YXIgdXNyQXBwID0gYW5ndWxhci5tb2R1bGUoJ3VzckFwcCcsIFsnbmdSZXNvdXJjZScsICduZ0FuaW1hdGUnLCAndXNyQ29udGVudCddKTtcclxuXHJcbnVzckFwcC5mYWN0b3J5KCdVc3InLCBmdW5jdGlvbiAoJHJlc291cmNlKSB7XHJcbiAgICByZXR1cm4gJHJlc291cmNlKCcvdXNlcicsIHt9LCB7XHJcbiAgICAgICAgcXVlcnkgOiB7IG1ldGhvZDogJ0dFVCcsIGlzQXJyYXk6IHRydWUgfVxyXG4gICAgfSk7XHJcbn0pO1xyXG5cclxudXNyQXBwLmNvbmZpZyhmdW5jdGlvbigkaW50ZXJwb2xhdGVQcm92aWRlcil7XHJcbiAgICAkaW50ZXJwb2xhdGVQcm92aWRlci5zdGFydFN5bWJvbCgnPCU9JykuZW5kU3ltYm9sKCclPicpO1xyXG59KTtcclxuXHJcbnVzckFwcC5jb250cm9sbGVyKCdjdHJsSGVhZGVyJywgWyckc2NvcGUnLCAnJHRpbWVvdXQnLCAnJGh0dHAnLCAnVXNyJyxcclxuXHRmdW5jdGlvbigkc2NvcGUsICR0aW1lb3V0LCAkaHR0cCwgVXNyKSB7XHJcblxyXG5cdFVzci5xdWVyeSgpLiRwcm9taXNlLnRoZW4oZnVuY3Rpb24oZGF0YSkge1xyXG4gICAgICAgJHJvb3RTY29wZS51c3IgPSBkYXRhO1xyXG4gICBcdH0pO1xyXG5cclxuXHJcbiAgICAkc2NvcGUudGltZXN0YW1wID0gZnVuY3Rpb24oKXtcclxuICAgIFx0cmV0dXJuIERhdGUubm93KCk7XHJcbiAgICB9XHJcbn1dKTtcblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gcmVzb3VyY2VzL2Fzc2V0cy9qcy9hcHAvdXNlci5qcyJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EiLCJzb3VyY2VSb290IjoiIn0=");

/***/ }
/******/ ]);