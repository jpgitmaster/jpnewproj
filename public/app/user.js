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
eval("'use strict';\r\nvar usrApp = angular.module('usrApp', ['ngResource', 'ngAnimate', 'usrHeader', 'usrContent']);\r\n\r\nusrApp.factory('Usr', function ($resource) {\r\n    return $resource('/user', {}, {\r\n        query : { method: 'GET', isArray: true }\r\n    });\r\n});\r\n\r\nusrApp.config(function($interpolateProvider){\r\n    $interpolateProvider.startSymbol('<%=').endSymbol('%>');\r\n});\r\n\r\n'use strict'; \r\nvar usrHeader = angular.module('usrHeader', []);\r\n\r\nusrHeader.controller('ctrlHeader', ['$scope', '$rootScope', '$timeout', '$http', '$q', 'Usr',\r\n\tfunction($scope, $rootScope, $timeout, $http, $q, Usr) {\r\n\r\n  var deferred = $q.defer();\r\n\r\n\tUsr.query().$promise.then(function(data) {\r\n     $rootScope.usr = data;\r\n     deferred.resolve($rootScope.usr);\r\n  });\r\n\r\n\r\n    $scope.timestamp = function(){\r\n    \treturn Date.now();\r\n    }\r\n}]);//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC91c2VyLmpzPzllNzIiXSwic291cmNlc0NvbnRlbnQiOlsiJ3VzZSBzdHJpY3QnO1xyXG52YXIgdXNyQXBwID0gYW5ndWxhci5tb2R1bGUoJ3VzckFwcCcsIFsnbmdSZXNvdXJjZScsICduZ0FuaW1hdGUnLCAndXNySGVhZGVyJywgJ3VzckNvbnRlbnQnXSk7XHJcblxyXG51c3JBcHAuZmFjdG9yeSgnVXNyJywgZnVuY3Rpb24gKCRyZXNvdXJjZSkge1xyXG4gICAgcmV0dXJuICRyZXNvdXJjZSgnL3VzZXInLCB7fSwge1xyXG4gICAgICAgIHF1ZXJ5IDogeyBtZXRob2Q6ICdHRVQnLCBpc0FycmF5OiB0cnVlIH1cclxuICAgIH0pO1xyXG59KTtcclxuXHJcbnVzckFwcC5jb25maWcoZnVuY3Rpb24oJGludGVycG9sYXRlUHJvdmlkZXIpe1xyXG4gICAgJGludGVycG9sYXRlUHJvdmlkZXIuc3RhcnRTeW1ib2woJzwlPScpLmVuZFN5bWJvbCgnJT4nKTtcclxufSk7XHJcblxyXG4ndXNlIHN0cmljdCc7IFxyXG52YXIgdXNySGVhZGVyID0gYW5ndWxhci5tb2R1bGUoJ3VzckhlYWRlcicsIFtdKTtcclxuXHJcbnVzckhlYWRlci5jb250cm9sbGVyKCdjdHJsSGVhZGVyJywgWyckc2NvcGUnLCAnJHJvb3RTY29wZScsICckdGltZW91dCcsICckaHR0cCcsICckcScsICdVc3InLFxyXG5cdGZ1bmN0aW9uKCRzY29wZSwgJHJvb3RTY29wZSwgJHRpbWVvdXQsICRodHRwLCAkcSwgVXNyKSB7XHJcblxyXG4gIHZhciBkZWZlcnJlZCA9ICRxLmRlZmVyKCk7XHJcblxyXG5cdFVzci5xdWVyeSgpLiRwcm9taXNlLnRoZW4oZnVuY3Rpb24oZGF0YSkge1xyXG4gICAgICRyb290U2NvcGUudXNyID0gZGF0YTtcclxuICAgICBkZWZlcnJlZC5yZXNvbHZlKCRyb290U2NvcGUudXNyKTtcclxuICB9KTtcclxuXHJcblxyXG4gICAgJHNjb3BlLnRpbWVzdGFtcCA9IGZ1bmN0aW9uKCl7XHJcbiAgICBcdHJldHVybiBEYXRlLm5vdygpO1xyXG4gICAgfVxyXG59XSk7XG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHJlc291cmNlcy9hc3NldHMvanMvYXBwL3VzZXIuanMiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwic291cmNlUm9vdCI6IiJ9");

/***/ }
/******/ ]);