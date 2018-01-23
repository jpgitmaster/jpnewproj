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
eval("'use strict'; \r\nvar usrContent = angular.module('usrContent', ['ui.calendar', 'ui.bootstrap']);\r\n\r\nusrContent.factory('Schd', function ($resource) {\r\n    return $resource('/user/views_scheds', {}, {\r\n        query : { method: 'GET', isArray: true }\r\n    });\r\n});\r\nusrContent.controller('ctrlCalendar', ['$scope', '$rootScope', '$timeout', '$http', '$compile', '$filter', 'uibDateParser', 'uiCalendarConfig', 'Schd',\r\n\tfunction($scope, $rootScope, $timeout, $http, $compile, $filter, uibDateParser, uiCalendarConfig, Schd) {\r\n\r\n    $scope.open_calendar = function($event, index, datepicker){\r\n        $scope[datepicker] = {}; $scope[datepicker].open = {};\r\n        $event.preventDefault();\r\n        $event.stopPropagation();\r\n        $scope[datepicker].open[index] = !$scope[datepicker].open[index];\r\n    }\r\n    $scope.MinDate = {\r\n        showWeeks: false,\r\n        minDate: new Date()\r\n    };\r\n    $scope.MaxDateTo = {\r\n        showWeeks: false,\r\n        minDate: new Date()\r\n    };\r\n    $scope.MaxDateCheckout = {\r\n        showWeeks: false,\r\n        minDate: new Date()\r\n    };\r\n    $scope.getMax = function(nwdate, num){\r\n        switch(num){\r\n            case 0:\r\n                $scope.MaxDateCheckout = {\r\n                    showWeeks: false,\r\n                    minDate: nwdate\r\n                }\r\n                break;\r\n            case 1:\r\n                $scope.MaxDateTo = {\r\n                    showWeeks: false,\r\n                    minDate: nwdate\r\n                }\r\n                break;\r\n        }\r\n    }\r\n    \r\n    $scope.activities = [\r\n        {id: 1, name: 'Reserved', textColor: '#FFF', color: '#17b13c'},\r\n        {id: 2, name: 'Out of Service', textColor: '#FFF', color: '#a6a6a6'},\r\n    ]\r\n\r\n    // $scope.MaxDate = {\r\n    //     showWeeks: false,\r\n    //     maxDate: new Date()\r\n    // };\r\n    \r\n    /* event source that contains custom events on the scope */\r\n    $scope.guest_scheds = [\r\n      // {title: 'Long Event',start: new Date(y, m, d - 5),end: new Date(y, m, d - 2)},\r\n    ];\r\n\r\n    $scope.admin_scheds = [\r\n\r\n    ];\r\n    Schd.query().$promise.then(function(data) {\r\n        // $scope.admin_scheds = data;\r\n\r\n        angular.forEach(data, function(value, key){\r\n            moment.tz.add('Asia/Manila|+08 +09|-80 -90|010101010|-1kJI0 AL0 cK10 65X0 mXB0 vX0 VK10 1db0|24e6');\r\n            // console.log(moment(value.end).add(9, 'hours').tz(\"Asia/Manila\").format());\r\n            $scope.admin_scheds.push({\r\n                genid: value.genid,\r\n                title: value.title,\r\n                color: value.color,\r\n                textColor: value.textColor,\r\n                start: moment(value.start).tz(\"Asia/Manila\").format('YYYY-MM-DD'),\r\n                end: moment(value.end).add(1, 'day').tz(\"Asia/Manila\").format('YYYY-MM-DD'),\r\n                reason: value.reason,\r\n                className: 'admin'\r\n                // currentTimezone: 'Asia/Manila',\r\n                // allDay: true\r\n            });\r\n        });\r\n    });\r\n    // $scope.jpevents = [\r\n    //   {title: 'JP Long Event',start: new Date(y, m, d - 5),end: new Date(y, m, d - 2)},\r\n    // ];\r\n\r\n    $scope.GuestSched = function(schd) {\r\n        var sdate = moment(schd.sdate).startOf('day');\r\n        var edate = moment(schd.edate).startOf('day');\r\n        // console.log(todayDate);\r\n      $scope.guest_scheds.push({\r\n        // title: 'Open Sesame',\r\n        start: sdate.clone().format('YYYY-MM-DD'),\r\n        end: edate.clone().add(1, 'day').format('YYYY-MM-DD'),\r\n        className: ['guest']\r\n        // currentTimezone: 'Asia/Manila' // an option!\r\n      });\r\n      console.log($scope.guest_scheds);\r\n    };\r\n\r\n\r\n    $scope.schd = {};\r\n    var activities = {},\r\n        sked = {};\r\n    $scope.AdminSched = function(sked) {\r\n        if(sked.activity_type){\r\n            activities = $filter('filter')($scope.activities, {id: sked.activity_type})[0];\r\n        }\r\n        var admn_sdate = moment(sked.start).startOf('day'),\r\n            admn_edate = moment(sked.end).startOf('day');\r\n        \r\n        if(activities.color){\r\n            sked.color = activities.color;\r\n        }\r\n\r\n        if(activities.textColor){\r\n            sked.textColor = activities.textColor;\r\n        }\r\n\r\n        $http({\r\n            method: 'POST',\r\n            url: '/user/save_calendar',\r\n            headers: { 'Content-Type': undefined },\r\n            transformRequest: function (data) {\r\n                var fd = new FormData();\r\n                fd.append('sched', angular.toJson(data.sched));\r\n                return fd;\r\n            },\r\n            data: {sched: sked}\r\n        }).then(function(result){\r\n            $scope.msg = result.data;\r\n            console.log(result.data);\r\n\r\n            $scope.admin_scheds.push({\r\n                genid: 32132,\r\n                title: sked.title,\r\n                color: activities.color,\r\n                textColor: activities.textColor,\r\n                start: admn_sdate.clone().format('YYYY-MM-DD'),\r\n                end: admn_edate.clone().add(1, 'day').format('YYYY-MM-DD'),\r\n                className: 'admin'\r\n                // currentTimezone: 'Asia/Manila' // an option!\r\n            });\r\n            $scope.schd = {};\r\n            // console.log($scope.admin_scheds);\r\n        });\r\n    };\r\n\r\n    // $scope.slctd = {};\r\n    // $scope.alertOnEventClick = function( date, jsEvent, view){\r\n    //     $scope.slctd = $filter('filter')($scope.admin_scheds, {genid: date.genid})[0];\r\n    //     console.log($scope.slctd);\r\n    // };\r\n\r\n    var popTemplate = [\r\n    '<div class=\"clndrppovr popover am-flip-x\">',\r\n    '<div class=\"arrow\"></div>',\r\n    '<div class=\"popover-body\"></div>',\r\n    '</div>'].join('');\r\n    var popoverElement;\r\n\t$scope.uiConfig = {\r\n      calendar:{\r\n        editable: true,\r\n        header:{\r\n          left: 'prev,next today',\r\n          center: 'title',\r\n          right: 'month,agendaWeek,agendaDay,listWeek'\r\n        },\r\n        navLinks: true, // can click day/week names to navigate views\r\n        // selectable: true,\r\n        selectHelper: true,\r\n        // select: function(start, end) {\r\n        //     var title = prompt('Event Title:');\r\n        //     var eventData;\r\n        //     if (title) {\r\n        //       // eventData = {\r\n        //       //   title: title,\r\n        //       //   start: start,\r\n        //       //   end: end\r\n        //       // };\r\n        //       $scope.admin_scheds.push({\r\n        //         title: title,\r\n        //         start: start.clone().format('YYYY-MM-DD'),\r\n        //         end: end.clone().format('YYYY-MM-DD'),\r\n        //         className: ['admin'],\r\n        //         currentTimezone: 'Asia/Manila' // an option!\r\n        //       });\r\n        //       $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true\r\n        //     }\r\n        //     $('#calendar').fullCalendar('unselect');\r\n        // }\r\n        // eventClick: $scope.alertOnEventClick,\r\n        eventClick: function (date, jsEvent, view) {\r\n            $scope.slctd = $filter('filter')($scope.admin_scheds, {genid: date.genid})[0];\r\n            popoverElement = $(jsEvent.currentTarget);\r\n        },\r\n        select: function (date, jsEvent, view) {\r\n            $scope.slctd = $filter('filter')($scope.admin_scheds, {genid: date.genid})[0];\r\n            closePopovers();\r\n            popoverElement = $(jsEvent.target);\r\n            $(jsEvent.target).popover({\r\n                content: function () {\r\n                    return $(\"#popoverContent\").html();\r\n                },\r\n                template: popTemplate,\r\n                placement: 'top',\r\n                html: true,\r\n                trigger: 'click',\r\n                animation: true,\r\n                container: 'body'\r\n            }).popover('show');\r\n        },\r\n        eventRender: function (event, element) {\r\n            element.popover({\r\n                content: function () {\r\n                    return $(\"#popoverContent\").html();\r\n                },\r\n                template: popTemplate,\r\n                placement: 'top',\r\n                html: true,\r\n                trigger: 'click',\r\n                animation: true,\r\n                container: 'body'\r\n            }).popover('show');\r\n\r\n        }\r\n      }\r\n    };\r\n\r\n    function closePopovers() {\r\n        $('.popover').not(this).popover('hide');\r\n    }\r\n    /* event sources array*/\r\n    // $scope.eventSources = [$scope.jpevents, $scope.events];\r\n    $scope.eventSources = [$scope.guest_scheds, $scope.admin_scheds];\r\n\r\n    angular.element('body').on('click', function (e) {\r\n        // close the popover if: click outside of the popover || click on the close button of the popover\r\n        if (popoverElement && ((!popoverElement.is(e.target) && popoverElement.has(e.target).length === 0 && $('.popover').has(e.target).length === 0) || (popoverElement.has(e.target) && e.target.id === 'closepopover'))) {\r\n\r\n            ///$('.popover').popover('hide'); --> works\r\n            closePopovers();\r\n        }\r\n    });\r\n}]);\r\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC91c2VyL3Vzcl9jYWxlbmRhci5qcz84ZTRiIl0sInNvdXJjZXNDb250ZW50IjpbIid1c2Ugc3RyaWN0JzsgXHJcbnZhciB1c3JDb250ZW50ID0gYW5ndWxhci5tb2R1bGUoJ3VzckNvbnRlbnQnLCBbJ3VpLmNhbGVuZGFyJywgJ3VpLmJvb3RzdHJhcCddKTtcclxuXHJcbnVzckNvbnRlbnQuZmFjdG9yeSgnU2NoZCcsIGZ1bmN0aW9uICgkcmVzb3VyY2UpIHtcclxuICAgIHJldHVybiAkcmVzb3VyY2UoJy91c2VyL3ZpZXdzX3NjaGVkcycsIHt9LCB7XHJcbiAgICAgICAgcXVlcnkgOiB7IG1ldGhvZDogJ0dFVCcsIGlzQXJyYXk6IHRydWUgfVxyXG4gICAgfSk7XHJcbn0pO1xyXG51c3JDb250ZW50LmNvbnRyb2xsZXIoJ2N0cmxDYWxlbmRhcicsIFsnJHNjb3BlJywgJyRyb290U2NvcGUnLCAnJHRpbWVvdXQnLCAnJGh0dHAnLCAnJGNvbXBpbGUnLCAnJGZpbHRlcicsICd1aWJEYXRlUGFyc2VyJywgJ3VpQ2FsZW5kYXJDb25maWcnLCAnU2NoZCcsXHJcblx0ZnVuY3Rpb24oJHNjb3BlLCAkcm9vdFNjb3BlLCAkdGltZW91dCwgJGh0dHAsICRjb21waWxlLCAkZmlsdGVyLCB1aWJEYXRlUGFyc2VyLCB1aUNhbGVuZGFyQ29uZmlnLCBTY2hkKSB7XHJcblxyXG4gICAgJHNjb3BlLm9wZW5fY2FsZW5kYXIgPSBmdW5jdGlvbigkZXZlbnQsIGluZGV4LCBkYXRlcGlja2VyKXtcclxuICAgICAgICAkc2NvcGVbZGF0ZXBpY2tlcl0gPSB7fTsgJHNjb3BlW2RhdGVwaWNrZXJdLm9wZW4gPSB7fTtcclxuICAgICAgICAkZXZlbnQucHJldmVudERlZmF1bHQoKTtcclxuICAgICAgICAkZXZlbnQuc3RvcFByb3BhZ2F0aW9uKCk7XHJcbiAgICAgICAgJHNjb3BlW2RhdGVwaWNrZXJdLm9wZW5baW5kZXhdID0gISRzY29wZVtkYXRlcGlja2VyXS5vcGVuW2luZGV4XTtcclxuICAgIH1cclxuICAgICRzY29wZS5NaW5EYXRlID0ge1xyXG4gICAgICAgIHNob3dXZWVrczogZmFsc2UsXHJcbiAgICAgICAgbWluRGF0ZTogbmV3IERhdGUoKVxyXG4gICAgfTtcclxuICAgICRzY29wZS5NYXhEYXRlVG8gPSB7XHJcbiAgICAgICAgc2hvd1dlZWtzOiBmYWxzZSxcclxuICAgICAgICBtaW5EYXRlOiBuZXcgRGF0ZSgpXHJcbiAgICB9O1xyXG4gICAgJHNjb3BlLk1heERhdGVDaGVja291dCA9IHtcclxuICAgICAgICBzaG93V2Vla3M6IGZhbHNlLFxyXG4gICAgICAgIG1pbkRhdGU6IG5ldyBEYXRlKClcclxuICAgIH07XHJcbiAgICAkc2NvcGUuZ2V0TWF4ID0gZnVuY3Rpb24obndkYXRlLCBudW0pe1xyXG4gICAgICAgIHN3aXRjaChudW0pe1xyXG4gICAgICAgICAgICBjYXNlIDA6XHJcbiAgICAgICAgICAgICAgICAkc2NvcGUuTWF4RGF0ZUNoZWNrb3V0ID0ge1xyXG4gICAgICAgICAgICAgICAgICAgIHNob3dXZWVrczogZmFsc2UsXHJcbiAgICAgICAgICAgICAgICAgICAgbWluRGF0ZTogbndkYXRlXHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICBicmVhaztcclxuICAgICAgICAgICAgY2FzZSAxOlxyXG4gICAgICAgICAgICAgICAgJHNjb3BlLk1heERhdGVUbyA9IHtcclxuICAgICAgICAgICAgICAgICAgICBzaG93V2Vla3M6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgICAgIG1pbkRhdGU6IG53ZGF0ZVxyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgYnJlYWs7XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG4gICAgXHJcbiAgICAkc2NvcGUuYWN0aXZpdGllcyA9IFtcclxuICAgICAgICB7aWQ6IDEsIG5hbWU6ICdSZXNlcnZlZCcsIHRleHRDb2xvcjogJyNGRkYnLCBjb2xvcjogJyMxN2IxM2MnfSxcclxuICAgICAgICB7aWQ6IDIsIG5hbWU6ICdPdXQgb2YgU2VydmljZScsIHRleHRDb2xvcjogJyNGRkYnLCBjb2xvcjogJyNhNmE2YTYnfSxcclxuICAgIF1cclxuXHJcbiAgICAvLyAkc2NvcGUuTWF4RGF0ZSA9IHtcclxuICAgIC8vICAgICBzaG93V2Vla3M6IGZhbHNlLFxyXG4gICAgLy8gICAgIG1heERhdGU6IG5ldyBEYXRlKClcclxuICAgIC8vIH07XHJcbiAgICBcclxuICAgIC8qIGV2ZW50IHNvdXJjZSB0aGF0IGNvbnRhaW5zIGN1c3RvbSBldmVudHMgb24gdGhlIHNjb3BlICovXHJcbiAgICAkc2NvcGUuZ3Vlc3Rfc2NoZWRzID0gW1xyXG4gICAgICAvLyB7dGl0bGU6ICdMb25nIEV2ZW50JyxzdGFydDogbmV3IERhdGUoeSwgbSwgZCAtIDUpLGVuZDogbmV3IERhdGUoeSwgbSwgZCAtIDIpfSxcclxuICAgIF07XHJcblxyXG4gICAgJHNjb3BlLmFkbWluX3NjaGVkcyA9IFtcclxuXHJcbiAgICBdO1xyXG4gICAgU2NoZC5xdWVyeSgpLiRwcm9taXNlLnRoZW4oZnVuY3Rpb24oZGF0YSkge1xyXG4gICAgICAgIC8vICRzY29wZS5hZG1pbl9zY2hlZHMgPSBkYXRhO1xyXG5cclxuICAgICAgICBhbmd1bGFyLmZvckVhY2goZGF0YSwgZnVuY3Rpb24odmFsdWUsIGtleSl7XHJcbiAgICAgICAgICAgIG1vbWVudC50ei5hZGQoJ0FzaWEvTWFuaWxhfCswOCArMDl8LTgwIC05MHwwMTAxMDEwMTB8LTFrSkkwIEFMMCBjSzEwIDY1WDAgbVhCMCB2WDAgVksxMCAxZGIwfDI0ZTYnKTtcclxuICAgICAgICAgICAgLy8gY29uc29sZS5sb2cobW9tZW50KHZhbHVlLmVuZCkuYWRkKDksICdob3VycycpLnR6KFwiQXNpYS9NYW5pbGFcIikuZm9ybWF0KCkpO1xyXG4gICAgICAgICAgICAkc2NvcGUuYWRtaW5fc2NoZWRzLnB1c2goe1xyXG4gICAgICAgICAgICAgICAgZ2VuaWQ6IHZhbHVlLmdlbmlkLFxyXG4gICAgICAgICAgICAgICAgdGl0bGU6IHZhbHVlLnRpdGxlLFxyXG4gICAgICAgICAgICAgICAgY29sb3I6IHZhbHVlLmNvbG9yLFxyXG4gICAgICAgICAgICAgICAgdGV4dENvbG9yOiB2YWx1ZS50ZXh0Q29sb3IsXHJcbiAgICAgICAgICAgICAgICBzdGFydDogbW9tZW50KHZhbHVlLnN0YXJ0KS50eihcIkFzaWEvTWFuaWxhXCIpLmZvcm1hdCgnWVlZWS1NTS1ERCcpLFxyXG4gICAgICAgICAgICAgICAgZW5kOiBtb21lbnQodmFsdWUuZW5kKS5hZGQoMSwgJ2RheScpLnR6KFwiQXNpYS9NYW5pbGFcIikuZm9ybWF0KCdZWVlZLU1NLUREJyksXHJcbiAgICAgICAgICAgICAgICByZWFzb246IHZhbHVlLnJlYXNvbixcclxuICAgICAgICAgICAgICAgIGNsYXNzTmFtZTogJ2FkbWluJ1xyXG4gICAgICAgICAgICAgICAgLy8gY3VycmVudFRpbWV6b25lOiAnQXNpYS9NYW5pbGEnLFxyXG4gICAgICAgICAgICAgICAgLy8gYWxsRGF5OiB0cnVlXHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgIH0pO1xyXG4gICAgfSk7XHJcbiAgICAvLyAkc2NvcGUuanBldmVudHMgPSBbXHJcbiAgICAvLyAgIHt0aXRsZTogJ0pQIExvbmcgRXZlbnQnLHN0YXJ0OiBuZXcgRGF0ZSh5LCBtLCBkIC0gNSksZW5kOiBuZXcgRGF0ZSh5LCBtLCBkIC0gMil9LFxyXG4gICAgLy8gXTtcclxuXHJcbiAgICAkc2NvcGUuR3Vlc3RTY2hlZCA9IGZ1bmN0aW9uKHNjaGQpIHtcclxuICAgICAgICB2YXIgc2RhdGUgPSBtb21lbnQoc2NoZC5zZGF0ZSkuc3RhcnRPZignZGF5Jyk7XHJcbiAgICAgICAgdmFyIGVkYXRlID0gbW9tZW50KHNjaGQuZWRhdGUpLnN0YXJ0T2YoJ2RheScpO1xyXG4gICAgICAgIC8vIGNvbnNvbGUubG9nKHRvZGF5RGF0ZSk7XHJcbiAgICAgICRzY29wZS5ndWVzdF9zY2hlZHMucHVzaCh7XHJcbiAgICAgICAgLy8gdGl0bGU6ICdPcGVuIFNlc2FtZScsXHJcbiAgICAgICAgc3RhcnQ6IHNkYXRlLmNsb25lKCkuZm9ybWF0KCdZWVlZLU1NLUREJyksXHJcbiAgICAgICAgZW5kOiBlZGF0ZS5jbG9uZSgpLmFkZCgxLCAnZGF5JykuZm9ybWF0KCdZWVlZLU1NLUREJyksXHJcbiAgICAgICAgY2xhc3NOYW1lOiBbJ2d1ZXN0J11cclxuICAgICAgICAvLyBjdXJyZW50VGltZXpvbmU6ICdBc2lhL01hbmlsYScgLy8gYW4gb3B0aW9uIVxyXG4gICAgICB9KTtcclxuICAgICAgY29uc29sZS5sb2coJHNjb3BlLmd1ZXN0X3NjaGVkcyk7XHJcbiAgICB9O1xyXG5cclxuXHJcbiAgICAkc2NvcGUuc2NoZCA9IHt9O1xyXG4gICAgdmFyIGFjdGl2aXRpZXMgPSB7fSxcclxuICAgICAgICBza2VkID0ge307XHJcbiAgICAkc2NvcGUuQWRtaW5TY2hlZCA9IGZ1bmN0aW9uKHNrZWQpIHtcclxuICAgICAgICBpZihza2VkLmFjdGl2aXR5X3R5cGUpe1xyXG4gICAgICAgICAgICBhY3Rpdml0aWVzID0gJGZpbHRlcignZmlsdGVyJykoJHNjb3BlLmFjdGl2aXRpZXMsIHtpZDogc2tlZC5hY3Rpdml0eV90eXBlfSlbMF07XHJcbiAgICAgICAgfVxyXG4gICAgICAgIHZhciBhZG1uX3NkYXRlID0gbW9tZW50KHNrZWQuc3RhcnQpLnN0YXJ0T2YoJ2RheScpLFxyXG4gICAgICAgICAgICBhZG1uX2VkYXRlID0gbW9tZW50KHNrZWQuZW5kKS5zdGFydE9mKCdkYXknKTtcclxuICAgICAgICBcclxuICAgICAgICBpZihhY3Rpdml0aWVzLmNvbG9yKXtcclxuICAgICAgICAgICAgc2tlZC5jb2xvciA9IGFjdGl2aXRpZXMuY29sb3I7XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICBpZihhY3Rpdml0aWVzLnRleHRDb2xvcil7XHJcbiAgICAgICAgICAgIHNrZWQudGV4dENvbG9yID0gYWN0aXZpdGllcy50ZXh0Q29sb3I7XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICAkaHR0cCh7XHJcbiAgICAgICAgICAgIG1ldGhvZDogJ1BPU1QnLFxyXG4gICAgICAgICAgICB1cmw6ICcvdXNlci9zYXZlX2NhbGVuZGFyJyxcclxuICAgICAgICAgICAgaGVhZGVyczogeyAnQ29udGVudC1UeXBlJzogdW5kZWZpbmVkIH0sXHJcbiAgICAgICAgICAgIHRyYW5zZm9ybVJlcXVlc3Q6IGZ1bmN0aW9uIChkYXRhKSB7XHJcbiAgICAgICAgICAgICAgICB2YXIgZmQgPSBuZXcgRm9ybURhdGEoKTtcclxuICAgICAgICAgICAgICAgIGZkLmFwcGVuZCgnc2NoZWQnLCBhbmd1bGFyLnRvSnNvbihkYXRhLnNjaGVkKSk7XHJcbiAgICAgICAgICAgICAgICByZXR1cm4gZmQ7XHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIGRhdGE6IHtzY2hlZDogc2tlZH1cclxuICAgICAgICB9KS50aGVuKGZ1bmN0aW9uKHJlc3VsdCl7XHJcbiAgICAgICAgICAgICRzY29wZS5tc2cgPSByZXN1bHQuZGF0YTtcclxuICAgICAgICAgICAgY29uc29sZS5sb2cocmVzdWx0LmRhdGEpO1xyXG5cclxuICAgICAgICAgICAgJHNjb3BlLmFkbWluX3NjaGVkcy5wdXNoKHtcclxuICAgICAgICAgICAgICAgIGdlbmlkOiAzMjEzMixcclxuICAgICAgICAgICAgICAgIHRpdGxlOiBza2VkLnRpdGxlLFxyXG4gICAgICAgICAgICAgICAgY29sb3I6IGFjdGl2aXRpZXMuY29sb3IsXHJcbiAgICAgICAgICAgICAgICB0ZXh0Q29sb3I6IGFjdGl2aXRpZXMudGV4dENvbG9yLFxyXG4gICAgICAgICAgICAgICAgc3RhcnQ6IGFkbW5fc2RhdGUuY2xvbmUoKS5mb3JtYXQoJ1lZWVktTU0tREQnKSxcclxuICAgICAgICAgICAgICAgIGVuZDogYWRtbl9lZGF0ZS5jbG9uZSgpLmFkZCgxLCAnZGF5JykuZm9ybWF0KCdZWVlZLU1NLUREJyksXHJcbiAgICAgICAgICAgICAgICBjbGFzc05hbWU6ICdhZG1pbidcclxuICAgICAgICAgICAgICAgIC8vIGN1cnJlbnRUaW1lem9uZTogJ0FzaWEvTWFuaWxhJyAvLyBhbiBvcHRpb24hXHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAkc2NvcGUuc2NoZCA9IHt9O1xyXG4gICAgICAgICAgICAvLyBjb25zb2xlLmxvZygkc2NvcGUuYWRtaW5fc2NoZWRzKTtcclxuICAgICAgICB9KTtcclxuICAgIH07XHJcblxyXG4gICAgLy8gJHNjb3BlLnNsY3RkID0ge307XHJcbiAgICAvLyAkc2NvcGUuYWxlcnRPbkV2ZW50Q2xpY2sgPSBmdW5jdGlvbiggZGF0ZSwganNFdmVudCwgdmlldyl7XHJcbiAgICAvLyAgICAgJHNjb3BlLnNsY3RkID0gJGZpbHRlcignZmlsdGVyJykoJHNjb3BlLmFkbWluX3NjaGVkcywge2dlbmlkOiBkYXRlLmdlbmlkfSlbMF07XHJcbiAgICAvLyAgICAgY29uc29sZS5sb2coJHNjb3BlLnNsY3RkKTtcclxuICAgIC8vIH07XHJcblxyXG4gICAgdmFyIHBvcFRlbXBsYXRlID0gW1xyXG4gICAgJzxkaXYgY2xhc3M9XCJjbG5kcnBwb3ZyIHBvcG92ZXIgYW0tZmxpcC14XCI+JyxcclxuICAgICc8ZGl2IGNsYXNzPVwiYXJyb3dcIj48L2Rpdj4nLFxyXG4gICAgJzxkaXYgY2xhc3M9XCJwb3BvdmVyLWJvZHlcIj48L2Rpdj4nLFxyXG4gICAgJzwvZGl2PiddLmpvaW4oJycpO1xyXG4gICAgdmFyIHBvcG92ZXJFbGVtZW50O1xyXG5cdCRzY29wZS51aUNvbmZpZyA9IHtcclxuICAgICAgY2FsZW5kYXI6e1xyXG4gICAgICAgIGVkaXRhYmxlOiB0cnVlLFxyXG4gICAgICAgIGhlYWRlcjp7XHJcbiAgICAgICAgICBsZWZ0OiAncHJldixuZXh0IHRvZGF5JyxcclxuICAgICAgICAgIGNlbnRlcjogJ3RpdGxlJyxcclxuICAgICAgICAgIHJpZ2h0OiAnbW9udGgsYWdlbmRhV2VlayxhZ2VuZGFEYXksbGlzdFdlZWsnXHJcbiAgICAgICAgfSxcclxuICAgICAgICBuYXZMaW5rczogdHJ1ZSwgLy8gY2FuIGNsaWNrIGRheS93ZWVrIG5hbWVzIHRvIG5hdmlnYXRlIHZpZXdzXHJcbiAgICAgICAgLy8gc2VsZWN0YWJsZTogdHJ1ZSxcclxuICAgICAgICBzZWxlY3RIZWxwZXI6IHRydWUsXHJcbiAgICAgICAgLy8gc2VsZWN0OiBmdW5jdGlvbihzdGFydCwgZW5kKSB7XHJcbiAgICAgICAgLy8gICAgIHZhciB0aXRsZSA9IHByb21wdCgnRXZlbnQgVGl0bGU6Jyk7XHJcbiAgICAgICAgLy8gICAgIHZhciBldmVudERhdGE7XHJcbiAgICAgICAgLy8gICAgIGlmICh0aXRsZSkge1xyXG4gICAgICAgIC8vICAgICAgIC8vIGV2ZW50RGF0YSA9IHtcclxuICAgICAgICAvLyAgICAgICAvLyAgIHRpdGxlOiB0aXRsZSxcclxuICAgICAgICAvLyAgICAgICAvLyAgIHN0YXJ0OiBzdGFydCxcclxuICAgICAgICAvLyAgICAgICAvLyAgIGVuZDogZW5kXHJcbiAgICAgICAgLy8gICAgICAgLy8gfTtcclxuICAgICAgICAvLyAgICAgICAkc2NvcGUuYWRtaW5fc2NoZWRzLnB1c2goe1xyXG4gICAgICAgIC8vICAgICAgICAgdGl0bGU6IHRpdGxlLFxyXG4gICAgICAgIC8vICAgICAgICAgc3RhcnQ6IHN0YXJ0LmNsb25lKCkuZm9ybWF0KCdZWVlZLU1NLUREJyksXHJcbiAgICAgICAgLy8gICAgICAgICBlbmQ6IGVuZC5jbG9uZSgpLmZvcm1hdCgnWVlZWS1NTS1ERCcpLFxyXG4gICAgICAgIC8vICAgICAgICAgY2xhc3NOYW1lOiBbJ2FkbWluJ10sXHJcbiAgICAgICAgLy8gICAgICAgICBjdXJyZW50VGltZXpvbmU6ICdBc2lhL01hbmlsYScgLy8gYW4gb3B0aW9uIVxyXG4gICAgICAgIC8vICAgICAgIH0pO1xyXG4gICAgICAgIC8vICAgICAgICQoJyNjYWxlbmRhcicpLmZ1bGxDYWxlbmRhcigncmVuZGVyRXZlbnQnLCBldmVudERhdGEsIHRydWUpOyAvLyBzdGljaz8gPSB0cnVlXHJcbiAgICAgICAgLy8gICAgIH1cclxuICAgICAgICAvLyAgICAgJCgnI2NhbGVuZGFyJykuZnVsbENhbGVuZGFyKCd1bnNlbGVjdCcpO1xyXG4gICAgICAgIC8vIH1cclxuICAgICAgICAvLyBldmVudENsaWNrOiAkc2NvcGUuYWxlcnRPbkV2ZW50Q2xpY2ssXHJcbiAgICAgICAgZXZlbnRDbGljazogZnVuY3Rpb24gKGRhdGUsIGpzRXZlbnQsIHZpZXcpIHtcclxuICAgICAgICAgICAgJHNjb3BlLnNsY3RkID0gJGZpbHRlcignZmlsdGVyJykoJHNjb3BlLmFkbWluX3NjaGVkcywge2dlbmlkOiBkYXRlLmdlbmlkfSlbMF07XHJcbiAgICAgICAgICAgIHBvcG92ZXJFbGVtZW50ID0gJChqc0V2ZW50LmN1cnJlbnRUYXJnZXQpO1xyXG4gICAgICAgIH0sXHJcbiAgICAgICAgc2VsZWN0OiBmdW5jdGlvbiAoZGF0ZSwganNFdmVudCwgdmlldykge1xyXG4gICAgICAgICAgICAkc2NvcGUuc2xjdGQgPSAkZmlsdGVyKCdmaWx0ZXInKSgkc2NvcGUuYWRtaW5fc2NoZWRzLCB7Z2VuaWQ6IGRhdGUuZ2VuaWR9KVswXTtcclxuICAgICAgICAgICAgY2xvc2VQb3BvdmVycygpO1xyXG4gICAgICAgICAgICBwb3BvdmVyRWxlbWVudCA9ICQoanNFdmVudC50YXJnZXQpO1xyXG4gICAgICAgICAgICAkKGpzRXZlbnQudGFyZ2V0KS5wb3BvdmVyKHtcclxuICAgICAgICAgICAgICAgIGNvbnRlbnQ6IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgICAgICByZXR1cm4gJChcIiNwb3BvdmVyQ29udGVudFwiKS5odG1sKCk7XHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgdGVtcGxhdGU6IHBvcFRlbXBsYXRlLFxyXG4gICAgICAgICAgICAgICAgcGxhY2VtZW50OiAndG9wJyxcclxuICAgICAgICAgICAgICAgIGh0bWw6IHRydWUsXHJcbiAgICAgICAgICAgICAgICB0cmlnZ2VyOiAnY2xpY2snLFxyXG4gICAgICAgICAgICAgICAgYW5pbWF0aW9uOiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgY29udGFpbmVyOiAnYm9keSdcclxuICAgICAgICAgICAgfSkucG9wb3Zlcignc2hvdycpO1xyXG4gICAgICAgIH0sXHJcbiAgICAgICAgZXZlbnRSZW5kZXI6IGZ1bmN0aW9uIChldmVudCwgZWxlbWVudCkge1xyXG4gICAgICAgICAgICBlbGVtZW50LnBvcG92ZXIoe1xyXG4gICAgICAgICAgICAgICAgY29udGVudDogZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAgICAgICAgIHJldHVybiAkKFwiI3BvcG92ZXJDb250ZW50XCIpLmh0bWwoKTtcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICB0ZW1wbGF0ZTogcG9wVGVtcGxhdGUsXHJcbiAgICAgICAgICAgICAgICBwbGFjZW1lbnQ6ICd0b3AnLFxyXG4gICAgICAgICAgICAgICAgaHRtbDogdHJ1ZSxcclxuICAgICAgICAgICAgICAgIHRyaWdnZXI6ICdjbGljaycsXHJcbiAgICAgICAgICAgICAgICBhbmltYXRpb246IHRydWUsXHJcbiAgICAgICAgICAgICAgICBjb250YWluZXI6ICdib2R5J1xyXG4gICAgICAgICAgICB9KS5wb3BvdmVyKCdzaG93Jyk7XHJcblxyXG4gICAgICAgIH1cclxuICAgICAgfVxyXG4gICAgfTtcclxuXHJcbiAgICBmdW5jdGlvbiBjbG9zZVBvcG92ZXJzKCkge1xyXG4gICAgICAgICQoJy5wb3BvdmVyJykubm90KHRoaXMpLnBvcG92ZXIoJ2hpZGUnKTtcclxuICAgIH1cclxuICAgIC8qIGV2ZW50IHNvdXJjZXMgYXJyYXkqL1xyXG4gICAgLy8gJHNjb3BlLmV2ZW50U291cmNlcyA9IFskc2NvcGUuanBldmVudHMsICRzY29wZS5ldmVudHNdO1xyXG4gICAgJHNjb3BlLmV2ZW50U291cmNlcyA9IFskc2NvcGUuZ3Vlc3Rfc2NoZWRzLCAkc2NvcGUuYWRtaW5fc2NoZWRzXTtcclxuXHJcbiAgICBhbmd1bGFyLmVsZW1lbnQoJ2JvZHknKS5vbignY2xpY2snLCBmdW5jdGlvbiAoZSkge1xyXG4gICAgICAgIC8vIGNsb3NlIHRoZSBwb3BvdmVyIGlmOiBjbGljayBvdXRzaWRlIG9mIHRoZSBwb3BvdmVyIHx8IGNsaWNrIG9uIHRoZSBjbG9zZSBidXR0b24gb2YgdGhlIHBvcG92ZXJcclxuICAgICAgICBpZiAocG9wb3ZlckVsZW1lbnQgJiYgKCghcG9wb3ZlckVsZW1lbnQuaXMoZS50YXJnZXQpICYmIHBvcG92ZXJFbGVtZW50LmhhcyhlLnRhcmdldCkubGVuZ3RoID09PSAwICYmICQoJy5wb3BvdmVyJykuaGFzKGUudGFyZ2V0KS5sZW5ndGggPT09IDApIHx8IChwb3BvdmVyRWxlbWVudC5oYXMoZS50YXJnZXQpICYmIGUudGFyZ2V0LmlkID09PSAnY2xvc2Vwb3BvdmVyJykpKSB7XHJcblxyXG4gICAgICAgICAgICAvLy8kKCcucG9wb3ZlcicpLnBvcG92ZXIoJ2hpZGUnKTsgLS0+IHdvcmtzXHJcbiAgICAgICAgICAgIGNsb3NlUG9wb3ZlcnMoKTtcclxuICAgICAgICB9XHJcbiAgICB9KTtcclxufV0pO1xyXG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gcmVzb3VyY2VzL2Fzc2V0cy9qcy9hcHAvdXNlci91c3JfY2FsZW5kYXIuanMiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7Ozs7OztBQU9BOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7OztBQUdBO0FBQ0E7QUFDQTs7Ozs7QUFLQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7Ozs7OztBQU9BO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7OztBQXNCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7Iiwic291cmNlUm9vdCI6IiJ9");

/***/ }
/******/ ]);