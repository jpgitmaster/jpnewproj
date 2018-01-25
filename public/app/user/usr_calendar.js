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
eval("'use strict'; \r\nvar usrContent = angular.module('usrContent', ['ui.calendar', 'ui.bootstrap']);\r\n\r\nusrContent.factory('Schd', function ($resource) {\r\n    return $resource('/user/views_scheds', {}, {\r\n        query : { method: 'GET', isArray: true }\r\n    });\r\n});\r\nusrContent.controller('ctrlCalendar', ['$scope', '$rootScope', '$timeout', '$http', '$compile', '$filter', 'uibDateParser', 'uiCalendarConfig', 'Schd',\r\n    function($scope, $rootScope, $timeout, $http, $compile, $filter, uibDateParser, uiCalendarConfig, Schd) {\r\n\r\n    $scope.open_calendar = function($event, index, datepicker){\r\n        $scope[datepicker] = {}; $scope[datepicker].open = {};\r\n        $event.preventDefault();\r\n        $event.stopPropagation();\r\n        $scope[datepicker].open[index] = !$scope[datepicker].open[index];\r\n    }\r\n    $scope.MinDate = {\r\n        showWeeks: false,\r\n        minDate: new Date()\r\n    };\r\n    $scope.MaxDateTo = {\r\n        showWeeks: false,\r\n        minDate: new Date()\r\n    };\r\n    $scope.MaxDateCheckout = {\r\n        showWeeks: false,\r\n        minDate: new Date()\r\n    };\r\n    $scope.getMax = function(nwdate, num){\r\n        switch(num){\r\n            case 0:\r\n                $scope.MaxDateCheckout = {\r\n                    showWeeks: false,\r\n                    minDate: nwdate\r\n                }\r\n                break;\r\n            case 1:\r\n                $scope.MaxDateTo = {\r\n                    showWeeks: false,\r\n                    minDate: nwdate\r\n                }\r\n                break;\r\n        }\r\n    }\r\n    \r\n    $scope.activities = [\r\n        {id: 1, name: 'Reserved', textColor: '#FFF', color: '#17b13c'},\r\n        {id: 2, name: 'Out of Service', textColor: '#FFF', color: '#a6a6a6'},\r\n    ]\r\n\r\n    // $scope.MaxDate = {\r\n    //     showWeeks: false,\r\n    //     maxDate: new Date()\r\n    // };\r\n    \r\n    /* event source that contains custom events on the scope */\r\n    $scope.guest_scheds = [\r\n      // {title: 'Long Event',start: new Date(y, m, d - 5),end: new Date(y, m, d - 2)},\r\n    ];\r\n\r\n    $scope.admin_scheds = [\r\n\r\n    ];\r\n    Schd.query().$promise.then(function(data) {\r\n        // $scope.admin_scheds = data;\r\n\r\n        angular.forEach(data, function(value, key){\r\n            moment.tz.add('Asia/Manila|+08 +09|-80 -90|010101010|-1kJI0 AL0 cK10 65X0 mXB0 vX0 VK10 1db0|24e6');\r\n            // console.log(moment(value.end).add(9, 'hours').tz(\"Asia/Manila\").format());\r\n            $scope.admin_scheds.push({\r\n                genid: value.genid,\r\n                title: value.title,\r\n                color: value.color,\r\n                textColor: value.textColor,\r\n                start: moment(value.start).tz(\"Asia/Manila\").format('YYYY-MM-DD'),\r\n                end: moment(value.end).add(1, 'day').tz(\"Asia/Manila\").format('YYYY-MM-DD'),\r\n                reason: value.reason,\r\n                className: 'admin',\r\n                stick: true\r\n                // currentTimezone: 'Asia/Manila',\r\n                // allDay: true\r\n            });\r\n        });\r\n    });\r\n    // $scope.jpevents = [\r\n    //   {title: 'JP Long Event',start: new Date(y, m, d - 5),end: new Date(y, m, d - 2)},\r\n    // ];\r\n\r\n    $scope.GuestSched = function(schd) {\r\n        var sdate = moment(schd.sdate).startOf('day');\r\n        var edate = moment(schd.edate).startOf('day');\r\n        // console.log(todayDate);\r\n      $scope.guest_scheds.push({\r\n        // title: 'Open Sesame',\r\n        start: sdate.clone().format('YYYY-MM-DD'),\r\n        end: edate.clone().add(1, 'day').format('YYYY-MM-DD'),\r\n        className: ['guest']\r\n        // currentTimezone: 'Asia/Manila' // an option!\r\n      });\r\n      console.log($scope.guest_scheds);\r\n    };\r\n\r\n\r\n    $scope.schd = {};\r\n    var activities = {},\r\n        sked = {};\r\n    $scope.AdminSched = function(sked) {\r\n        if(sked.activity_type){\r\n            activities = $filter('filter')($scope.activities, {id: sked.activity_type})[0];\r\n        }\r\n        var admn_sdate = moment(sked.start).startOf('day'),\r\n            admn_edate = moment(sked.end).startOf('day');\r\n        \r\n        if(activities.color){\r\n            sked.color = activities.color;\r\n        }\r\n\r\n        if(activities.textColor){\r\n            sked.textColor = activities.textColor;\r\n        }\r\n\r\n        $http({\r\n            method: 'POST',\r\n            url: '/user/save_calendar',\r\n            headers: { 'Content-Type': undefined },\r\n            transformRequest: function (data) {\r\n                var fd = new FormData();\r\n                fd.append('sched', angular.toJson(data.sched));\r\n                return fd;\r\n            },\r\n            data: {sched: sked}\r\n        }).then(function(result){\r\n            $scope.msg = result.data;\r\n            console.log(result.data);\r\n\r\n            $scope.admin_scheds.push({\r\n                genid: 32132,\r\n                title: sked.title,\r\n                color: activities.color,\r\n                textColor: activities.textColor,\r\n                start: admn_sdate.clone().format('YYYY-MM-DD'),\r\n                end: admn_edate.clone().add(1, 'day').format('YYYY-MM-DD'),\r\n                className: 'admin',\r\n                readon: admn_sdate.reason\r\n                // currentTimezone: 'Asia/Manila' // an option!\r\n            });\r\n            $scope.schd = {};\r\n            // console.log($scope.admin_scheds);\r\n        });\r\n    };\r\n    $scope.testClick = function(){\r\n        angular.element('.slctd_data').fadeOut('fast');\r\n        console.log('test');\r\n    }\r\n    $scope.alertOnEventClick = function( date, jsEvent, view){\r\n        $scope.slctd = $filter('filter')($scope.admin_scheds, {genid: date.genid})[0];\r\n        // var iclone = angular.copy(angular.element('.slctd_data').clone());\r\n        angular.element('.slctd_data').fadeOut('fast');\r\n        var tpl = $compile('<div class=\"slctd_data\" style=\"position: absolute; z-index: 9; top: inherit; left: 0; right: 0; bottom: 33px; max-width: 330px; display: none;\"><div class=\"popover bs-popover-top\" style=\"max-width: 100%; width: 100%; position: relative; margin: 0;\"><div class=\"arrow\"></div><div class=\"popover-body\"><button class=\"btn btn-primary\" ng-click=\"testClick()\" type=\"button\">test</button><h1>'+$scope.slctd.title+'</h1><p>'+$scope.slctd.reason+'</p></div></div></div>')($scope);\r\n        $timeout(function(){\r\n            angular.element(tpl).prependTo($(jsEvent.target).closest('.fc-event-container')).hide().delay(100).fadeIn();\r\n        }, 20);\r\n        // console.log($scope.islct);\r\n    };\r\n\r\n    $scope.uiConfig = {\r\n      calendar:{\r\n        height: 500,\r\n        editable: true,\r\n        header:{\r\n          left: 'prev,next today',\r\n          center: 'title',\r\n          right: 'month,agendaWeek,agendaDay,listWeek'\r\n        },\r\n        navLinks: true, // can click day/week names to navigate views\r\n        // selectable: true,\r\n        // selectHelper: true,\r\n        // select: function(start, end) {\r\n        //     var title = prompt('Event Title:');\r\n        //     var eventData;\r\n        //     if (title) {\r\n        //       // eventData = {\r\n        //       //   title: title,\r\n        //       //   start: start,\r\n        //       //   end: end\r\n        //       // };\r\n        //       $scope.admin_scheds.push({\r\n        //         title: title,\r\n        //         start: start.clone().format('YYYY-MM-DD'),\r\n        //         end: end.clone().format('YYYY-MM-DD'),\r\n        //         className: ['admin'],\r\n        //         currentTimezone: 'Asia/Manila' // an option!\r\n        //       });\r\n        //       $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true\r\n        //     }\r\n        //     $('#calendar').fullCalendar('unselect');\r\n        // }\r\n        eventClick: $scope.alertOnEventClick,\r\n        eventDrop: function(event, delta, revertFunc, jsEvent, ui, view){\r\n           console.log('Event Droped to make dayDelta ' + delta);\r\n        },\r\n        eventResize: function(event, delta, revertFunc, jsEvent, ui, view ){\r\n           console.log('Event Resized to make dayDelta ' + delta);\r\n        }\r\n        // ignoreTimezone: true\r\n      }\r\n    };\r\n    /* event sources array*/\r\n    // $scope.eventSources = [$scope.jpevents, $scope.events];\r\n    $scope.eventSources = [$scope.guest_scheds, $scope.admin_scheds];\r\n\r\n    $scope.addActivityType = function(typ){\r\n        console.log(typ);\r\n    }\r\n    $scope.typ = {};\r\n}]);\r\nusrContent.directive('colorPicker', ['$parse', '$http', '$timeout',\r\n    function($parse, $http, $timeout){\r\n    return {\r\n        restrict: 'A',\r\n        link: function(scope, elm, attrs){\r\n            elm.ColorPicker({\r\n                onSubmit: function(hsb, hex, rgb, el) {\r\n                    console.log(hex);\r\n                    scope.typ.color = '#'+hex;\r\n                    $(el).val('#'+hex);\r\n                    $(el).ColorPickerHide();\r\n                }\r\n            });\r\n        }\r\n    }\r\n}]);//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC91c2VyL3Vzcl9jYWxlbmRhci5qcz84ZTRiIl0sInNvdXJjZXNDb250ZW50IjpbIid1c2Ugc3RyaWN0JzsgXHJcbnZhciB1c3JDb250ZW50ID0gYW5ndWxhci5tb2R1bGUoJ3VzckNvbnRlbnQnLCBbJ3VpLmNhbGVuZGFyJywgJ3VpLmJvb3RzdHJhcCddKTtcclxuXHJcbnVzckNvbnRlbnQuZmFjdG9yeSgnU2NoZCcsIGZ1bmN0aW9uICgkcmVzb3VyY2UpIHtcclxuICAgIHJldHVybiAkcmVzb3VyY2UoJy91c2VyL3ZpZXdzX3NjaGVkcycsIHt9LCB7XHJcbiAgICAgICAgcXVlcnkgOiB7IG1ldGhvZDogJ0dFVCcsIGlzQXJyYXk6IHRydWUgfVxyXG4gICAgfSk7XHJcbn0pO1xyXG51c3JDb250ZW50LmNvbnRyb2xsZXIoJ2N0cmxDYWxlbmRhcicsIFsnJHNjb3BlJywgJyRyb290U2NvcGUnLCAnJHRpbWVvdXQnLCAnJGh0dHAnLCAnJGNvbXBpbGUnLCAnJGZpbHRlcicsICd1aWJEYXRlUGFyc2VyJywgJ3VpQ2FsZW5kYXJDb25maWcnLCAnU2NoZCcsXHJcbiAgICBmdW5jdGlvbigkc2NvcGUsICRyb290U2NvcGUsICR0aW1lb3V0LCAkaHR0cCwgJGNvbXBpbGUsICRmaWx0ZXIsIHVpYkRhdGVQYXJzZXIsIHVpQ2FsZW5kYXJDb25maWcsIFNjaGQpIHtcclxuXHJcbiAgICAkc2NvcGUub3Blbl9jYWxlbmRhciA9IGZ1bmN0aW9uKCRldmVudCwgaW5kZXgsIGRhdGVwaWNrZXIpe1xyXG4gICAgICAgICRzY29wZVtkYXRlcGlja2VyXSA9IHt9OyAkc2NvcGVbZGF0ZXBpY2tlcl0ub3BlbiA9IHt9O1xyXG4gICAgICAgICRldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xyXG4gICAgICAgICRldmVudC5zdG9wUHJvcGFnYXRpb24oKTtcclxuICAgICAgICAkc2NvcGVbZGF0ZXBpY2tlcl0ub3BlbltpbmRleF0gPSAhJHNjb3BlW2RhdGVwaWNrZXJdLm9wZW5baW5kZXhdO1xyXG4gICAgfVxyXG4gICAgJHNjb3BlLk1pbkRhdGUgPSB7XHJcbiAgICAgICAgc2hvd1dlZWtzOiBmYWxzZSxcclxuICAgICAgICBtaW5EYXRlOiBuZXcgRGF0ZSgpXHJcbiAgICB9O1xyXG4gICAgJHNjb3BlLk1heERhdGVUbyA9IHtcclxuICAgICAgICBzaG93V2Vla3M6IGZhbHNlLFxyXG4gICAgICAgIG1pbkRhdGU6IG5ldyBEYXRlKClcclxuICAgIH07XHJcbiAgICAkc2NvcGUuTWF4RGF0ZUNoZWNrb3V0ID0ge1xyXG4gICAgICAgIHNob3dXZWVrczogZmFsc2UsXHJcbiAgICAgICAgbWluRGF0ZTogbmV3IERhdGUoKVxyXG4gICAgfTtcclxuICAgICRzY29wZS5nZXRNYXggPSBmdW5jdGlvbihud2RhdGUsIG51bSl7XHJcbiAgICAgICAgc3dpdGNoKG51bSl7XHJcbiAgICAgICAgICAgIGNhc2UgMDpcclxuICAgICAgICAgICAgICAgICRzY29wZS5NYXhEYXRlQ2hlY2tvdXQgPSB7XHJcbiAgICAgICAgICAgICAgICAgICAgc2hvd1dlZWtzOiBmYWxzZSxcclxuICAgICAgICAgICAgICAgICAgICBtaW5EYXRlOiBud2RhdGVcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIGJyZWFrO1xyXG4gICAgICAgICAgICBjYXNlIDE6XHJcbiAgICAgICAgICAgICAgICAkc2NvcGUuTWF4RGF0ZVRvID0ge1xyXG4gICAgICAgICAgICAgICAgICAgIHNob3dXZWVrczogZmFsc2UsXHJcbiAgICAgICAgICAgICAgICAgICAgbWluRGF0ZTogbndkYXRlXHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICBicmVhaztcclxuICAgICAgICB9XHJcbiAgICB9XHJcbiAgICBcclxuICAgICRzY29wZS5hY3Rpdml0aWVzID0gW1xyXG4gICAgICAgIHtpZDogMSwgbmFtZTogJ1Jlc2VydmVkJywgdGV4dENvbG9yOiAnI0ZGRicsIGNvbG9yOiAnIzE3YjEzYyd9LFxyXG4gICAgICAgIHtpZDogMiwgbmFtZTogJ091dCBvZiBTZXJ2aWNlJywgdGV4dENvbG9yOiAnI0ZGRicsIGNvbG9yOiAnI2E2YTZhNid9LFxyXG4gICAgXVxyXG5cclxuICAgIC8vICRzY29wZS5NYXhEYXRlID0ge1xyXG4gICAgLy8gICAgIHNob3dXZWVrczogZmFsc2UsXHJcbiAgICAvLyAgICAgbWF4RGF0ZTogbmV3IERhdGUoKVxyXG4gICAgLy8gfTtcclxuICAgIFxyXG4gICAgLyogZXZlbnQgc291cmNlIHRoYXQgY29udGFpbnMgY3VzdG9tIGV2ZW50cyBvbiB0aGUgc2NvcGUgKi9cclxuICAgICRzY29wZS5ndWVzdF9zY2hlZHMgPSBbXHJcbiAgICAgIC8vIHt0aXRsZTogJ0xvbmcgRXZlbnQnLHN0YXJ0OiBuZXcgRGF0ZSh5LCBtLCBkIC0gNSksZW5kOiBuZXcgRGF0ZSh5LCBtLCBkIC0gMil9LFxyXG4gICAgXTtcclxuXHJcbiAgICAkc2NvcGUuYWRtaW5fc2NoZWRzID0gW1xyXG5cclxuICAgIF07XHJcbiAgICBTY2hkLnF1ZXJ5KCkuJHByb21pc2UudGhlbihmdW5jdGlvbihkYXRhKSB7XHJcbiAgICAgICAgLy8gJHNjb3BlLmFkbWluX3NjaGVkcyA9IGRhdGE7XHJcblxyXG4gICAgICAgIGFuZ3VsYXIuZm9yRWFjaChkYXRhLCBmdW5jdGlvbih2YWx1ZSwga2V5KXtcclxuICAgICAgICAgICAgbW9tZW50LnR6LmFkZCgnQXNpYS9NYW5pbGF8KzA4ICswOXwtODAgLTkwfDAxMDEwMTAxMHwtMWtKSTAgQUwwIGNLMTAgNjVYMCBtWEIwIHZYMCBWSzEwIDFkYjB8MjRlNicpO1xyXG4gICAgICAgICAgICAvLyBjb25zb2xlLmxvZyhtb21lbnQodmFsdWUuZW5kKS5hZGQoOSwgJ2hvdXJzJykudHooXCJBc2lhL01hbmlsYVwiKS5mb3JtYXQoKSk7XHJcbiAgICAgICAgICAgICRzY29wZS5hZG1pbl9zY2hlZHMucHVzaCh7XHJcbiAgICAgICAgICAgICAgICBnZW5pZDogdmFsdWUuZ2VuaWQsXHJcbiAgICAgICAgICAgICAgICB0aXRsZTogdmFsdWUudGl0bGUsXHJcbiAgICAgICAgICAgICAgICBjb2xvcjogdmFsdWUuY29sb3IsXHJcbiAgICAgICAgICAgICAgICB0ZXh0Q29sb3I6IHZhbHVlLnRleHRDb2xvcixcclxuICAgICAgICAgICAgICAgIHN0YXJ0OiBtb21lbnQodmFsdWUuc3RhcnQpLnR6KFwiQXNpYS9NYW5pbGFcIikuZm9ybWF0KCdZWVlZLU1NLUREJyksXHJcbiAgICAgICAgICAgICAgICBlbmQ6IG1vbWVudCh2YWx1ZS5lbmQpLmFkZCgxLCAnZGF5JykudHooXCJBc2lhL01hbmlsYVwiKS5mb3JtYXQoJ1lZWVktTU0tREQnKSxcclxuICAgICAgICAgICAgICAgIHJlYXNvbjogdmFsdWUucmVhc29uLFxyXG4gICAgICAgICAgICAgICAgY2xhc3NOYW1lOiAnYWRtaW4nLFxyXG4gICAgICAgICAgICAgICAgc3RpY2s6IHRydWVcclxuICAgICAgICAgICAgICAgIC8vIGN1cnJlbnRUaW1lem9uZTogJ0FzaWEvTWFuaWxhJyxcclxuICAgICAgICAgICAgICAgIC8vIGFsbERheTogdHJ1ZVxyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9KTtcclxuICAgIH0pO1xyXG4gICAgLy8gJHNjb3BlLmpwZXZlbnRzID0gW1xyXG4gICAgLy8gICB7dGl0bGU6ICdKUCBMb25nIEV2ZW50JyxzdGFydDogbmV3IERhdGUoeSwgbSwgZCAtIDUpLGVuZDogbmV3IERhdGUoeSwgbSwgZCAtIDIpfSxcclxuICAgIC8vIF07XHJcblxyXG4gICAgJHNjb3BlLkd1ZXN0U2NoZWQgPSBmdW5jdGlvbihzY2hkKSB7XHJcbiAgICAgICAgdmFyIHNkYXRlID0gbW9tZW50KHNjaGQuc2RhdGUpLnN0YXJ0T2YoJ2RheScpO1xyXG4gICAgICAgIHZhciBlZGF0ZSA9IG1vbWVudChzY2hkLmVkYXRlKS5zdGFydE9mKCdkYXknKTtcclxuICAgICAgICAvLyBjb25zb2xlLmxvZyh0b2RheURhdGUpO1xyXG4gICAgICAkc2NvcGUuZ3Vlc3Rfc2NoZWRzLnB1c2goe1xyXG4gICAgICAgIC8vIHRpdGxlOiAnT3BlbiBTZXNhbWUnLFxyXG4gICAgICAgIHN0YXJ0OiBzZGF0ZS5jbG9uZSgpLmZvcm1hdCgnWVlZWS1NTS1ERCcpLFxyXG4gICAgICAgIGVuZDogZWRhdGUuY2xvbmUoKS5hZGQoMSwgJ2RheScpLmZvcm1hdCgnWVlZWS1NTS1ERCcpLFxyXG4gICAgICAgIGNsYXNzTmFtZTogWydndWVzdCddXHJcbiAgICAgICAgLy8gY3VycmVudFRpbWV6b25lOiAnQXNpYS9NYW5pbGEnIC8vIGFuIG9wdGlvbiFcclxuICAgICAgfSk7XHJcbiAgICAgIGNvbnNvbGUubG9nKCRzY29wZS5ndWVzdF9zY2hlZHMpO1xyXG4gICAgfTtcclxuXHJcblxyXG4gICAgJHNjb3BlLnNjaGQgPSB7fTtcclxuICAgIHZhciBhY3Rpdml0aWVzID0ge30sXHJcbiAgICAgICAgc2tlZCA9IHt9O1xyXG4gICAgJHNjb3BlLkFkbWluU2NoZWQgPSBmdW5jdGlvbihza2VkKSB7XHJcbiAgICAgICAgaWYoc2tlZC5hY3Rpdml0eV90eXBlKXtcclxuICAgICAgICAgICAgYWN0aXZpdGllcyA9ICRmaWx0ZXIoJ2ZpbHRlcicpKCRzY29wZS5hY3Rpdml0aWVzLCB7aWQ6IHNrZWQuYWN0aXZpdHlfdHlwZX0pWzBdO1xyXG4gICAgICAgIH1cclxuICAgICAgICB2YXIgYWRtbl9zZGF0ZSA9IG1vbWVudChza2VkLnN0YXJ0KS5zdGFydE9mKCdkYXknKSxcclxuICAgICAgICAgICAgYWRtbl9lZGF0ZSA9IG1vbWVudChza2VkLmVuZCkuc3RhcnRPZignZGF5Jyk7XHJcbiAgICAgICAgXHJcbiAgICAgICAgaWYoYWN0aXZpdGllcy5jb2xvcil7XHJcbiAgICAgICAgICAgIHNrZWQuY29sb3IgPSBhY3Rpdml0aWVzLmNvbG9yO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgaWYoYWN0aXZpdGllcy50ZXh0Q29sb3Ipe1xyXG4gICAgICAgICAgICBza2VkLnRleHRDb2xvciA9IGFjdGl2aXRpZXMudGV4dENvbG9yO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgJGh0dHAoe1xyXG4gICAgICAgICAgICBtZXRob2Q6ICdQT1NUJyxcclxuICAgICAgICAgICAgdXJsOiAnL3VzZXIvc2F2ZV9jYWxlbmRhcicsXHJcbiAgICAgICAgICAgIGhlYWRlcnM6IHsgJ0NvbnRlbnQtVHlwZSc6IHVuZGVmaW5lZCB9LFxyXG4gICAgICAgICAgICB0cmFuc2Zvcm1SZXF1ZXN0OiBmdW5jdGlvbiAoZGF0YSkge1xyXG4gICAgICAgICAgICAgICAgdmFyIGZkID0gbmV3IEZvcm1EYXRhKCk7XHJcbiAgICAgICAgICAgICAgICBmZC5hcHBlbmQoJ3NjaGVkJywgYW5ndWxhci50b0pzb24oZGF0YS5zY2hlZCkpO1xyXG4gICAgICAgICAgICAgICAgcmV0dXJuIGZkO1xyXG4gICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICBkYXRhOiB7c2NoZWQ6IHNrZWR9XHJcbiAgICAgICAgfSkudGhlbihmdW5jdGlvbihyZXN1bHQpe1xyXG4gICAgICAgICAgICAkc2NvcGUubXNnID0gcmVzdWx0LmRhdGE7XHJcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKHJlc3VsdC5kYXRhKTtcclxuXHJcbiAgICAgICAgICAgICRzY29wZS5hZG1pbl9zY2hlZHMucHVzaCh7XHJcbiAgICAgICAgICAgICAgICBnZW5pZDogMzIxMzIsXHJcbiAgICAgICAgICAgICAgICB0aXRsZTogc2tlZC50aXRsZSxcclxuICAgICAgICAgICAgICAgIGNvbG9yOiBhY3Rpdml0aWVzLmNvbG9yLFxyXG4gICAgICAgICAgICAgICAgdGV4dENvbG9yOiBhY3Rpdml0aWVzLnRleHRDb2xvcixcclxuICAgICAgICAgICAgICAgIHN0YXJ0OiBhZG1uX3NkYXRlLmNsb25lKCkuZm9ybWF0KCdZWVlZLU1NLUREJyksXHJcbiAgICAgICAgICAgICAgICBlbmQ6IGFkbW5fZWRhdGUuY2xvbmUoKS5hZGQoMSwgJ2RheScpLmZvcm1hdCgnWVlZWS1NTS1ERCcpLFxyXG4gICAgICAgICAgICAgICAgY2xhc3NOYW1lOiAnYWRtaW4nLFxyXG4gICAgICAgICAgICAgICAgcmVhZG9uOiBhZG1uX3NkYXRlLnJlYXNvblxyXG4gICAgICAgICAgICAgICAgLy8gY3VycmVudFRpbWV6b25lOiAnQXNpYS9NYW5pbGEnIC8vIGFuIG9wdGlvbiFcclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICRzY29wZS5zY2hkID0ge307XHJcbiAgICAgICAgICAgIC8vIGNvbnNvbGUubG9nKCRzY29wZS5hZG1pbl9zY2hlZHMpO1xyXG4gICAgICAgIH0pO1xyXG4gICAgfTtcclxuICAgICRzY29wZS50ZXN0Q2xpY2sgPSBmdW5jdGlvbigpe1xyXG4gICAgICAgIGFuZ3VsYXIuZWxlbWVudCgnLnNsY3RkX2RhdGEnKS5mYWRlT3V0KCdmYXN0Jyk7XHJcbiAgICAgICAgY29uc29sZS5sb2coJ3Rlc3QnKTtcclxuICAgIH1cclxuICAgICRzY29wZS5hbGVydE9uRXZlbnRDbGljayA9IGZ1bmN0aW9uKCBkYXRlLCBqc0V2ZW50LCB2aWV3KXtcclxuICAgICAgICAkc2NvcGUuc2xjdGQgPSAkZmlsdGVyKCdmaWx0ZXInKSgkc2NvcGUuYWRtaW5fc2NoZWRzLCB7Z2VuaWQ6IGRhdGUuZ2VuaWR9KVswXTtcclxuICAgICAgICAvLyB2YXIgaWNsb25lID0gYW5ndWxhci5jb3B5KGFuZ3VsYXIuZWxlbWVudCgnLnNsY3RkX2RhdGEnKS5jbG9uZSgpKTtcclxuICAgICAgICBhbmd1bGFyLmVsZW1lbnQoJy5zbGN0ZF9kYXRhJykuZmFkZU91dCgnZmFzdCcpO1xyXG4gICAgICAgIHZhciB0cGwgPSAkY29tcGlsZSgnPGRpdiBjbGFzcz1cInNsY3RkX2RhdGFcIiBzdHlsZT1cInBvc2l0aW9uOiBhYnNvbHV0ZTsgei1pbmRleDogOTsgdG9wOiBpbmhlcml0OyBsZWZ0OiAwOyByaWdodDogMDsgYm90dG9tOiAzM3B4OyBtYXgtd2lkdGg6IDMzMHB4OyBkaXNwbGF5OiBub25lO1wiPjxkaXYgY2xhc3M9XCJwb3BvdmVyIGJzLXBvcG92ZXItdG9wXCIgc3R5bGU9XCJtYXgtd2lkdGg6IDEwMCU7IHdpZHRoOiAxMDAlOyBwb3NpdGlvbjogcmVsYXRpdmU7IG1hcmdpbjogMDtcIj48ZGl2IGNsYXNzPVwiYXJyb3dcIj48L2Rpdj48ZGl2IGNsYXNzPVwicG9wb3Zlci1ib2R5XCI+PGJ1dHRvbiBjbGFzcz1cImJ0biBidG4tcHJpbWFyeVwiIG5nLWNsaWNrPVwidGVzdENsaWNrKClcIiB0eXBlPVwiYnV0dG9uXCI+dGVzdDwvYnV0dG9uPjxoMT4nKyRzY29wZS5zbGN0ZC50aXRsZSsnPC9oMT48cD4nKyRzY29wZS5zbGN0ZC5yZWFzb24rJzwvcD48L2Rpdj48L2Rpdj48L2Rpdj4nKSgkc2NvcGUpO1xyXG4gICAgICAgICR0aW1lb3V0KGZ1bmN0aW9uKCl7XHJcbiAgICAgICAgICAgIGFuZ3VsYXIuZWxlbWVudCh0cGwpLnByZXBlbmRUbygkKGpzRXZlbnQudGFyZ2V0KS5jbG9zZXN0KCcuZmMtZXZlbnQtY29udGFpbmVyJykpLmhpZGUoKS5kZWxheSgxMDApLmZhZGVJbigpO1xyXG4gICAgICAgIH0sIDIwKTtcclxuICAgICAgICAvLyBjb25zb2xlLmxvZygkc2NvcGUuaXNsY3QpO1xyXG4gICAgfTtcclxuXHJcbiAgICAkc2NvcGUudWlDb25maWcgPSB7XHJcbiAgICAgIGNhbGVuZGFyOntcclxuICAgICAgICBoZWlnaHQ6IDUwMCxcclxuICAgICAgICBlZGl0YWJsZTogdHJ1ZSxcclxuICAgICAgICBoZWFkZXI6e1xyXG4gICAgICAgICAgbGVmdDogJ3ByZXYsbmV4dCB0b2RheScsXHJcbiAgICAgICAgICBjZW50ZXI6ICd0aXRsZScsXHJcbiAgICAgICAgICByaWdodDogJ21vbnRoLGFnZW5kYVdlZWssYWdlbmRhRGF5LGxpc3RXZWVrJ1xyXG4gICAgICAgIH0sXHJcbiAgICAgICAgbmF2TGlua3M6IHRydWUsIC8vIGNhbiBjbGljayBkYXkvd2VlayBuYW1lcyB0byBuYXZpZ2F0ZSB2aWV3c1xyXG4gICAgICAgIC8vIHNlbGVjdGFibGU6IHRydWUsXHJcbiAgICAgICAgLy8gc2VsZWN0SGVscGVyOiB0cnVlLFxyXG4gICAgICAgIC8vIHNlbGVjdDogZnVuY3Rpb24oc3RhcnQsIGVuZCkge1xyXG4gICAgICAgIC8vICAgICB2YXIgdGl0bGUgPSBwcm9tcHQoJ0V2ZW50IFRpdGxlOicpO1xyXG4gICAgICAgIC8vICAgICB2YXIgZXZlbnREYXRhO1xyXG4gICAgICAgIC8vICAgICBpZiAodGl0bGUpIHtcclxuICAgICAgICAvLyAgICAgICAvLyBldmVudERhdGEgPSB7XHJcbiAgICAgICAgLy8gICAgICAgLy8gICB0aXRsZTogdGl0bGUsXHJcbiAgICAgICAgLy8gICAgICAgLy8gICBzdGFydDogc3RhcnQsXHJcbiAgICAgICAgLy8gICAgICAgLy8gICBlbmQ6IGVuZFxyXG4gICAgICAgIC8vICAgICAgIC8vIH07XHJcbiAgICAgICAgLy8gICAgICAgJHNjb3BlLmFkbWluX3NjaGVkcy5wdXNoKHtcclxuICAgICAgICAvLyAgICAgICAgIHRpdGxlOiB0aXRsZSxcclxuICAgICAgICAvLyAgICAgICAgIHN0YXJ0OiBzdGFydC5jbG9uZSgpLmZvcm1hdCgnWVlZWS1NTS1ERCcpLFxyXG4gICAgICAgIC8vICAgICAgICAgZW5kOiBlbmQuY2xvbmUoKS5mb3JtYXQoJ1lZWVktTU0tREQnKSxcclxuICAgICAgICAvLyAgICAgICAgIGNsYXNzTmFtZTogWydhZG1pbiddLFxyXG4gICAgICAgIC8vICAgICAgICAgY3VycmVudFRpbWV6b25lOiAnQXNpYS9NYW5pbGEnIC8vIGFuIG9wdGlvbiFcclxuICAgICAgICAvLyAgICAgICB9KTtcclxuICAgICAgICAvLyAgICAgICAkKCcjY2FsZW5kYXInKS5mdWxsQ2FsZW5kYXIoJ3JlbmRlckV2ZW50JywgZXZlbnREYXRhLCB0cnVlKTsgLy8gc3RpY2s/ID0gdHJ1ZVxyXG4gICAgICAgIC8vICAgICB9XHJcbiAgICAgICAgLy8gICAgICQoJyNjYWxlbmRhcicpLmZ1bGxDYWxlbmRhcigndW5zZWxlY3QnKTtcclxuICAgICAgICAvLyB9XHJcbiAgICAgICAgZXZlbnRDbGljazogJHNjb3BlLmFsZXJ0T25FdmVudENsaWNrLFxyXG4gICAgICAgIGV2ZW50RHJvcDogZnVuY3Rpb24oZXZlbnQsIGRlbHRhLCByZXZlcnRGdW5jLCBqc0V2ZW50LCB1aSwgdmlldyl7XHJcbiAgICAgICAgICAgY29uc29sZS5sb2coJ0V2ZW50IERyb3BlZCB0byBtYWtlIGRheURlbHRhICcgKyBkZWx0YSk7XHJcbiAgICAgICAgfSxcclxuICAgICAgICBldmVudFJlc2l6ZTogZnVuY3Rpb24oZXZlbnQsIGRlbHRhLCByZXZlcnRGdW5jLCBqc0V2ZW50LCB1aSwgdmlldyApe1xyXG4gICAgICAgICAgIGNvbnNvbGUubG9nKCdFdmVudCBSZXNpemVkIHRvIG1ha2UgZGF5RGVsdGEgJyArIGRlbHRhKTtcclxuICAgICAgICB9XHJcbiAgICAgICAgLy8gaWdub3JlVGltZXpvbmU6IHRydWVcclxuICAgICAgfVxyXG4gICAgfTtcclxuICAgIC8qIGV2ZW50IHNvdXJjZXMgYXJyYXkqL1xyXG4gICAgLy8gJHNjb3BlLmV2ZW50U291cmNlcyA9IFskc2NvcGUuanBldmVudHMsICRzY29wZS5ldmVudHNdO1xyXG4gICAgJHNjb3BlLmV2ZW50U291cmNlcyA9IFskc2NvcGUuZ3Vlc3Rfc2NoZWRzLCAkc2NvcGUuYWRtaW5fc2NoZWRzXTtcclxuXHJcbiAgICAkc2NvcGUuYWRkQWN0aXZpdHlUeXBlID0gZnVuY3Rpb24odHlwKXtcclxuICAgICAgICBjb25zb2xlLmxvZyh0eXApO1xyXG4gICAgfVxyXG4gICAgJHNjb3BlLnR5cCA9IHt9O1xyXG59XSk7XHJcbnVzckNvbnRlbnQuZGlyZWN0aXZlKCdjb2xvclBpY2tlcicsIFsnJHBhcnNlJywgJyRodHRwJywgJyR0aW1lb3V0JyxcclxuICAgIGZ1bmN0aW9uKCRwYXJzZSwgJGh0dHAsICR0aW1lb3V0KXtcclxuICAgIHJldHVybiB7XHJcbiAgICAgICAgcmVzdHJpY3Q6ICdBJyxcclxuICAgICAgICBsaW5rOiBmdW5jdGlvbihzY29wZSwgZWxtLCBhdHRycyl7XHJcbiAgICAgICAgICAgIGVsbS5Db2xvclBpY2tlcih7XHJcbiAgICAgICAgICAgICAgICBvblN1Ym1pdDogZnVuY3Rpb24oaHNiLCBoZXgsIHJnYiwgZWwpIHtcclxuICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhoZXgpO1xyXG4gICAgICAgICAgICAgICAgICAgIHNjb3BlLnR5cC5jb2xvciA9ICcjJytoZXg7XHJcbiAgICAgICAgICAgICAgICAgICAgJChlbCkudmFsKCcjJytoZXgpO1xyXG4gICAgICAgICAgICAgICAgICAgICQoZWwpLkNvbG9yUGlja2VySGlkZSgpO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9XHJcbiAgICB9XHJcbn1dKTtcblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gcmVzb3VyY2VzL2Fzc2V0cy9qcy9hcHAvdXNlci91c3JfY2FsZW5kYXIuanMiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7Ozs7OztBQU9BOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTtBQUNBOzs7OztBQUtBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7OztBQXVCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOzs7QUFHQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTsiLCJzb3VyY2VSb290IjoiIn0=");

/***/ }
/******/ ]);