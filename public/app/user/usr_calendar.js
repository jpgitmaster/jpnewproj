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
eval("'use strict'; \r\nvar usrContent = angular.module('usrContent', ['ui.calendar', 'ui.bootstrap']);\r\n\r\nusrContent.controller('ctrlCalendar', ['$scope', '$rootScope', '$timeout', '$http', '$compile', 'uiCalendarConfig',\r\n\tfunction($scope, $rootScope, $timeout, $http, $compile, uiCalendarConfig) {\r\n\r\n\tvar date = new Date();\r\n    var d = date.getDate();\r\n    var m = date.getMonth();\r\n    var y = date.getFullYear();\r\n    \r\n    $scope.eventSource = {};\r\n\r\n    /* event source that contains custom events on the scope */\r\n    $scope.events = [\r\n      // {title: 'Long Event',start: new Date(y, m, d - 5),end: new Date(y, m, d - 2)},\r\n    ];\r\n\r\n    // $scope.jpevents = [\r\n    //   {title: 'JP Long Event',start: new Date(y, m, d - 5),end: new Date(y, m, d - 2)},\r\n    // ];\r\n\r\n    $scope.addEvent = function() {\r\n      $scope.events.push({\r\n        title: 'Open Sesame',\r\n        start: new Date(y, m, d - 5),\r\n        end: new Date(y, m, d - 2),\r\n        className: ['openSesame']\r\n      });\r\n    };\r\n\r\n\r\n\r\n\t$scope.uiConfig = {\r\n      calendar:{\r\n        editable: true,\r\n        header:{\r\n          left: 'title',\r\n          // center: 'today',\r\n          right: 'prev,next'\r\n        }\r\n      }\r\n    };\r\n    /* event sources array*/\r\n    // $scope.eventSources = [$scope.jpevents, $scope.events];\r\n    $scope.eventSources = [$scope.events];\r\n}]);\r\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC91c2VyL3Vzcl9jYWxlbmRhci5qcz84ZTRiIl0sInNvdXJjZXNDb250ZW50IjpbIid1c2Ugc3RyaWN0JzsgXHJcbnZhciB1c3JDb250ZW50ID0gYW5ndWxhci5tb2R1bGUoJ3VzckNvbnRlbnQnLCBbJ3VpLmNhbGVuZGFyJywgJ3VpLmJvb3RzdHJhcCddKTtcclxuXHJcbnVzckNvbnRlbnQuY29udHJvbGxlcignY3RybENhbGVuZGFyJywgWyckc2NvcGUnLCAnJHJvb3RTY29wZScsICckdGltZW91dCcsICckaHR0cCcsICckY29tcGlsZScsICd1aUNhbGVuZGFyQ29uZmlnJyxcclxuXHRmdW5jdGlvbigkc2NvcGUsICRyb290U2NvcGUsICR0aW1lb3V0LCAkaHR0cCwgJGNvbXBpbGUsIHVpQ2FsZW5kYXJDb25maWcpIHtcclxuXHJcblx0dmFyIGRhdGUgPSBuZXcgRGF0ZSgpO1xyXG4gICAgdmFyIGQgPSBkYXRlLmdldERhdGUoKTtcclxuICAgIHZhciBtID0gZGF0ZS5nZXRNb250aCgpO1xyXG4gICAgdmFyIHkgPSBkYXRlLmdldEZ1bGxZZWFyKCk7XHJcbiAgICBcclxuICAgICRzY29wZS5ldmVudFNvdXJjZSA9IHt9O1xyXG5cclxuICAgIC8qIGV2ZW50IHNvdXJjZSB0aGF0IGNvbnRhaW5zIGN1c3RvbSBldmVudHMgb24gdGhlIHNjb3BlICovXHJcbiAgICAkc2NvcGUuZXZlbnRzID0gW1xyXG4gICAgICAvLyB7dGl0bGU6ICdMb25nIEV2ZW50JyxzdGFydDogbmV3IERhdGUoeSwgbSwgZCAtIDUpLGVuZDogbmV3IERhdGUoeSwgbSwgZCAtIDIpfSxcclxuICAgIF07XHJcblxyXG4gICAgLy8gJHNjb3BlLmpwZXZlbnRzID0gW1xyXG4gICAgLy8gICB7dGl0bGU6ICdKUCBMb25nIEV2ZW50JyxzdGFydDogbmV3IERhdGUoeSwgbSwgZCAtIDUpLGVuZDogbmV3IERhdGUoeSwgbSwgZCAtIDIpfSxcclxuICAgIC8vIF07XHJcblxyXG4gICAgJHNjb3BlLmFkZEV2ZW50ID0gZnVuY3Rpb24oKSB7XHJcbiAgICAgICRzY29wZS5ldmVudHMucHVzaCh7XHJcbiAgICAgICAgdGl0bGU6ICdPcGVuIFNlc2FtZScsXHJcbiAgICAgICAgc3RhcnQ6IG5ldyBEYXRlKHksIG0sIGQgLSA1KSxcclxuICAgICAgICBlbmQ6IG5ldyBEYXRlKHksIG0sIGQgLSAyKSxcclxuICAgICAgICBjbGFzc05hbWU6IFsnb3BlblNlc2FtZSddXHJcbiAgICAgIH0pO1xyXG4gICAgfTtcclxuXHJcblxyXG5cclxuXHQkc2NvcGUudWlDb25maWcgPSB7XHJcbiAgICAgIGNhbGVuZGFyOntcclxuICAgICAgICBlZGl0YWJsZTogdHJ1ZSxcclxuICAgICAgICBoZWFkZXI6e1xyXG4gICAgICAgICAgbGVmdDogJ3RpdGxlJyxcclxuICAgICAgICAgIC8vIGNlbnRlcjogJ3RvZGF5JyxcclxuICAgICAgICAgIHJpZ2h0OiAncHJldixuZXh0J1xyXG4gICAgICAgIH1cclxuICAgICAgfVxyXG4gICAgfTtcclxuICAgIC8qIGV2ZW50IHNvdXJjZXMgYXJyYXkqL1xyXG4gICAgLy8gJHNjb3BlLmV2ZW50U291cmNlcyA9IFskc2NvcGUuanBldmVudHMsICRzY29wZS5ldmVudHNdO1xyXG4gICAgJHNjb3BlLmV2ZW50U291cmNlcyA9IFskc2NvcGUuZXZlbnRzXTtcclxufV0pO1xyXG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gcmVzb3VyY2VzL2Fzc2V0cy9qcy9hcHAvdXNlci91c3JfY2FsZW5kYXIuanMiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7Ozs7O0FBS0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7OztBQUdBO0FBQ0E7Iiwic291cmNlUm9vdCI6IiJ9");

/***/ }
/******/ ]);