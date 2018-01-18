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
eval("'use strict'; \r\nvar usrContent = angular.module('usrContent', ['ui.calendar', 'ui.bootstrap']);\r\n\r\nusrContent.controller('ctrlCalendar', ['$scope', '$rootScope', '$timeout', '$http', '$compile', 'uibDateParser', 'uiCalendarConfig',\r\n\tfunction($scope, $rootScope, $timeout, $http, $compile, uibDateParser, uiCalendarConfig) {\r\n\r\n    $scope.open_calendar = function($event, index, datepicker){\r\n        $scope[datepicker] = {}; $scope[datepicker].open = {};\r\n        $event.preventDefault();\r\n        $event.stopPropagation();\r\n        $scope[datepicker].open[index] = !$scope[datepicker].open[index];\r\n    }\r\n    $scope.MinDate = {\r\n        showWeeks: false,\r\n        minDate: new Date()\r\n    };\r\n    $scope.NoWeeks = {\r\n        showWeeks: false\r\n    };\r\n    \r\n    /* event source that contains custom events on the scope */\r\n    $scope.guest_scheds = [\r\n      // {title: 'Long Event',start: new Date(y, m, d - 5),end: new Date(y, m, d - 2)},\r\n    ];\r\n\r\n    $scope.admin_scheds = [\r\n\r\n    ];\r\n\r\n    // $scope.jpevents = [\r\n    //   {title: 'JP Long Event',start: new Date(y, m, d - 5),end: new Date(y, m, d - 2)},\r\n    // ];\r\n\r\n    $scope.GuestSched = function(schd) {\r\n        var sdate = moment(schd.sdate).startOf('day');\r\n        var edate = moment(schd.edate).startOf('day');\r\n        // console.log(todayDate);\r\n      $scope.guest_scheds.push({\r\n        // title: 'Open Sesame',\r\n        start: sdate.clone().format('YYYY-MM-DD'),\r\n        end: edate.clone().add(1, 'day').format('YYYY-MM-DD'),\r\n        className: ['guest'],\r\n        currentTimezone: 'Asia/Manila' // an option!\r\n      });\r\n      console.log($scope.guest_scheds);\r\n    };\r\n\r\n    $scope.AdminSched = function(schd) {\r\n        var admn_sdate = moment(schd.fromdate).startOf('day');\r\n        var admn_edate = moment(schd.todate).startOf('day');\r\n        // console.log(todayDate);\r\n      $scope.admin_scheds.push({\r\n        // title: 'Open Sesame',\r\n        start: admn_sdate.clone().format('YYYY-MM-DD'),\r\n        end: admn_edate.clone().add(1, 'day').format('YYYY-MM-DD'),\r\n        className: ['admin'],\r\n        currentTimezone: 'Asia/Manila' // an option!\r\n      });\r\n      console.log($scope.admin_scheds);\r\n    };\r\n\r\n\r\n\r\n\t$scope.uiConfig = {\r\n      calendar:{\r\n        editable: true,\r\n        timezone: 'Asia/Manila',\r\n        header:{\r\n          left: 'prev,next today',\r\n          center: 'title',\r\n          right: 'month,agendaWeek,agendaDay,listWeek'\r\n        },\r\n        navLinks: true, // can click day/week names to navigate views\r\n        selectable: true,\r\n        selectHelper: true,\r\n        select: function(start, end) {\r\n            var title = prompt('Event Title:');\r\n            var eventData;\r\n            if (title) {\r\n              // eventData = {\r\n              //   title: title,\r\n              //   start: start,\r\n              //   end: end\r\n              // };\r\n              $scope.admin_scheds.push({\r\n                title: title,\r\n                start: start.clone().format('YYYY-MM-DD'),\r\n                end: end.clone().format('YYYY-MM-DD'),\r\n                className: ['admin'],\r\n                currentTimezone: 'Asia/Manila' // an option!\r\n              });\r\n              $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true\r\n            }\r\n            $('#calendar').fullCalendar('unselect');\r\n        }\r\n      }\r\n    };\r\n    /* event sources array*/\r\n    // $scope.eventSources = [$scope.jpevents, $scope.events];\r\n    $scope.eventSources = [$scope.guest_scheds, $scope.admin_scheds];\r\n}]);\r\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC91c2VyL3Vzcl9jYWxlbmRhci5qcz84ZTRiIl0sInNvdXJjZXNDb250ZW50IjpbIid1c2Ugc3RyaWN0JzsgXHJcbnZhciB1c3JDb250ZW50ID0gYW5ndWxhci5tb2R1bGUoJ3VzckNvbnRlbnQnLCBbJ3VpLmNhbGVuZGFyJywgJ3VpLmJvb3RzdHJhcCddKTtcclxuXHJcbnVzckNvbnRlbnQuY29udHJvbGxlcignY3RybENhbGVuZGFyJywgWyckc2NvcGUnLCAnJHJvb3RTY29wZScsICckdGltZW91dCcsICckaHR0cCcsICckY29tcGlsZScsICd1aWJEYXRlUGFyc2VyJywgJ3VpQ2FsZW5kYXJDb25maWcnLFxyXG5cdGZ1bmN0aW9uKCRzY29wZSwgJHJvb3RTY29wZSwgJHRpbWVvdXQsICRodHRwLCAkY29tcGlsZSwgdWliRGF0ZVBhcnNlciwgdWlDYWxlbmRhckNvbmZpZykge1xyXG5cclxuICAgICRzY29wZS5vcGVuX2NhbGVuZGFyID0gZnVuY3Rpb24oJGV2ZW50LCBpbmRleCwgZGF0ZXBpY2tlcil7XHJcbiAgICAgICAgJHNjb3BlW2RhdGVwaWNrZXJdID0ge307ICRzY29wZVtkYXRlcGlja2VyXS5vcGVuID0ge307XHJcbiAgICAgICAgJGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XHJcbiAgICAgICAgJGV2ZW50LnN0b3BQcm9wYWdhdGlvbigpO1xyXG4gICAgICAgICRzY29wZVtkYXRlcGlja2VyXS5vcGVuW2luZGV4XSA9ICEkc2NvcGVbZGF0ZXBpY2tlcl0ub3BlbltpbmRleF07XHJcbiAgICB9XHJcbiAgICAkc2NvcGUuTWluRGF0ZSA9IHtcclxuICAgICAgICBzaG93V2Vla3M6IGZhbHNlLFxyXG4gICAgICAgIG1pbkRhdGU6IG5ldyBEYXRlKClcclxuICAgIH07XHJcbiAgICAkc2NvcGUuTm9XZWVrcyA9IHtcclxuICAgICAgICBzaG93V2Vla3M6IGZhbHNlXHJcbiAgICB9O1xyXG4gICAgXHJcbiAgICAvKiBldmVudCBzb3VyY2UgdGhhdCBjb250YWlucyBjdXN0b20gZXZlbnRzIG9uIHRoZSBzY29wZSAqL1xyXG4gICAgJHNjb3BlLmd1ZXN0X3NjaGVkcyA9IFtcclxuICAgICAgLy8ge3RpdGxlOiAnTG9uZyBFdmVudCcsc3RhcnQ6IG5ldyBEYXRlKHksIG0sIGQgLSA1KSxlbmQ6IG5ldyBEYXRlKHksIG0sIGQgLSAyKX0sXHJcbiAgICBdO1xyXG5cclxuICAgICRzY29wZS5hZG1pbl9zY2hlZHMgPSBbXHJcblxyXG4gICAgXTtcclxuXHJcbiAgICAvLyAkc2NvcGUuanBldmVudHMgPSBbXHJcbiAgICAvLyAgIHt0aXRsZTogJ0pQIExvbmcgRXZlbnQnLHN0YXJ0OiBuZXcgRGF0ZSh5LCBtLCBkIC0gNSksZW5kOiBuZXcgRGF0ZSh5LCBtLCBkIC0gMil9LFxyXG4gICAgLy8gXTtcclxuXHJcbiAgICAkc2NvcGUuR3Vlc3RTY2hlZCA9IGZ1bmN0aW9uKHNjaGQpIHtcclxuICAgICAgICB2YXIgc2RhdGUgPSBtb21lbnQoc2NoZC5zZGF0ZSkuc3RhcnRPZignZGF5Jyk7XHJcbiAgICAgICAgdmFyIGVkYXRlID0gbW9tZW50KHNjaGQuZWRhdGUpLnN0YXJ0T2YoJ2RheScpO1xyXG4gICAgICAgIC8vIGNvbnNvbGUubG9nKHRvZGF5RGF0ZSk7XHJcbiAgICAgICRzY29wZS5ndWVzdF9zY2hlZHMucHVzaCh7XHJcbiAgICAgICAgLy8gdGl0bGU6ICdPcGVuIFNlc2FtZScsXHJcbiAgICAgICAgc3RhcnQ6IHNkYXRlLmNsb25lKCkuZm9ybWF0KCdZWVlZLU1NLUREJyksXHJcbiAgICAgICAgZW5kOiBlZGF0ZS5jbG9uZSgpLmFkZCgxLCAnZGF5JykuZm9ybWF0KCdZWVlZLU1NLUREJyksXHJcbiAgICAgICAgY2xhc3NOYW1lOiBbJ2d1ZXN0J10sXHJcbiAgICAgICAgY3VycmVudFRpbWV6b25lOiAnQXNpYS9NYW5pbGEnIC8vIGFuIG9wdGlvbiFcclxuICAgICAgfSk7XHJcbiAgICAgIGNvbnNvbGUubG9nKCRzY29wZS5ndWVzdF9zY2hlZHMpO1xyXG4gICAgfTtcclxuXHJcbiAgICAkc2NvcGUuQWRtaW5TY2hlZCA9IGZ1bmN0aW9uKHNjaGQpIHtcclxuICAgICAgICB2YXIgYWRtbl9zZGF0ZSA9IG1vbWVudChzY2hkLmZyb21kYXRlKS5zdGFydE9mKCdkYXknKTtcclxuICAgICAgICB2YXIgYWRtbl9lZGF0ZSA9IG1vbWVudChzY2hkLnRvZGF0ZSkuc3RhcnRPZignZGF5Jyk7XHJcbiAgICAgICAgLy8gY29uc29sZS5sb2codG9kYXlEYXRlKTtcclxuICAgICAgJHNjb3BlLmFkbWluX3NjaGVkcy5wdXNoKHtcclxuICAgICAgICAvLyB0aXRsZTogJ09wZW4gU2VzYW1lJyxcclxuICAgICAgICBzdGFydDogYWRtbl9zZGF0ZS5jbG9uZSgpLmZvcm1hdCgnWVlZWS1NTS1ERCcpLFxyXG4gICAgICAgIGVuZDogYWRtbl9lZGF0ZS5jbG9uZSgpLmFkZCgxLCAnZGF5JykuZm9ybWF0KCdZWVlZLU1NLUREJyksXHJcbiAgICAgICAgY2xhc3NOYW1lOiBbJ2FkbWluJ10sXHJcbiAgICAgICAgY3VycmVudFRpbWV6b25lOiAnQXNpYS9NYW5pbGEnIC8vIGFuIG9wdGlvbiFcclxuICAgICAgfSk7XHJcbiAgICAgIGNvbnNvbGUubG9nKCRzY29wZS5hZG1pbl9zY2hlZHMpO1xyXG4gICAgfTtcclxuXHJcblxyXG5cclxuXHQkc2NvcGUudWlDb25maWcgPSB7XHJcbiAgICAgIGNhbGVuZGFyOntcclxuICAgICAgICBlZGl0YWJsZTogdHJ1ZSxcclxuICAgICAgICB0aW1lem9uZTogJ0FzaWEvTWFuaWxhJyxcclxuICAgICAgICBoZWFkZXI6e1xyXG4gICAgICAgICAgbGVmdDogJ3ByZXYsbmV4dCB0b2RheScsXHJcbiAgICAgICAgICBjZW50ZXI6ICd0aXRsZScsXHJcbiAgICAgICAgICByaWdodDogJ21vbnRoLGFnZW5kYVdlZWssYWdlbmRhRGF5LGxpc3RXZWVrJ1xyXG4gICAgICAgIH0sXHJcbiAgICAgICAgbmF2TGlua3M6IHRydWUsIC8vIGNhbiBjbGljayBkYXkvd2VlayBuYW1lcyB0byBuYXZpZ2F0ZSB2aWV3c1xyXG4gICAgICAgIHNlbGVjdGFibGU6IHRydWUsXHJcbiAgICAgICAgc2VsZWN0SGVscGVyOiB0cnVlLFxyXG4gICAgICAgIHNlbGVjdDogZnVuY3Rpb24oc3RhcnQsIGVuZCkge1xyXG4gICAgICAgICAgICB2YXIgdGl0bGUgPSBwcm9tcHQoJ0V2ZW50IFRpdGxlOicpO1xyXG4gICAgICAgICAgICB2YXIgZXZlbnREYXRhO1xyXG4gICAgICAgICAgICBpZiAodGl0bGUpIHtcclxuICAgICAgICAgICAgICAvLyBldmVudERhdGEgPSB7XHJcbiAgICAgICAgICAgICAgLy8gICB0aXRsZTogdGl0bGUsXHJcbiAgICAgICAgICAgICAgLy8gICBzdGFydDogc3RhcnQsXHJcbiAgICAgICAgICAgICAgLy8gICBlbmQ6IGVuZFxyXG4gICAgICAgICAgICAgIC8vIH07XHJcbiAgICAgICAgICAgICAgJHNjb3BlLmFkbWluX3NjaGVkcy5wdXNoKHtcclxuICAgICAgICAgICAgICAgIHRpdGxlOiB0aXRsZSxcclxuICAgICAgICAgICAgICAgIHN0YXJ0OiBzdGFydC5jbG9uZSgpLmZvcm1hdCgnWVlZWS1NTS1ERCcpLFxyXG4gICAgICAgICAgICAgICAgZW5kOiBlbmQuY2xvbmUoKS5mb3JtYXQoJ1lZWVktTU0tREQnKSxcclxuICAgICAgICAgICAgICAgIGNsYXNzTmFtZTogWydhZG1pbiddLFxyXG4gICAgICAgICAgICAgICAgY3VycmVudFRpbWV6b25lOiAnQXNpYS9NYW5pbGEnIC8vIGFuIG9wdGlvbiFcclxuICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgICAkKCcjY2FsZW5kYXInKS5mdWxsQ2FsZW5kYXIoJ3JlbmRlckV2ZW50JywgZXZlbnREYXRhLCB0cnVlKTsgLy8gc3RpY2s/ID0gdHJ1ZVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICQoJyNjYWxlbmRhcicpLmZ1bGxDYWxlbmRhcigndW5zZWxlY3QnKTtcclxuICAgICAgICB9XHJcbiAgICAgIH1cclxuICAgIH07XHJcbiAgICAvKiBldmVudCBzb3VyY2VzIGFycmF5Ki9cclxuICAgIC8vICRzY29wZS5ldmVudFNvdXJjZXMgPSBbJHNjb3BlLmpwZXZlbnRzLCAkc2NvcGUuZXZlbnRzXTtcclxuICAgICRzY29wZS5ldmVudFNvdXJjZXMgPSBbJHNjb3BlLmd1ZXN0X3NjaGVkcywgJHNjb3BlLmFkbWluX3NjaGVkc107XHJcbn1dKTtcclxuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHJlc291cmNlcy9hc3NldHMvanMvYXBwL3VzZXIvdXNyX2NhbGVuZGFyLmpzIl0sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7Ozs7QUFLQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7Ozs7QUFNQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTsiLCJzb3VyY2VSb290IjoiIn0=");

/***/ }
/******/ ]);