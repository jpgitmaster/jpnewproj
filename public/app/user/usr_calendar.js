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
eval("'use strict'; \r\nvar usrContent = angular.module('usrContent', ['ui.calendar', 'ui.bootstrap', 'AxelSoft']);\r\n\r\nusrContent.factory('Schd', function ($resource) {\r\n    return $resource('/user/views_scheds', {}, {\r\n        query : { method: 'GET', isArray: true }\r\n    });\r\n});\r\nusrContent.factory('Actvty', function ($resource) {\r\n    return $resource('/user/views_activity_type', {}, {\r\n        query : { method: 'GET', isArray: true }\r\n    });\r\n});\r\nusrContent.controller('ctrlCalendar', ['$scope', '$rootScope', '$timeout', '$http', '$compile', '$filter',\r\n    'uibDateParser', 'uiCalendarConfig', 'Schd', 'Actvty',\r\n    function($scope, $rootScope, $timeout, $http, $compile, $filter,\r\n        uibDateParser, uiCalendarConfig, Schd, Actvty) {\r\n\r\n    $scope.open_calendar = function($event, index, datepicker){\r\n        $scope[datepicker] = {}; $scope[datepicker].open = {};\r\n        $event.preventDefault();\r\n        $event.stopPropagation();\r\n        $scope[datepicker].open[index] = !$scope[datepicker].open[index];\r\n    }\r\n    $scope.MinDate = {\r\n        showWeeks: false,\r\n        minDate: new Date()\r\n    };\r\n    $scope.MaxDateTo = {\r\n        showWeeks: false,\r\n        minDate: new Date()\r\n    };\r\n    $scope.MaxDateCheckout = {\r\n        showWeeks: false,\r\n        minDate: new Date()\r\n    };\r\n    $scope.getMax = function(nwdate, num){\r\n        switch(num){\r\n            case 0:\r\n                $scope.MaxDateCheckout = {\r\n                    showWeeks: false,\r\n                    minDate: nwdate\r\n                }\r\n                break;\r\n            case 1:\r\n                $scope.MaxDateTo = {\r\n                    showWeeks: false,\r\n                    minDate: nwdate\r\n                }\r\n                break;\r\n        }\r\n    }\r\n\r\n    // $scope.MaxDate = {\r\n    //     showWeeks: false,\r\n    //     maxDate: new Date()\r\n    // };\r\n    \r\n    /* event source that contains custom events on the scope */\r\n    $scope.guest_scheds = [\r\n      // {title: 'Long Event',start: new Date(y, m, d - 5),end: new Date(y, m, d - 2)},\r\n    ];\r\n\r\n    $scope.admin_scheds = [\r\n\r\n    ];\r\n\r\n    Schd.query().$promise.then(function(data) {\r\n        // $scope.admin_scheds = data;\r\n\r\n        angular.forEach(data, function(value, key){\r\n            moment.tz.add('Asia/Manila|+08 +09|-80 -90|010101010|-1kJI0 AL0 cK10 65X0 mXB0 vX0 VK10 1db0|24e6');\r\n            // console.log(moment(value.end).add(9, 'hours').tz(\"Asia/Manila\").format());\r\n            $scope.admin_scheds.push({\r\n                genid: value.genid,\r\n                title: value.title,\r\n                color: value.color,\r\n                textColor: value.textColor,\r\n                start: moment(value.start).tz(\"Asia/Manila\").format('YYYY-MM-DD'),\r\n                end: moment(value.end).add(1, 'day').tz(\"Asia/Manila\").format('YYYY-MM-DD'),\r\n                reason: value.reason,\r\n                className: 'admin',\r\n                stick: true\r\n                // currentTimezone: 'Asia/Manila',\r\n                // allDay: true\r\n            });\r\n        });\r\n    });\r\n    // $scope.jpevents = [\r\n    //   {title: 'JP Long Event',start: new Date(y, m, d - 5),end: new Date(y, m, d - 2)},\r\n    // ];\r\n\r\n    $scope.GuestSched = function(schd) {\r\n        var sdate = moment(schd.sdate).startOf('day');\r\n        var edate = moment(schd.edate).startOf('day');\r\n        // console.log(todayDate);\r\n      $scope.guest_scheds.push({\r\n        // title: 'Open Sesame',\r\n        start: sdate.clone().format('YYYY-MM-DD'),\r\n        end: edate.clone().add(1, 'day').format('YYYY-MM-DD'),\r\n        className: ['guest']\r\n        // currentTimezone: 'Asia/Manila' // an option!\r\n      });\r\n      console.log($scope.guest_scheds);\r\n    };\r\n\r\n\r\n    $scope.schd = {};\r\n    var activities = {},\r\n        sked = {};\r\n    $scope.AdminSched = function(sked) {\r\n        if(sked.activity_type){\r\n            activities = $filter('filter')($scope.activities, {id: sked.activity_type})[0];\r\n        }\r\n        var admn_sdate = moment(sked.start).startOf('day'),\r\n            admn_edate = moment(sked.end).startOf('day');\r\n        \r\n        if(activities.color){\r\n            sked.color = activities.color;\r\n        }\r\n\r\n        if(activities.textColor){\r\n            sked.textColor = activities.textColor;\r\n        }\r\n\r\n        $http({\r\n            method: 'POST',\r\n            url: '/user/save_calendar',\r\n            headers: { 'Content-Type': undefined },\r\n            transformRequest: function (data) {\r\n                var fd = new FormData();\r\n                fd.append('sched', angular.toJson(data.sched));\r\n                return fd;\r\n            },\r\n            data: {sched: sked}\r\n        }).then(function(result){\r\n            $scope.msg = result.data;\r\n            console.log(result.data);\r\n\r\n            $scope.admin_scheds.push({\r\n                genid: 32132,\r\n                title: sked.title,\r\n                color: activities.color,\r\n                textColor: activities.textColor,\r\n                start: admn_sdate.clone().format('YYYY-MM-DD'),\r\n                end: admn_edate.clone().add(1, 'day').format('YYYY-MM-DD'),\r\n                className: 'admin',\r\n                reason: sked.reason\r\n                // currentTimezone: 'Asia/Manila' // an option!\r\n            });\r\n            $scope.schd = {};\r\n            // console.log($scope.admin_scheds);\r\n        });\r\n    };\r\n    $scope.closePopup = function(){\r\n        angular.element('.slctd_data').fadeOut('fast');\r\n        console.log('test');\r\n    }\r\n    $scope.alertOnEventClick = function( date, jsEvent, view){\r\n        $scope.slctd = $filter('filter')($scope.admin_scheds, {genid: date.genid})[0];\r\n        // var iclone = angular.copy(angular.element('.slctd_data').clone());\r\n        angular.element('.slctd_data').fadeOut('fast').remove();\r\n        var tpl = $compile('<div class=\"slctd_data\"><div class=\"popover bs-popover-top\"><div class=\"arrow\"></div><div class=\"popover-body\"><button ng-click=\"closePopup()\" type=\"button\"><i class=\"fa fa-close\"></i></button><div class=\"ttl\"><h3>'+$scope.slctd.title+'</h3><div class=\"btmbrdr\"><hr></div></div><p>'+$scope.slctd.reason+'</p></div></div></div>')($scope);\r\n        $timeout(function(){\r\n            angular.element(tpl).prependTo($(jsEvent.target).closest('.fc-event-container').css('position', 'relative')).hide().delay(100).fadeIn();\r\n        }, 20);\r\n        // console.log($scope.islct);\r\n    };\r\n\r\n    $scope.uiConfig = {\r\n      calendar:{\r\n        height: 550,\r\n        editable: true,\r\n        header:{\r\n          left: 'prev,next today',\r\n          center: 'title',\r\n          right: 'month,agendaWeek,agendaDay,listWeek'\r\n        },\r\n        navLinks: true, // can click day/week names to navigate views\r\n        // selectable: true,\r\n        // selectHelper: true,\r\n        // select: function(start, end) {\r\n        //     var title = prompt('Event Title:');\r\n        //     var eventData;\r\n        //     if (title) {\r\n        //       // eventData = {\r\n        //       //   title: title,\r\n        //       //   start: start,\r\n        //       //   end: end\r\n        //       // };\r\n        //       $scope.admin_scheds.push({\r\n        //         title: title,\r\n        //         start: start.clone().format('YYYY-MM-DD'),\r\n        //         end: end.clone().format('YYYY-MM-DD'),\r\n        //         className: ['admin'],\r\n        //         currentTimezone: 'Asia/Manila' // an option!\r\n        //       });\r\n        //       $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true\r\n        //     }\r\n        //     $('#calendar').fullCalendar('unselect');\r\n        // }\r\n        eventClick: $scope.alertOnEventClick,\r\n        eventDrop: function(event, delta, revertFunc, jsEvent, ui, view){\r\n            // console.log(event.genid);\r\n            // console.log(event.start.format());\r\n            var edate = moment(event.end.format()).startOf('day');\r\n           $http({\r\n                method: 'POST',\r\n                url: '/user/drop_resize_sched',\r\n                headers: { 'Content-Type': undefined },\r\n                transformRequest: function (data) {\r\n                    var fd = new FormData();\r\n                    fd.append('evnt', angular.toJson(data));\r\n                    return fd;\r\n                },\r\n                data: {genid: event.genid, start: event.start.format(), end: edate.subtract(1, 'day')}\r\n            }).then(function(result){\r\n                $scope.msg = result.data;\r\n                console.log(result.data);\r\n            });\r\n        },\r\n        eventResizeStart: function( event, jsEvent, ui, view ) {\r\n            angular.element('.slctd_data').hide();\r\n            angular.element('.fc-event-container').css('position', 'inherit')\r\n        },\r\n        eventResize: function(event, delta, revertFunc, jsEvent, ui, view ){\r\n            var edate = moment(event.end.format()).startOf('day');\r\n           $http({\r\n                method: 'POST',\r\n                url: '/user/drop_resize_sched',\r\n                headers: { 'Content-Type': undefined },\r\n                transformRequest: function (data) {\r\n                    var fd = new FormData();\r\n                    fd.append('evnt', angular.toJson(data));\r\n                    return fd;\r\n                },\r\n                data: {genid: event.genid, start: event.start.format(), end: edate.subtract(1, 'day')}\r\n            }).then(function(result){\r\n                $scope.msg = result.data;\r\n                console.log(result.data);\r\n            });\r\n        }\r\n        // ignoreTimezone: true\r\n      }\r\n    };\r\n    /* event sources array*/\r\n    // $scope.eventSources = [$scope.jpevents, $scope.events];\r\n    $scope.eventSources = [$scope.guest_scheds, $scope.admin_scheds];\r\n\r\n    Actvty.query().$promise.then(function(data) {\r\n       $scope.activities = data; \r\n    });\r\n    // $scope.activities = [\r\n    //     {id: 1, name: 'Reserved', textColor: '#FFF', color: '#17b13c'},\r\n    //     {id: 2, name: 'Out of Service', textColor: '#FFF', color: '#a6a6a6'},\r\n    // ]\r\n    $scope.addActivityType = function(typ){\r\n        $http({\r\n            method: 'POST',\r\n            url: '/user/save_activity_type',\r\n            headers: { 'Content-Type': undefined },\r\n            transformRequest: function (data) {\r\n                var fd = new FormData();\r\n                fd.append('actvty', angular.toJson(data.actvty));\r\n                return fd;\r\n            },\r\n            data: {actvty: typ}\r\n        }).then(function(result){\r\n            $scope.msg = result.data;\r\n            // $scope.activities.push({\r\n            //     name: typ.name,\r\n            //     textColor: typ.txtcolor,\r\n            //     color: typ.bgcolor,\r\n            //     description: typ.description\r\n            // });\r\n            $scope.activities = Actvty.query();\r\n            $scope.typ = {};\r\n            console.log(result.data);\r\n        });\r\n    }\r\n    $scope.typ = {};\r\n}]);\r\nusrContent.directive('colorPicker', ['$parse', '$http', '$timeout',\r\n    function($parse, $http, $timeout){\r\n    return {\r\n        restrict: 'A',\r\n        link: function(scope, elm, attrs, ngModel){\r\n            elm.ColorPicker({\r\n                onSubmit: function(hsb, hex, rgb, el) {\r\n                    $parse(attrs.ngModel).assign(scope, '#'+hex);\r\n                    elm.next('.clrbgnpt').css('background-color', '#'+hex);\r\n                    $(el).val('#'+hex);\r\n                    $(el).ColorPickerHide();\r\n                }\r\n            });\r\n        }\r\n    }\r\n}]);//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC91c2VyL3Vzcl9jYWxlbmRhci5qcz84ZTRiIl0sInNvdXJjZXNDb250ZW50IjpbIid1c2Ugc3RyaWN0JzsgXHJcbnZhciB1c3JDb250ZW50ID0gYW5ndWxhci5tb2R1bGUoJ3VzckNvbnRlbnQnLCBbJ3VpLmNhbGVuZGFyJywgJ3VpLmJvb3RzdHJhcCcsICdBeGVsU29mdCddKTtcclxuXHJcbnVzckNvbnRlbnQuZmFjdG9yeSgnU2NoZCcsIGZ1bmN0aW9uICgkcmVzb3VyY2UpIHtcclxuICAgIHJldHVybiAkcmVzb3VyY2UoJy91c2VyL3ZpZXdzX3NjaGVkcycsIHt9LCB7XHJcbiAgICAgICAgcXVlcnkgOiB7IG1ldGhvZDogJ0dFVCcsIGlzQXJyYXk6IHRydWUgfVxyXG4gICAgfSk7XHJcbn0pO1xyXG51c3JDb250ZW50LmZhY3RvcnkoJ0FjdHZ0eScsIGZ1bmN0aW9uICgkcmVzb3VyY2UpIHtcclxuICAgIHJldHVybiAkcmVzb3VyY2UoJy91c2VyL3ZpZXdzX2FjdGl2aXR5X3R5cGUnLCB7fSwge1xyXG4gICAgICAgIHF1ZXJ5IDogeyBtZXRob2Q6ICdHRVQnLCBpc0FycmF5OiB0cnVlIH1cclxuICAgIH0pO1xyXG59KTtcclxudXNyQ29udGVudC5jb250cm9sbGVyKCdjdHJsQ2FsZW5kYXInLCBbJyRzY29wZScsICckcm9vdFNjb3BlJywgJyR0aW1lb3V0JywgJyRodHRwJywgJyRjb21waWxlJywgJyRmaWx0ZXInLFxyXG4gICAgJ3VpYkRhdGVQYXJzZXInLCAndWlDYWxlbmRhckNvbmZpZycsICdTY2hkJywgJ0FjdHZ0eScsXHJcbiAgICBmdW5jdGlvbigkc2NvcGUsICRyb290U2NvcGUsICR0aW1lb3V0LCAkaHR0cCwgJGNvbXBpbGUsICRmaWx0ZXIsXHJcbiAgICAgICAgdWliRGF0ZVBhcnNlciwgdWlDYWxlbmRhckNvbmZpZywgU2NoZCwgQWN0dnR5KSB7XHJcblxyXG4gICAgJHNjb3BlLm9wZW5fY2FsZW5kYXIgPSBmdW5jdGlvbigkZXZlbnQsIGluZGV4LCBkYXRlcGlja2VyKXtcclxuICAgICAgICAkc2NvcGVbZGF0ZXBpY2tlcl0gPSB7fTsgJHNjb3BlW2RhdGVwaWNrZXJdLm9wZW4gPSB7fTtcclxuICAgICAgICAkZXZlbnQucHJldmVudERlZmF1bHQoKTtcclxuICAgICAgICAkZXZlbnQuc3RvcFByb3BhZ2F0aW9uKCk7XHJcbiAgICAgICAgJHNjb3BlW2RhdGVwaWNrZXJdLm9wZW5baW5kZXhdID0gISRzY29wZVtkYXRlcGlja2VyXS5vcGVuW2luZGV4XTtcclxuICAgIH1cclxuICAgICRzY29wZS5NaW5EYXRlID0ge1xyXG4gICAgICAgIHNob3dXZWVrczogZmFsc2UsXHJcbiAgICAgICAgbWluRGF0ZTogbmV3IERhdGUoKVxyXG4gICAgfTtcclxuICAgICRzY29wZS5NYXhEYXRlVG8gPSB7XHJcbiAgICAgICAgc2hvd1dlZWtzOiBmYWxzZSxcclxuICAgICAgICBtaW5EYXRlOiBuZXcgRGF0ZSgpXHJcbiAgICB9O1xyXG4gICAgJHNjb3BlLk1heERhdGVDaGVja291dCA9IHtcclxuICAgICAgICBzaG93V2Vla3M6IGZhbHNlLFxyXG4gICAgICAgIG1pbkRhdGU6IG5ldyBEYXRlKClcclxuICAgIH07XHJcbiAgICAkc2NvcGUuZ2V0TWF4ID0gZnVuY3Rpb24obndkYXRlLCBudW0pe1xyXG4gICAgICAgIHN3aXRjaChudW0pe1xyXG4gICAgICAgICAgICBjYXNlIDA6XHJcbiAgICAgICAgICAgICAgICAkc2NvcGUuTWF4RGF0ZUNoZWNrb3V0ID0ge1xyXG4gICAgICAgICAgICAgICAgICAgIHNob3dXZWVrczogZmFsc2UsXHJcbiAgICAgICAgICAgICAgICAgICAgbWluRGF0ZTogbndkYXRlXHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICBicmVhaztcclxuICAgICAgICAgICAgY2FzZSAxOlxyXG4gICAgICAgICAgICAgICAgJHNjb3BlLk1heERhdGVUbyA9IHtcclxuICAgICAgICAgICAgICAgICAgICBzaG93V2Vla3M6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgICAgIG1pbkRhdGU6IG53ZGF0ZVxyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgYnJlYWs7XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG5cclxuICAgIC8vICRzY29wZS5NYXhEYXRlID0ge1xyXG4gICAgLy8gICAgIHNob3dXZWVrczogZmFsc2UsXHJcbiAgICAvLyAgICAgbWF4RGF0ZTogbmV3IERhdGUoKVxyXG4gICAgLy8gfTtcclxuICAgIFxyXG4gICAgLyogZXZlbnQgc291cmNlIHRoYXQgY29udGFpbnMgY3VzdG9tIGV2ZW50cyBvbiB0aGUgc2NvcGUgKi9cclxuICAgICRzY29wZS5ndWVzdF9zY2hlZHMgPSBbXHJcbiAgICAgIC8vIHt0aXRsZTogJ0xvbmcgRXZlbnQnLHN0YXJ0OiBuZXcgRGF0ZSh5LCBtLCBkIC0gNSksZW5kOiBuZXcgRGF0ZSh5LCBtLCBkIC0gMil9LFxyXG4gICAgXTtcclxuXHJcbiAgICAkc2NvcGUuYWRtaW5fc2NoZWRzID0gW1xyXG5cclxuICAgIF07XHJcblxyXG4gICAgU2NoZC5xdWVyeSgpLiRwcm9taXNlLnRoZW4oZnVuY3Rpb24oZGF0YSkge1xyXG4gICAgICAgIC8vICRzY29wZS5hZG1pbl9zY2hlZHMgPSBkYXRhO1xyXG5cclxuICAgICAgICBhbmd1bGFyLmZvckVhY2goZGF0YSwgZnVuY3Rpb24odmFsdWUsIGtleSl7XHJcbiAgICAgICAgICAgIG1vbWVudC50ei5hZGQoJ0FzaWEvTWFuaWxhfCswOCArMDl8LTgwIC05MHwwMTAxMDEwMTB8LTFrSkkwIEFMMCBjSzEwIDY1WDAgbVhCMCB2WDAgVksxMCAxZGIwfDI0ZTYnKTtcclxuICAgICAgICAgICAgLy8gY29uc29sZS5sb2cobW9tZW50KHZhbHVlLmVuZCkuYWRkKDksICdob3VycycpLnR6KFwiQXNpYS9NYW5pbGFcIikuZm9ybWF0KCkpO1xyXG4gICAgICAgICAgICAkc2NvcGUuYWRtaW5fc2NoZWRzLnB1c2goe1xyXG4gICAgICAgICAgICAgICAgZ2VuaWQ6IHZhbHVlLmdlbmlkLFxyXG4gICAgICAgICAgICAgICAgdGl0bGU6IHZhbHVlLnRpdGxlLFxyXG4gICAgICAgICAgICAgICAgY29sb3I6IHZhbHVlLmNvbG9yLFxyXG4gICAgICAgICAgICAgICAgdGV4dENvbG9yOiB2YWx1ZS50ZXh0Q29sb3IsXHJcbiAgICAgICAgICAgICAgICBzdGFydDogbW9tZW50KHZhbHVlLnN0YXJ0KS50eihcIkFzaWEvTWFuaWxhXCIpLmZvcm1hdCgnWVlZWS1NTS1ERCcpLFxyXG4gICAgICAgICAgICAgICAgZW5kOiBtb21lbnQodmFsdWUuZW5kKS5hZGQoMSwgJ2RheScpLnR6KFwiQXNpYS9NYW5pbGFcIikuZm9ybWF0KCdZWVlZLU1NLUREJyksXHJcbiAgICAgICAgICAgICAgICByZWFzb246IHZhbHVlLnJlYXNvbixcclxuICAgICAgICAgICAgICAgIGNsYXNzTmFtZTogJ2FkbWluJyxcclxuICAgICAgICAgICAgICAgIHN0aWNrOiB0cnVlXHJcbiAgICAgICAgICAgICAgICAvLyBjdXJyZW50VGltZXpvbmU6ICdBc2lhL01hbmlsYScsXHJcbiAgICAgICAgICAgICAgICAvLyBhbGxEYXk6IHRydWVcclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgfSk7XHJcbiAgICB9KTtcclxuICAgIC8vICRzY29wZS5qcGV2ZW50cyA9IFtcclxuICAgIC8vICAge3RpdGxlOiAnSlAgTG9uZyBFdmVudCcsc3RhcnQ6IG5ldyBEYXRlKHksIG0sIGQgLSA1KSxlbmQ6IG5ldyBEYXRlKHksIG0sIGQgLSAyKX0sXHJcbiAgICAvLyBdO1xyXG5cclxuICAgICRzY29wZS5HdWVzdFNjaGVkID0gZnVuY3Rpb24oc2NoZCkge1xyXG4gICAgICAgIHZhciBzZGF0ZSA9IG1vbWVudChzY2hkLnNkYXRlKS5zdGFydE9mKCdkYXknKTtcclxuICAgICAgICB2YXIgZWRhdGUgPSBtb21lbnQoc2NoZC5lZGF0ZSkuc3RhcnRPZignZGF5Jyk7XHJcbiAgICAgICAgLy8gY29uc29sZS5sb2codG9kYXlEYXRlKTtcclxuICAgICAgJHNjb3BlLmd1ZXN0X3NjaGVkcy5wdXNoKHtcclxuICAgICAgICAvLyB0aXRsZTogJ09wZW4gU2VzYW1lJyxcclxuICAgICAgICBzdGFydDogc2RhdGUuY2xvbmUoKS5mb3JtYXQoJ1lZWVktTU0tREQnKSxcclxuICAgICAgICBlbmQ6IGVkYXRlLmNsb25lKCkuYWRkKDEsICdkYXknKS5mb3JtYXQoJ1lZWVktTU0tREQnKSxcclxuICAgICAgICBjbGFzc05hbWU6IFsnZ3Vlc3QnXVxyXG4gICAgICAgIC8vIGN1cnJlbnRUaW1lem9uZTogJ0FzaWEvTWFuaWxhJyAvLyBhbiBvcHRpb24hXHJcbiAgICAgIH0pO1xyXG4gICAgICBjb25zb2xlLmxvZygkc2NvcGUuZ3Vlc3Rfc2NoZWRzKTtcclxuICAgIH07XHJcblxyXG5cclxuICAgICRzY29wZS5zY2hkID0ge307XHJcbiAgICB2YXIgYWN0aXZpdGllcyA9IHt9LFxyXG4gICAgICAgIHNrZWQgPSB7fTtcclxuICAgICRzY29wZS5BZG1pblNjaGVkID0gZnVuY3Rpb24oc2tlZCkge1xyXG4gICAgICAgIGlmKHNrZWQuYWN0aXZpdHlfdHlwZSl7XHJcbiAgICAgICAgICAgIGFjdGl2aXRpZXMgPSAkZmlsdGVyKCdmaWx0ZXInKSgkc2NvcGUuYWN0aXZpdGllcywge2lkOiBza2VkLmFjdGl2aXR5X3R5cGV9KVswXTtcclxuICAgICAgICB9XHJcbiAgICAgICAgdmFyIGFkbW5fc2RhdGUgPSBtb21lbnQoc2tlZC5zdGFydCkuc3RhcnRPZignZGF5JyksXHJcbiAgICAgICAgICAgIGFkbW5fZWRhdGUgPSBtb21lbnQoc2tlZC5lbmQpLnN0YXJ0T2YoJ2RheScpO1xyXG4gICAgICAgIFxyXG4gICAgICAgIGlmKGFjdGl2aXRpZXMuY29sb3Ipe1xyXG4gICAgICAgICAgICBza2VkLmNvbG9yID0gYWN0aXZpdGllcy5jb2xvcjtcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIGlmKGFjdGl2aXRpZXMudGV4dENvbG9yKXtcclxuICAgICAgICAgICAgc2tlZC50ZXh0Q29sb3IgPSBhY3Rpdml0aWVzLnRleHRDb2xvcjtcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgICRodHRwKHtcclxuICAgICAgICAgICAgbWV0aG9kOiAnUE9TVCcsXHJcbiAgICAgICAgICAgIHVybDogJy91c2VyL3NhdmVfY2FsZW5kYXInLFxyXG4gICAgICAgICAgICBoZWFkZXJzOiB7ICdDb250ZW50LVR5cGUnOiB1bmRlZmluZWQgfSxcclxuICAgICAgICAgICAgdHJhbnNmb3JtUmVxdWVzdDogZnVuY3Rpb24gKGRhdGEpIHtcclxuICAgICAgICAgICAgICAgIHZhciBmZCA9IG5ldyBGb3JtRGF0YSgpO1xyXG4gICAgICAgICAgICAgICAgZmQuYXBwZW5kKCdzY2hlZCcsIGFuZ3VsYXIudG9Kc29uKGRhdGEuc2NoZWQpKTtcclxuICAgICAgICAgICAgICAgIHJldHVybiBmZDtcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgZGF0YToge3NjaGVkOiBza2VkfVxyXG4gICAgICAgIH0pLnRoZW4oZnVuY3Rpb24ocmVzdWx0KXtcclxuICAgICAgICAgICAgJHNjb3BlLm1zZyA9IHJlc3VsdC5kYXRhO1xyXG4gICAgICAgICAgICBjb25zb2xlLmxvZyhyZXN1bHQuZGF0YSk7XHJcblxyXG4gICAgICAgICAgICAkc2NvcGUuYWRtaW5fc2NoZWRzLnB1c2goe1xyXG4gICAgICAgICAgICAgICAgZ2VuaWQ6IDMyMTMyLFxyXG4gICAgICAgICAgICAgICAgdGl0bGU6IHNrZWQudGl0bGUsXHJcbiAgICAgICAgICAgICAgICBjb2xvcjogYWN0aXZpdGllcy5jb2xvcixcclxuICAgICAgICAgICAgICAgIHRleHRDb2xvcjogYWN0aXZpdGllcy50ZXh0Q29sb3IsXHJcbiAgICAgICAgICAgICAgICBzdGFydDogYWRtbl9zZGF0ZS5jbG9uZSgpLmZvcm1hdCgnWVlZWS1NTS1ERCcpLFxyXG4gICAgICAgICAgICAgICAgZW5kOiBhZG1uX2VkYXRlLmNsb25lKCkuYWRkKDEsICdkYXknKS5mb3JtYXQoJ1lZWVktTU0tREQnKSxcclxuICAgICAgICAgICAgICAgIGNsYXNzTmFtZTogJ2FkbWluJyxcclxuICAgICAgICAgICAgICAgIHJlYXNvbjogc2tlZC5yZWFzb25cclxuICAgICAgICAgICAgICAgIC8vIGN1cnJlbnRUaW1lem9uZTogJ0FzaWEvTWFuaWxhJyAvLyBhbiBvcHRpb24hXHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAkc2NvcGUuc2NoZCA9IHt9O1xyXG4gICAgICAgICAgICAvLyBjb25zb2xlLmxvZygkc2NvcGUuYWRtaW5fc2NoZWRzKTtcclxuICAgICAgICB9KTtcclxuICAgIH07XHJcbiAgICAkc2NvcGUuY2xvc2VQb3B1cCA9IGZ1bmN0aW9uKCl7XHJcbiAgICAgICAgYW5ndWxhci5lbGVtZW50KCcuc2xjdGRfZGF0YScpLmZhZGVPdXQoJ2Zhc3QnKTtcclxuICAgICAgICBjb25zb2xlLmxvZygndGVzdCcpO1xyXG4gICAgfVxyXG4gICAgJHNjb3BlLmFsZXJ0T25FdmVudENsaWNrID0gZnVuY3Rpb24oIGRhdGUsIGpzRXZlbnQsIHZpZXcpe1xyXG4gICAgICAgICRzY29wZS5zbGN0ZCA9ICRmaWx0ZXIoJ2ZpbHRlcicpKCRzY29wZS5hZG1pbl9zY2hlZHMsIHtnZW5pZDogZGF0ZS5nZW5pZH0pWzBdO1xyXG4gICAgICAgIC8vIHZhciBpY2xvbmUgPSBhbmd1bGFyLmNvcHkoYW5ndWxhci5lbGVtZW50KCcuc2xjdGRfZGF0YScpLmNsb25lKCkpO1xyXG4gICAgICAgIGFuZ3VsYXIuZWxlbWVudCgnLnNsY3RkX2RhdGEnKS5mYWRlT3V0KCdmYXN0JykucmVtb3ZlKCk7XHJcbiAgICAgICAgdmFyIHRwbCA9ICRjb21waWxlKCc8ZGl2IGNsYXNzPVwic2xjdGRfZGF0YVwiPjxkaXYgY2xhc3M9XCJwb3BvdmVyIGJzLXBvcG92ZXItdG9wXCI+PGRpdiBjbGFzcz1cImFycm93XCI+PC9kaXY+PGRpdiBjbGFzcz1cInBvcG92ZXItYm9keVwiPjxidXR0b24gbmctY2xpY2s9XCJjbG9zZVBvcHVwKClcIiB0eXBlPVwiYnV0dG9uXCI+PGkgY2xhc3M9XCJmYSBmYS1jbG9zZVwiPjwvaT48L2J1dHRvbj48ZGl2IGNsYXNzPVwidHRsXCI+PGgzPicrJHNjb3BlLnNsY3RkLnRpdGxlKyc8L2gzPjxkaXYgY2xhc3M9XCJidG1icmRyXCI+PGhyPjwvZGl2PjwvZGl2PjxwPicrJHNjb3BlLnNsY3RkLnJlYXNvbisnPC9wPjwvZGl2PjwvZGl2PjwvZGl2PicpKCRzY29wZSk7XHJcbiAgICAgICAgJHRpbWVvdXQoZnVuY3Rpb24oKXtcclxuICAgICAgICAgICAgYW5ndWxhci5lbGVtZW50KHRwbCkucHJlcGVuZFRvKCQoanNFdmVudC50YXJnZXQpLmNsb3Nlc3QoJy5mYy1ldmVudC1jb250YWluZXInKS5jc3MoJ3Bvc2l0aW9uJywgJ3JlbGF0aXZlJykpLmhpZGUoKS5kZWxheSgxMDApLmZhZGVJbigpO1xyXG4gICAgICAgIH0sIDIwKTtcclxuICAgICAgICAvLyBjb25zb2xlLmxvZygkc2NvcGUuaXNsY3QpO1xyXG4gICAgfTtcclxuXHJcbiAgICAkc2NvcGUudWlDb25maWcgPSB7XHJcbiAgICAgIGNhbGVuZGFyOntcclxuICAgICAgICBoZWlnaHQ6IDU1MCxcclxuICAgICAgICBlZGl0YWJsZTogdHJ1ZSxcclxuICAgICAgICBoZWFkZXI6e1xyXG4gICAgICAgICAgbGVmdDogJ3ByZXYsbmV4dCB0b2RheScsXHJcbiAgICAgICAgICBjZW50ZXI6ICd0aXRsZScsXHJcbiAgICAgICAgICByaWdodDogJ21vbnRoLGFnZW5kYVdlZWssYWdlbmRhRGF5LGxpc3RXZWVrJ1xyXG4gICAgICAgIH0sXHJcbiAgICAgICAgbmF2TGlua3M6IHRydWUsIC8vIGNhbiBjbGljayBkYXkvd2VlayBuYW1lcyB0byBuYXZpZ2F0ZSB2aWV3c1xyXG4gICAgICAgIC8vIHNlbGVjdGFibGU6IHRydWUsXHJcbiAgICAgICAgLy8gc2VsZWN0SGVscGVyOiB0cnVlLFxyXG4gICAgICAgIC8vIHNlbGVjdDogZnVuY3Rpb24oc3RhcnQsIGVuZCkge1xyXG4gICAgICAgIC8vICAgICB2YXIgdGl0bGUgPSBwcm9tcHQoJ0V2ZW50IFRpdGxlOicpO1xyXG4gICAgICAgIC8vICAgICB2YXIgZXZlbnREYXRhO1xyXG4gICAgICAgIC8vICAgICBpZiAodGl0bGUpIHtcclxuICAgICAgICAvLyAgICAgICAvLyBldmVudERhdGEgPSB7XHJcbiAgICAgICAgLy8gICAgICAgLy8gICB0aXRsZTogdGl0bGUsXHJcbiAgICAgICAgLy8gICAgICAgLy8gICBzdGFydDogc3RhcnQsXHJcbiAgICAgICAgLy8gICAgICAgLy8gICBlbmQ6IGVuZFxyXG4gICAgICAgIC8vICAgICAgIC8vIH07XHJcbiAgICAgICAgLy8gICAgICAgJHNjb3BlLmFkbWluX3NjaGVkcy5wdXNoKHtcclxuICAgICAgICAvLyAgICAgICAgIHRpdGxlOiB0aXRsZSxcclxuICAgICAgICAvLyAgICAgICAgIHN0YXJ0OiBzdGFydC5jbG9uZSgpLmZvcm1hdCgnWVlZWS1NTS1ERCcpLFxyXG4gICAgICAgIC8vICAgICAgICAgZW5kOiBlbmQuY2xvbmUoKS5mb3JtYXQoJ1lZWVktTU0tREQnKSxcclxuICAgICAgICAvLyAgICAgICAgIGNsYXNzTmFtZTogWydhZG1pbiddLFxyXG4gICAgICAgIC8vICAgICAgICAgY3VycmVudFRpbWV6b25lOiAnQXNpYS9NYW5pbGEnIC8vIGFuIG9wdGlvbiFcclxuICAgICAgICAvLyAgICAgICB9KTtcclxuICAgICAgICAvLyAgICAgICAkKCcjY2FsZW5kYXInKS5mdWxsQ2FsZW5kYXIoJ3JlbmRlckV2ZW50JywgZXZlbnREYXRhLCB0cnVlKTsgLy8gc3RpY2s/ID0gdHJ1ZVxyXG4gICAgICAgIC8vICAgICB9XHJcbiAgICAgICAgLy8gICAgICQoJyNjYWxlbmRhcicpLmZ1bGxDYWxlbmRhcigndW5zZWxlY3QnKTtcclxuICAgICAgICAvLyB9XHJcbiAgICAgICAgZXZlbnRDbGljazogJHNjb3BlLmFsZXJ0T25FdmVudENsaWNrLFxyXG4gICAgICAgIGV2ZW50RHJvcDogZnVuY3Rpb24oZXZlbnQsIGRlbHRhLCByZXZlcnRGdW5jLCBqc0V2ZW50LCB1aSwgdmlldyl7XHJcbiAgICAgICAgICAgIC8vIGNvbnNvbGUubG9nKGV2ZW50LmdlbmlkKTtcclxuICAgICAgICAgICAgLy8gY29uc29sZS5sb2coZXZlbnQuc3RhcnQuZm9ybWF0KCkpO1xyXG4gICAgICAgICAgICB2YXIgZWRhdGUgPSBtb21lbnQoZXZlbnQuZW5kLmZvcm1hdCgpKS5zdGFydE9mKCdkYXknKTtcclxuICAgICAgICAgICAkaHR0cCh7XHJcbiAgICAgICAgICAgICAgICBtZXRob2Q6ICdQT1NUJyxcclxuICAgICAgICAgICAgICAgIHVybDogJy91c2VyL2Ryb3BfcmVzaXplX3NjaGVkJyxcclxuICAgICAgICAgICAgICAgIGhlYWRlcnM6IHsgJ0NvbnRlbnQtVHlwZSc6IHVuZGVmaW5lZCB9LFxyXG4gICAgICAgICAgICAgICAgdHJhbnNmb3JtUmVxdWVzdDogZnVuY3Rpb24gKGRhdGEpIHtcclxuICAgICAgICAgICAgICAgICAgICB2YXIgZmQgPSBuZXcgRm9ybURhdGEoKTtcclxuICAgICAgICAgICAgICAgICAgICBmZC5hcHBlbmQoJ2V2bnQnLCBhbmd1bGFyLnRvSnNvbihkYXRhKSk7XHJcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuIGZkO1xyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgIGRhdGE6IHtnZW5pZDogZXZlbnQuZ2VuaWQsIHN0YXJ0OiBldmVudC5zdGFydC5mb3JtYXQoKSwgZW5kOiBlZGF0ZS5zdWJ0cmFjdCgxLCAnZGF5Jyl9XHJcbiAgICAgICAgICAgIH0pLnRoZW4oZnVuY3Rpb24ocmVzdWx0KXtcclxuICAgICAgICAgICAgICAgICRzY29wZS5tc2cgPSByZXN1bHQuZGF0YTtcclxuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKHJlc3VsdC5kYXRhKTtcclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgfSxcclxuICAgICAgICBldmVudFJlc2l6ZVN0YXJ0OiBmdW5jdGlvbiggZXZlbnQsIGpzRXZlbnQsIHVpLCB2aWV3ICkge1xyXG4gICAgICAgICAgICBhbmd1bGFyLmVsZW1lbnQoJy5zbGN0ZF9kYXRhJykuaGlkZSgpO1xyXG4gICAgICAgICAgICBhbmd1bGFyLmVsZW1lbnQoJy5mYy1ldmVudC1jb250YWluZXInKS5jc3MoJ3Bvc2l0aW9uJywgJ2luaGVyaXQnKVxyXG4gICAgICAgIH0sXHJcbiAgICAgICAgZXZlbnRSZXNpemU6IGZ1bmN0aW9uKGV2ZW50LCBkZWx0YSwgcmV2ZXJ0RnVuYywganNFdmVudCwgdWksIHZpZXcgKXtcclxuICAgICAgICAgICAgdmFyIGVkYXRlID0gbW9tZW50KGV2ZW50LmVuZC5mb3JtYXQoKSkuc3RhcnRPZignZGF5Jyk7XHJcbiAgICAgICAgICAgJGh0dHAoe1xyXG4gICAgICAgICAgICAgICAgbWV0aG9kOiAnUE9TVCcsXHJcbiAgICAgICAgICAgICAgICB1cmw6ICcvdXNlci9kcm9wX3Jlc2l6ZV9zY2hlZCcsXHJcbiAgICAgICAgICAgICAgICBoZWFkZXJzOiB7ICdDb250ZW50LVR5cGUnOiB1bmRlZmluZWQgfSxcclxuICAgICAgICAgICAgICAgIHRyYW5zZm9ybVJlcXVlc3Q6IGZ1bmN0aW9uIChkYXRhKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgdmFyIGZkID0gbmV3IEZvcm1EYXRhKCk7XHJcbiAgICAgICAgICAgICAgICAgICAgZmQuYXBwZW5kKCdldm50JywgYW5ndWxhci50b0pzb24oZGF0YSkpO1xyXG4gICAgICAgICAgICAgICAgICAgIHJldHVybiBmZDtcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICBkYXRhOiB7Z2VuaWQ6IGV2ZW50LmdlbmlkLCBzdGFydDogZXZlbnQuc3RhcnQuZm9ybWF0KCksIGVuZDogZWRhdGUuc3VidHJhY3QoMSwgJ2RheScpfVxyXG4gICAgICAgICAgICB9KS50aGVuKGZ1bmN0aW9uKHJlc3VsdCl7XHJcbiAgICAgICAgICAgICAgICAkc2NvcGUubXNnID0gcmVzdWx0LmRhdGE7XHJcbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhyZXN1bHQuZGF0YSk7XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgIH1cclxuICAgICAgICAvLyBpZ25vcmVUaW1lem9uZTogdHJ1ZVxyXG4gICAgICB9XHJcbiAgICB9O1xyXG4gICAgLyogZXZlbnQgc291cmNlcyBhcnJheSovXHJcbiAgICAvLyAkc2NvcGUuZXZlbnRTb3VyY2VzID0gWyRzY29wZS5qcGV2ZW50cywgJHNjb3BlLmV2ZW50c107XHJcbiAgICAkc2NvcGUuZXZlbnRTb3VyY2VzID0gWyRzY29wZS5ndWVzdF9zY2hlZHMsICRzY29wZS5hZG1pbl9zY2hlZHNdO1xyXG5cclxuICAgIEFjdHZ0eS5xdWVyeSgpLiRwcm9taXNlLnRoZW4oZnVuY3Rpb24oZGF0YSkge1xyXG4gICAgICAgJHNjb3BlLmFjdGl2aXRpZXMgPSBkYXRhOyBcclxuICAgIH0pO1xyXG4gICAgLy8gJHNjb3BlLmFjdGl2aXRpZXMgPSBbXHJcbiAgICAvLyAgICAge2lkOiAxLCBuYW1lOiAnUmVzZXJ2ZWQnLCB0ZXh0Q29sb3I6ICcjRkZGJywgY29sb3I6ICcjMTdiMTNjJ30sXHJcbiAgICAvLyAgICAge2lkOiAyLCBuYW1lOiAnT3V0IG9mIFNlcnZpY2UnLCB0ZXh0Q29sb3I6ICcjRkZGJywgY29sb3I6ICcjYTZhNmE2J30sXHJcbiAgICAvLyBdXHJcbiAgICAkc2NvcGUuYWRkQWN0aXZpdHlUeXBlID0gZnVuY3Rpb24odHlwKXtcclxuICAgICAgICAkaHR0cCh7XHJcbiAgICAgICAgICAgIG1ldGhvZDogJ1BPU1QnLFxyXG4gICAgICAgICAgICB1cmw6ICcvdXNlci9zYXZlX2FjdGl2aXR5X3R5cGUnLFxyXG4gICAgICAgICAgICBoZWFkZXJzOiB7ICdDb250ZW50LVR5cGUnOiB1bmRlZmluZWQgfSxcclxuICAgICAgICAgICAgdHJhbnNmb3JtUmVxdWVzdDogZnVuY3Rpb24gKGRhdGEpIHtcclxuICAgICAgICAgICAgICAgIHZhciBmZCA9IG5ldyBGb3JtRGF0YSgpO1xyXG4gICAgICAgICAgICAgICAgZmQuYXBwZW5kKCdhY3R2dHknLCBhbmd1bGFyLnRvSnNvbihkYXRhLmFjdHZ0eSkpO1xyXG4gICAgICAgICAgICAgICAgcmV0dXJuIGZkO1xyXG4gICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICBkYXRhOiB7YWN0dnR5OiB0eXB9XHJcbiAgICAgICAgfSkudGhlbihmdW5jdGlvbihyZXN1bHQpe1xyXG4gICAgICAgICAgICAkc2NvcGUubXNnID0gcmVzdWx0LmRhdGE7XHJcbiAgICAgICAgICAgIC8vICRzY29wZS5hY3Rpdml0aWVzLnB1c2goe1xyXG4gICAgICAgICAgICAvLyAgICAgbmFtZTogdHlwLm5hbWUsXHJcbiAgICAgICAgICAgIC8vICAgICB0ZXh0Q29sb3I6IHR5cC50eHRjb2xvcixcclxuICAgICAgICAgICAgLy8gICAgIGNvbG9yOiB0eXAuYmdjb2xvcixcclxuICAgICAgICAgICAgLy8gICAgIGRlc2NyaXB0aW9uOiB0eXAuZGVzY3JpcHRpb25cclxuICAgICAgICAgICAgLy8gfSk7XHJcbiAgICAgICAgICAgICRzY29wZS5hY3Rpdml0aWVzID0gQWN0dnR5LnF1ZXJ5KCk7XHJcbiAgICAgICAgICAgICRzY29wZS50eXAgPSB7fTtcclxuICAgICAgICAgICAgY29uc29sZS5sb2cocmVzdWx0LmRhdGEpO1xyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG4gICAgJHNjb3BlLnR5cCA9IHt9O1xyXG59XSk7XHJcbnVzckNvbnRlbnQuZGlyZWN0aXZlKCdjb2xvclBpY2tlcicsIFsnJHBhcnNlJywgJyRodHRwJywgJyR0aW1lb3V0JyxcclxuICAgIGZ1bmN0aW9uKCRwYXJzZSwgJGh0dHAsICR0aW1lb3V0KXtcclxuICAgIHJldHVybiB7XHJcbiAgICAgICAgcmVzdHJpY3Q6ICdBJyxcclxuICAgICAgICBsaW5rOiBmdW5jdGlvbihzY29wZSwgZWxtLCBhdHRycywgbmdNb2RlbCl7XHJcbiAgICAgICAgICAgIGVsbS5Db2xvclBpY2tlcih7XHJcbiAgICAgICAgICAgICAgICBvblN1Ym1pdDogZnVuY3Rpb24oaHNiLCBoZXgsIHJnYiwgZWwpIHtcclxuICAgICAgICAgICAgICAgICAgICAkcGFyc2UoYXR0cnMubmdNb2RlbCkuYXNzaWduKHNjb3BlLCAnIycraGV4KTtcclxuICAgICAgICAgICAgICAgICAgICBlbG0ubmV4dCgnLmNscmJnbnB0JykuY3NzKCdiYWNrZ3JvdW5kLWNvbG9yJywgJyMnK2hleCk7XHJcbiAgICAgICAgICAgICAgICAgICAgJChlbCkudmFsKCcjJytoZXgpO1xyXG4gICAgICAgICAgICAgICAgICAgICQoZWwpLkNvbG9yUGlja2VySGlkZSgpO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9XHJcbiAgICB9XHJcbn1dKTtcblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gcmVzb3VyY2VzL2Fzc2V0cy9qcy9hcHAvdXNlci91c3JfY2FsZW5kYXIuanMiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Ozs7Ozs7QUFPQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTtBQUNBOzs7OztBQUtBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7OztBQXVCQTtBQUNBOzs7QUFHQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOzs7QUFHQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7OztBQUtBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7Ozs7O0FBT0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Iiwic291cmNlUm9vdCI6IiJ9");

/***/ }
/******/ ]);