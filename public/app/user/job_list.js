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
eval("'use strict'; \r\nvar usrContent = angular.module('usrContent', []);\r\n\r\nusrContent.controller('ctrlJobList', ['$scope', '$rootScope', '$timeout', '$http', 'Usr',\r\n\tfunction($scope, $rootScope, $timeout, $http, Usr) {\r\n\r\n\t$scope.viewResume = function(){\r\n    $('#resume_tpl').appendTo('body').modal().velocity('transition.flipXIn');\r\n  }\r\n}]);\r\n\r\nusrContent.filter('customOrderBy', function () {\r\n   return function (arr) {\r\n\r\n     var numbers = [];\r\n     var strings = [];\r\n       angular.forEach(arr, function(item){\r\n            if(item.ispresent == true ){\r\n              numbers.push(item);     \r\n            }\r\n            else\r\n              strings.push(item);     \r\n          });\r\n\r\n        return numbers.sort().concat(strings);\r\n    };\r\n});//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC91c2VyL2pvYl9saXN0LmpzP2UwMGUiXSwic291cmNlc0NvbnRlbnQiOlsiJ3VzZSBzdHJpY3QnOyBcclxudmFyIHVzckNvbnRlbnQgPSBhbmd1bGFyLm1vZHVsZSgndXNyQ29udGVudCcsIFtdKTtcclxuXHJcbnVzckNvbnRlbnQuY29udHJvbGxlcignY3RybEpvYkxpc3QnLCBbJyRzY29wZScsICckcm9vdFNjb3BlJywgJyR0aW1lb3V0JywgJyRodHRwJywgJ1VzcicsXHJcblx0ZnVuY3Rpb24oJHNjb3BlLCAkcm9vdFNjb3BlLCAkdGltZW91dCwgJGh0dHAsIFVzcikge1xyXG5cclxuXHQkc2NvcGUudmlld1Jlc3VtZSA9IGZ1bmN0aW9uKCl7XHJcbiAgICAkKCcjcmVzdW1lX3RwbCcpLmFwcGVuZFRvKCdib2R5JykubW9kYWwoKS52ZWxvY2l0eSgndHJhbnNpdGlvbi5mbGlwWEluJyk7XHJcbiAgfVxyXG59XSk7XHJcblxyXG51c3JDb250ZW50LmZpbHRlcignY3VzdG9tT3JkZXJCeScsIGZ1bmN0aW9uICgpIHtcclxuICAgcmV0dXJuIGZ1bmN0aW9uIChhcnIpIHtcclxuXHJcbiAgICAgdmFyIG51bWJlcnMgPSBbXTtcclxuICAgICB2YXIgc3RyaW5ncyA9IFtdO1xyXG4gICAgICAgYW5ndWxhci5mb3JFYWNoKGFyciwgZnVuY3Rpb24oaXRlbSl7XHJcbiAgICAgICAgICAgIGlmKGl0ZW0uaXNwcmVzZW50ID09IHRydWUgKXtcclxuICAgICAgICAgICAgICBudW1iZXJzLnB1c2goaXRlbSk7ICAgICBcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICBlbHNlXHJcbiAgICAgICAgICAgICAgc3RyaW5ncy5wdXNoKGl0ZW0pOyAgICAgXHJcbiAgICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgcmV0dXJuIG51bWJlcnMuc29ydCgpLmNvbmNhdChzdHJpbmdzKTtcclxuICAgIH07XHJcbn0pO1xuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyByZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC91c2VyL2pvYl9saXN0LmpzIl0sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Iiwic291cmNlUm9vdCI6IiJ9");

/***/ }
/******/ ]);