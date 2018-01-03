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
eval("'use strict'; \r\nvar usrContent = angular.module('usrContent', []);\r\n\r\nusrContent.controller('ctrlCalendar', ['$scope', '$rootScope', '$timeout', '$http', 'Usr',\r\n\tfunction($scope, $rootScope, $timeout, $http, Usr) {\r\n\r\n\t$scope.labels = [\"January\", \"February\", \"March\", \"April\", \"May\", \"June\", \"July\"];\r\n\t  $scope.series = ['Series A', 'Series B'];\r\n\t  $scope.data = [\r\n\t    [65, 59, 80, 81, 56, 55, 40],\r\n\t    [28, 48, 40, 19, 86, 27, 90]\r\n\t  ];\r\n\t  $scope.onClick = function (points, evt) {\r\n\t    console.log(points, evt);\r\n\t  };\r\n\t  $scope.datasetOverride = [{ yAxisID: 'y-axis-1' }, { yAxisID: 'y-axis-2' }];\r\n\t  $scope.options = {\r\n\t    scales: {\r\n\t      yAxes: [\r\n\t        {\r\n\t          id: 'y-axis-1',\r\n\t          type: 'linear',\r\n\t          display: true,\r\n\t          position: 'left'\r\n\t        },\r\n\t        {\r\n\t          id: 'y-axis-2',\r\n\t          type: 'linear',\r\n\t          display: true,\r\n\t          position: 'right'\r\n\t        }\r\n\t      ]\r\n\t    }\r\n\t  };\r\n\r\n}]);//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC91c2VyL3Vzcl9jYWxlbmRhci5qcz84ZTRiIl0sInNvdXJjZXNDb250ZW50IjpbIid1c2Ugc3RyaWN0JzsgXHJcbnZhciB1c3JDb250ZW50ID0gYW5ndWxhci5tb2R1bGUoJ3VzckNvbnRlbnQnLCBbXSk7XHJcblxyXG51c3JDb250ZW50LmNvbnRyb2xsZXIoJ2N0cmxDYWxlbmRhcicsIFsnJHNjb3BlJywgJyRyb290U2NvcGUnLCAnJHRpbWVvdXQnLCAnJGh0dHAnLCAnVXNyJyxcclxuXHRmdW5jdGlvbigkc2NvcGUsICRyb290U2NvcGUsICR0aW1lb3V0LCAkaHR0cCwgVXNyKSB7XHJcblxyXG5cdCRzY29wZS5sYWJlbHMgPSBbXCJKYW51YXJ5XCIsIFwiRmVicnVhcnlcIiwgXCJNYXJjaFwiLCBcIkFwcmlsXCIsIFwiTWF5XCIsIFwiSnVuZVwiLCBcIkp1bHlcIl07XHJcblx0ICAkc2NvcGUuc2VyaWVzID0gWydTZXJpZXMgQScsICdTZXJpZXMgQiddO1xyXG5cdCAgJHNjb3BlLmRhdGEgPSBbXHJcblx0ICAgIFs2NSwgNTksIDgwLCA4MSwgNTYsIDU1LCA0MF0sXHJcblx0ICAgIFsyOCwgNDgsIDQwLCAxOSwgODYsIDI3LCA5MF1cclxuXHQgIF07XHJcblx0ICAkc2NvcGUub25DbGljayA9IGZ1bmN0aW9uIChwb2ludHMsIGV2dCkge1xyXG5cdCAgICBjb25zb2xlLmxvZyhwb2ludHMsIGV2dCk7XHJcblx0ICB9O1xyXG5cdCAgJHNjb3BlLmRhdGFzZXRPdmVycmlkZSA9IFt7IHlBeGlzSUQ6ICd5LWF4aXMtMScgfSwgeyB5QXhpc0lEOiAneS1heGlzLTInIH1dO1xyXG5cdCAgJHNjb3BlLm9wdGlvbnMgPSB7XHJcblx0ICAgIHNjYWxlczoge1xyXG5cdCAgICAgIHlBeGVzOiBbXHJcblx0ICAgICAgICB7XHJcblx0ICAgICAgICAgIGlkOiAneS1heGlzLTEnLFxyXG5cdCAgICAgICAgICB0eXBlOiAnbGluZWFyJyxcclxuXHQgICAgICAgICAgZGlzcGxheTogdHJ1ZSxcclxuXHQgICAgICAgICAgcG9zaXRpb246ICdsZWZ0J1xyXG5cdCAgICAgICAgfSxcclxuXHQgICAgICAgIHtcclxuXHQgICAgICAgICAgaWQ6ICd5LWF4aXMtMicsXHJcblx0ICAgICAgICAgIHR5cGU6ICdsaW5lYXInLFxyXG5cdCAgICAgICAgICBkaXNwbGF5OiB0cnVlLFxyXG5cdCAgICAgICAgICBwb3NpdGlvbjogJ3JpZ2h0J1xyXG5cdCAgICAgICAgfVxyXG5cdCAgICAgIF1cclxuXHQgICAgfVxyXG5cdCAgfTtcclxuXHJcbn1dKTtcblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gcmVzb3VyY2VzL2Fzc2V0cy9qcy9hcHAvdXNlci91c3JfY2FsZW5kYXIuanMiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSIsInNvdXJjZVJvb3QiOiIifQ==");

/***/ }
/******/ ]);