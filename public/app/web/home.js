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
eval("'use strict';\r\nvar ngApp = angular.module('ngApp', ['ngResource', 'ngAnimate']);\r\n\r\nngApp.controller('ctrlApp', ['$scope', '$timeout', '$http',\r\n    function($scope, $timeout, $http) {\r\n\r\n    $scope.usrRegister = function(usr){\r\n        angular.element('#sccssrgstrtn').modal().velocity('transition.flipXIn');;\r\n        // $scope.loader = true;\r\n        // $http({\r\n        //     method: 'POST',\r\n        //     url: \"register\",\r\n        //     headers: {'Content-Type': undefined},\r\n        //     data: {user : usr},\r\n        //     transformRequest: function (data) {\r\n        //         var fd = new FormData();\r\n        //         fd.append('user', angular.toJson(data.user));\r\n        //         return fd;\r\n        //     }\r\n        // }).then(function(result){\r\n        //     $scope.msg = result.data;\r\n\r\n        //     $timeout(function(){\r\n        //         $scope.loader = false;\r\n        //         if($scope.msg['has_error'] == false){\r\n        //             $scope.rgstr = {};    \r\n        //         }\r\n        //         console.log($scope.msg);\r\n        //     }, 500);\r\n        // });\r\n    }\r\n\r\n}]);\r\n\r\nngApp.config(function($interpolateProvider){\r\n    $interpolateProvider.startSymbol('<%=').endSymbol('%>');\r\n});//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC9ob21lLmpzPzg2MGYiXSwic291cmNlc0NvbnRlbnQiOlsiJ3VzZSBzdHJpY3QnO1xyXG52YXIgbmdBcHAgPSBhbmd1bGFyLm1vZHVsZSgnbmdBcHAnLCBbJ25nUmVzb3VyY2UnLCAnbmdBbmltYXRlJ10pO1xyXG5cclxubmdBcHAuY29udHJvbGxlcignY3RybEFwcCcsIFsnJHNjb3BlJywgJyR0aW1lb3V0JywgJyRodHRwJyxcclxuICAgIGZ1bmN0aW9uKCRzY29wZSwgJHRpbWVvdXQsICRodHRwKSB7XHJcblxyXG4gICAgJHNjb3BlLnVzclJlZ2lzdGVyID0gZnVuY3Rpb24odXNyKXtcclxuICAgICAgICBhbmd1bGFyLmVsZW1lbnQoJyNzY2Nzc3Jnc3RydG4nKS5tb2RhbCgpLnZlbG9jaXR5KCd0cmFuc2l0aW9uLmZsaXBYSW4nKTs7XHJcbiAgICAgICAgLy8gJHNjb3BlLmxvYWRlciA9IHRydWU7XHJcbiAgICAgICAgLy8gJGh0dHAoe1xyXG4gICAgICAgIC8vICAgICBtZXRob2Q6ICdQT1NUJyxcclxuICAgICAgICAvLyAgICAgdXJsOiBcInJlZ2lzdGVyXCIsXHJcbiAgICAgICAgLy8gICAgIGhlYWRlcnM6IHsnQ29udGVudC1UeXBlJzogdW5kZWZpbmVkfSxcclxuICAgICAgICAvLyAgICAgZGF0YToge3VzZXIgOiB1c3J9LFxyXG4gICAgICAgIC8vICAgICB0cmFuc2Zvcm1SZXF1ZXN0OiBmdW5jdGlvbiAoZGF0YSkge1xyXG4gICAgICAgIC8vICAgICAgICAgdmFyIGZkID0gbmV3IEZvcm1EYXRhKCk7XHJcbiAgICAgICAgLy8gICAgICAgICBmZC5hcHBlbmQoJ3VzZXInLCBhbmd1bGFyLnRvSnNvbihkYXRhLnVzZXIpKTtcclxuICAgICAgICAvLyAgICAgICAgIHJldHVybiBmZDtcclxuICAgICAgICAvLyAgICAgfVxyXG4gICAgICAgIC8vIH0pLnRoZW4oZnVuY3Rpb24ocmVzdWx0KXtcclxuICAgICAgICAvLyAgICAgJHNjb3BlLm1zZyA9IHJlc3VsdC5kYXRhO1xyXG5cclxuICAgICAgICAvLyAgICAgJHRpbWVvdXQoZnVuY3Rpb24oKXtcclxuICAgICAgICAvLyAgICAgICAgICRzY29wZS5sb2FkZXIgPSBmYWxzZTtcclxuICAgICAgICAvLyAgICAgICAgIGlmKCRzY29wZS5tc2dbJ2hhc19lcnJvciddID09IGZhbHNlKXtcclxuICAgICAgICAvLyAgICAgICAgICAgICAkc2NvcGUucmdzdHIgPSB7fTsgICAgXHJcbiAgICAgICAgLy8gICAgICAgICB9XHJcbiAgICAgICAgLy8gICAgICAgICBjb25zb2xlLmxvZygkc2NvcGUubXNnKTtcclxuICAgICAgICAvLyAgICAgfSwgNTAwKTtcclxuICAgICAgICAvLyB9KTtcclxuICAgIH1cclxuXHJcbn1dKTtcclxuXHJcbm5nQXBwLmNvbmZpZyhmdW5jdGlvbigkaW50ZXJwb2xhdGVQcm92aWRlcil7XHJcbiAgICAkaW50ZXJwb2xhdGVQcm92aWRlci5zdGFydFN5bWJvbCgnPCU9JykuZW5kU3ltYm9sKCclPicpO1xyXG59KTtcblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gcmVzb3VyY2VzL2Fzc2V0cy9qcy9hcHAvaG9tZS5qcyJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7QUF1QkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOyIsInNvdXJjZVJvb3QiOiIifQ==");

/***/ }
/******/ ]);