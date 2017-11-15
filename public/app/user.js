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
eval("'use strict';\r\nvar usrApp = angular.module('usrApp', ['ngResource', 'ngAnimate', 'usrContent']);\r\n\r\nusrApp.factory('Usr', function ($resource) {\r\n    return $resource('/user', {}, {\r\n        query : { method: 'GET', isArray: true }\r\n    });\r\n});\r\n\r\nusrApp.config(function($interpolateProvider){\r\n    $interpolateProvider.startSymbol('<%=').endSymbol('%>');\r\n});\r\n\r\nusrApp.controller('ctrlHeader', ['$scope', '$rootScope', '$timeout', '$http', 'Usr',\r\n\tfunction($scope, $rootScope, $timeout, $http, Usr) {\r\n\r\n\tUsr.query().$promise.then(function(data) {\r\n       $rootScope.usr = data[0];\r\n   \t});\r\n\r\n\r\n    $scope.timestamp = function(){\r\n    \treturn Date.now();\r\n    }\r\n}]);//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC91c2VyLmpzPzllNzIiXSwic291cmNlc0NvbnRlbnQiOlsiJ3VzZSBzdHJpY3QnO1xyXG52YXIgdXNyQXBwID0gYW5ndWxhci5tb2R1bGUoJ3VzckFwcCcsIFsnbmdSZXNvdXJjZScsICduZ0FuaW1hdGUnLCAndXNyQ29udGVudCddKTtcclxuXHJcbnVzckFwcC5mYWN0b3J5KCdVc3InLCBmdW5jdGlvbiAoJHJlc291cmNlKSB7XHJcbiAgICByZXR1cm4gJHJlc291cmNlKCcvdXNlcicsIHt9LCB7XHJcbiAgICAgICAgcXVlcnkgOiB7IG1ldGhvZDogJ0dFVCcsIGlzQXJyYXk6IHRydWUgfVxyXG4gICAgfSk7XHJcbn0pO1xyXG5cclxudXNyQXBwLmNvbmZpZyhmdW5jdGlvbigkaW50ZXJwb2xhdGVQcm92aWRlcil7XHJcbiAgICAkaW50ZXJwb2xhdGVQcm92aWRlci5zdGFydFN5bWJvbCgnPCU9JykuZW5kU3ltYm9sKCclPicpO1xyXG59KTtcclxuXHJcbnVzckFwcC5jb250cm9sbGVyKCdjdHJsSGVhZGVyJywgWyckc2NvcGUnLCAnJHJvb3RTY29wZScsICckdGltZW91dCcsICckaHR0cCcsICdVc3InLFxyXG5cdGZ1bmN0aW9uKCRzY29wZSwgJHJvb3RTY29wZSwgJHRpbWVvdXQsICRodHRwLCBVc3IpIHtcclxuXHJcblx0VXNyLnF1ZXJ5KCkuJHByb21pc2UudGhlbihmdW5jdGlvbihkYXRhKSB7XHJcbiAgICAgICAkcm9vdFNjb3BlLnVzciA9IGRhdGFbMF07XHJcbiAgIFx0fSk7XHJcblxyXG5cclxuICAgICRzY29wZS50aW1lc3RhbXAgPSBmdW5jdGlvbigpe1xyXG4gICAgXHRyZXR1cm4gRGF0ZS5ub3coKTtcclxuICAgIH1cclxufV0pO1xuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyByZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC91c2VyLmpzIl0sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSIsInNvdXJjZVJvb3QiOiIifQ==");

/***/ }
/******/ ]);