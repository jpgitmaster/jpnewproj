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
eval("'use strict'; \r\nvar usrContent = angular.module('usrContent', []);\r\n\r\nusrContent.controller('ctrlEditProfile', ['$scope', '$rootScope', '$timeout', '$http', 'Usr',\r\n\tfunction($scope, $rootScope, $timeout, $http, Usr) {\r\n\r\n\tUsr.query().$promise.then(function(data) {\r\n       $rootScope.usr = data;\r\n   \t});\r\n\r\n\t$scope.imgForm = function(imgtarget){\r\n\t\t$timeout(function(){\r\n            $scope.imgtarget = imgtarget;\r\n        }, 10);\r\n\t}\r\n\r\n\t$scope.img_coordinates = function(coordinates){\r\n        $scope.coordinates = coordinates;\r\n    }\r\n\r\n    $scope.cancelUpload = function(){\r\n        $scope.imgtarget = '';\r\n    \tangular.element('.upload').val('');\r\n    \tangular.element('#target').data('Jcrop').destroy();\r\n    \tangular.element('#target').attr('src', '');\r\n\t}\r\n\r\n    $scope.uploadFile = function(files){\r\n        $http({\r\n            method: 'POST',\r\n            url: '/upload_dp',\r\n            headers: { 'Content-Type': undefined },\r\n            transformRequest: function (data) {\r\n                var fd = new FormData();\r\n\r\n                fd.append('coordinates', angular.toJson(data.coordinates));\r\n                angular.forEach(data.img_files, function(file){\r\n                   fd.append('file', file);\r\n                });\r\n                return fd;\r\n            },\r\n            data: {img_files: files, coordinates: $scope.coordinates}\r\n        }).then(function(result){\r\n        \tconsole.log(result.data);\r\n   \t\t\t\r\n   \t\t\tvar msg = result.data;\r\n\r\n   \t\t\tif(!msg['dp']['success']){\r\n            \t$scope.msg = '';\r\n            }else{\r\n                $scope.msg = msg;\r\n                $rootScope.usr = Usr.query();\r\n\t            $scope.cancelUpload();\r\n\t            angular.element('#cropModal').modal('hide');\r\n            }\r\n        });\r\n    }\r\n\r\n    $scope.timestamp = function(){\r\n    \treturn Date.now();\r\n    }\r\n    $scope.updateUsr = function(){\r\n    \t$rootScope.usr = Usr.query();\r\n    }\r\n\r\n    $scope.deleteRecord = function(num){\r\n    \t$http({\r\n            method: 'POST',\r\n            url: '/delete_record',\r\n            headers: { 'Content-Type': undefined },\r\n            transformRequest: function (data) {\r\n                var fd = new FormData();\r\n\r\n                fd.append('num', angular.toJson(data.num));\r\n                return fd;\r\n            },\r\n            data: {num: num}\r\n        }).then(function(result){\r\n        \tvar msg = result.data;\r\n        \tvar msg_dtl = [];\r\n        \tif(msg['dpimg']){\r\n        \t\tmsg_dtl = msg['dpimg']['dlt']['success'];\r\n        \t}\r\n        \tif(msg['rsm']){\r\n        \t\tmsg_dtl = msg['rsm']['dlt']['success'];\r\n        \t}\r\n        \tif(!msg_dtl){\r\n            \t$scope.msg = '';\r\n            }else{\r\n                $scope.msg = msg;\r\n                $rootScope.usr = Usr.query();\r\n            }\r\n        });\r\n    }\r\n\r\n    $scope.clsbbl = function(num){\r\n    \tswitch(num){\r\n    \t\tcase 0:\r\n    \t\t\t$scope.dltdp = false;\r\n    \t\t\tbreak;\r\n    \t\tcase 1:\r\n    \t\t\t$scope.dltrsm = false;\r\n    \t\t\tbreak;\r\n    \t}\r\n    \t\r\n    }\r\n}]);\r\n\r\nusrContent.directive('fileInput', ['$parse', '$http', '$timeout',\r\n\tfunction($parse, $http, $timeout){\r\n\treturn {\r\n\t    restrict: 'A',\r\n\t    link: function(scope, elm, attrs){\r\n\t        elm.bind('change', function(){\r\n\t            \r\n\t            var files = elm[0].files;\r\n\t            $parse(attrs.fileInput).assign(scope, files);\r\n\t            scope.$apply();\r\n\t            \r\n\t            scope.shw_avatarmdl = true;\r\n\t            scope.loader = true;\r\n\r\n\t            $http({\r\n\t                method: 'POST',\r\n\t                url: \"/validate_dp\",\r\n\t                headers: { 'Content-Type': undefined },\r\n\t                transformRequest: function (data) {\r\n\t                    var fd = new FormData();\r\n\t                    angular.forEach(data.img_files, function(file){\r\n\t                       fd.append('file', file);\r\n\t                    });\r\n\t                    return fd;\r\n\t                },\r\n\t                data: {img_files: files}\r\n\t            }).then(function(result){\r\n\t            \tvar msg = result.data;\r\n                    scope.shw_avatarmdl = false;\r\n                    \r\n                    if(!msg['dp']['error']['file']){\r\n                    \tangular.element('#cropModal').appendTo('body').modal({\r\n                            backdrop: 'static'\r\n                        });\r\n                        var file = files[0];\r\n                        (function(file) {\r\n                            var reader = new FileReader();\r\n                            reader.readAsDataURL(file);\r\n                            reader.onload = function(e) {\r\n                            \tvar imgTarget = e.target.result;\r\n                            \tscope.imgForm(imgTarget);\r\n                            }\r\n                        }(file));\r\n                        scope.msg = '';\r\n                    }else{\r\n                        scope.msg = msg;\r\n                    }\r\n\t            });\r\n\t        });\r\n\t    }\r\n\t}\r\n}]);\r\n\r\nusrContent.directive('fileResume', ['$parse', '$http', '$timeout',\r\n\tfunction($parse, $http, $timeout){\r\n\treturn {\r\n\t    restrict: 'A',\r\n\t    link: function(scope, elm, attrs){\r\n\t        elm.bind('change', function(){\r\n\t            var files = elm[0].files;\r\n\t            $parse(attrs.fileResume).assign(scope, files);\r\n\t            scope.$apply();\r\n\t            \r\n\t            scope.resume_loader = true;\r\n\r\n\t            $http({\r\n\t                method: 'POST',\r\n\t                url: \"/upload_resume\",\r\n\t                headers: { 'Content-Type': undefined },\r\n\t                transformRequest: function (data) {\r\n\t                    var fd = new FormData();\r\n\t                    angular.forEach(data.resumefiles, function(file){\r\n\t                       fd.append('file', file);\r\n\t                    });\r\n\t                    return fd;\r\n\t                },\r\n\t                data: {resumefiles: files}\r\n\t            }).then(function(result){\r\n\t            \tvar msg = result.data;\r\n                    console.log(msg);\r\n                    $timeout(function(){\r\n                    \tscope.resume_loader = false;\r\n                    \tscope.updateUsr();\r\n                    \tif(!msg['resume']){\r\n\t                    \tscope.msg = '';\r\n\t                    }else{\r\n\t                        scope.msg = msg;\r\n\t                    }\r\n\t                    angular.element('.preview_resume .upload').val('');\r\n\t                    \r\n                    }, 500);\r\n\t            });\r\n\t        });\r\n\t    }\r\n\t}\r\n}]);\r\n\r\n\r\nusrContent.directive('jpCustomCrop', ['$parse', '$rootScope', '$timeout', function($parse, $rootScope, $timeout){\r\n    return {\r\n        restrict: 'A',\r\n        link: function (scope, element, attrs)\r\n        {\r\n            $(function(){\r\n            \t$('#cropModal').on('shown.bs.modal', function () {\r\n            \t\t\r\n            \t\t$timeout(function(){\r\n            \t\t\tscope.loader = false;\r\n            \t\t\t$('.imgcropper, .prvw').hide().delay('200').fadeIn();\r\n            \t\t}, 1000)\r\n\t\t\t\t  var jcrop_api,\r\n                  boundx,\r\n                  boundy,\r\n\r\n                  // Grab some information about the preview pane\r\n                  $preview = $('.preview-pane'),\r\n                  $pcnt = $('.preview-pane .preview-container'),\r\n                  $pimg = $('.preview-pane .preview-container img'),\r\n                  xsize = $pcnt.width(),\r\n                  ysize = $pcnt.height();\r\n                  \r\n                  $('#target').Jcrop({\r\n                    boxWidth: 670,\r\n                    // boxHeight: 550,\r\n                    minSize: [ 100, 100 ],\r\n                    // maxSize: [ 450, 450 ],\r\n                    onChange: updatePreview,\r\n                    onSelect: updatePreview,\r\n                    aspectRatio: xsize / ysize\r\n                  },function(){\r\n                    // Use the API to get the real image size\r\n                    var bounds = this.getBounds();\r\n                    boundx = bounds[0];\r\n                    boundy = bounds[1];\r\n                    \r\n                    // Store the API in the jcrop_api variable\r\n                    jcrop_api = this;\r\n                    jcrop_api.animateTo([510, 300, 190, 100]);\r\n                  });\r\n\r\n\t                function updatePreview(c){\r\n\t                    var imgx = Math.round(c.x);\r\n\t                    var imgy = Math.round(c.y);\r\n\t                    var imgw = Math.round(c.w);\r\n\t                    var imgh = Math.round(c.h);\r\n\t                    var imgw2 = xsize;\r\n\t                    var imgh2 = ysize;\r\n\t                    scope.img_coordinates({imgx: imgx, imgy: imgy, imgw: imgw, imgh: imgh, imgw2: imgw2, imgh2: imgh2});\r\n\t                    if (parseInt(c.w) > 0){\r\n\t                      var rx = xsize / c.w;\r\n\t                      var ry = ysize / c.h;\r\n\t                      $pimg.css({\r\n\t                        width: Math.round(rx * boundx) + 'px',\r\n\t                        height: Math.round(ry * boundy) + 'px',\r\n\t                        marginLeft: '-' + Math.round(rx * c.x) + 'px',\r\n\t                        marginTop: '-' + Math.round(ry * c.y) + 'px'\r\n\t                      });\r\n\t                  \t}\r\n\t                };\r\n\t\t\t\t})\r\n            });\r\n        }\r\n    };\r\n}]);//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC91c2VyL2VkaXRfcHJvZmlsZS5qcz8wYzNkIl0sInNvdXJjZXNDb250ZW50IjpbIid1c2Ugc3RyaWN0JzsgXHJcbnZhciB1c3JDb250ZW50ID0gYW5ndWxhci5tb2R1bGUoJ3VzckNvbnRlbnQnLCBbXSk7XHJcblxyXG51c3JDb250ZW50LmNvbnRyb2xsZXIoJ2N0cmxFZGl0UHJvZmlsZScsIFsnJHNjb3BlJywgJyRyb290U2NvcGUnLCAnJHRpbWVvdXQnLCAnJGh0dHAnLCAnVXNyJyxcclxuXHRmdW5jdGlvbigkc2NvcGUsICRyb290U2NvcGUsICR0aW1lb3V0LCAkaHR0cCwgVXNyKSB7XHJcblxyXG5cdFVzci5xdWVyeSgpLiRwcm9taXNlLnRoZW4oZnVuY3Rpb24oZGF0YSkge1xyXG4gICAgICAgJHJvb3RTY29wZS51c3IgPSBkYXRhO1xyXG4gICBcdH0pO1xyXG5cclxuXHQkc2NvcGUuaW1nRm9ybSA9IGZ1bmN0aW9uKGltZ3RhcmdldCl7XHJcblx0XHQkdGltZW91dChmdW5jdGlvbigpe1xyXG4gICAgICAgICAgICAkc2NvcGUuaW1ndGFyZ2V0ID0gaW1ndGFyZ2V0O1xyXG4gICAgICAgIH0sIDEwKTtcclxuXHR9XHJcblxyXG5cdCRzY29wZS5pbWdfY29vcmRpbmF0ZXMgPSBmdW5jdGlvbihjb29yZGluYXRlcyl7XHJcbiAgICAgICAgJHNjb3BlLmNvb3JkaW5hdGVzID0gY29vcmRpbmF0ZXM7XHJcbiAgICB9XHJcblxyXG4gICAgJHNjb3BlLmNhbmNlbFVwbG9hZCA9IGZ1bmN0aW9uKCl7XHJcbiAgICAgICAgJHNjb3BlLmltZ3RhcmdldCA9ICcnO1xyXG4gICAgXHRhbmd1bGFyLmVsZW1lbnQoJy51cGxvYWQnKS52YWwoJycpO1xyXG4gICAgXHRhbmd1bGFyLmVsZW1lbnQoJyN0YXJnZXQnKS5kYXRhKCdKY3JvcCcpLmRlc3Ryb3koKTtcclxuICAgIFx0YW5ndWxhci5lbGVtZW50KCcjdGFyZ2V0JykuYXR0cignc3JjJywgJycpO1xyXG5cdH1cclxuXHJcbiAgICAkc2NvcGUudXBsb2FkRmlsZSA9IGZ1bmN0aW9uKGZpbGVzKXtcclxuICAgICAgICAkaHR0cCh7XHJcbiAgICAgICAgICAgIG1ldGhvZDogJ1BPU1QnLFxyXG4gICAgICAgICAgICB1cmw6ICcvdXBsb2FkX2RwJyxcclxuICAgICAgICAgICAgaGVhZGVyczogeyAnQ29udGVudC1UeXBlJzogdW5kZWZpbmVkIH0sXHJcbiAgICAgICAgICAgIHRyYW5zZm9ybVJlcXVlc3Q6IGZ1bmN0aW9uIChkYXRhKSB7XHJcbiAgICAgICAgICAgICAgICB2YXIgZmQgPSBuZXcgRm9ybURhdGEoKTtcclxuXHJcbiAgICAgICAgICAgICAgICBmZC5hcHBlbmQoJ2Nvb3JkaW5hdGVzJywgYW5ndWxhci50b0pzb24oZGF0YS5jb29yZGluYXRlcykpO1xyXG4gICAgICAgICAgICAgICAgYW5ndWxhci5mb3JFYWNoKGRhdGEuaW1nX2ZpbGVzLCBmdW5jdGlvbihmaWxlKXtcclxuICAgICAgICAgICAgICAgICAgIGZkLmFwcGVuZCgnZmlsZScsIGZpbGUpO1xyXG4gICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICAgICByZXR1cm4gZmQ7XHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIGRhdGE6IHtpbWdfZmlsZXM6IGZpbGVzLCBjb29yZGluYXRlczogJHNjb3BlLmNvb3JkaW5hdGVzfVxyXG4gICAgICAgIH0pLnRoZW4oZnVuY3Rpb24ocmVzdWx0KXtcclxuICAgICAgICBcdGNvbnNvbGUubG9nKHJlc3VsdC5kYXRhKTtcclxuICAgXHRcdFx0XHJcbiAgIFx0XHRcdHZhciBtc2cgPSByZXN1bHQuZGF0YTtcclxuXHJcbiAgIFx0XHRcdGlmKCFtc2dbJ2RwJ11bJ3N1Y2Nlc3MnXSl7XHJcbiAgICAgICAgICAgIFx0JHNjb3BlLm1zZyA9ICcnO1xyXG4gICAgICAgICAgICB9ZWxzZXtcclxuICAgICAgICAgICAgICAgICRzY29wZS5tc2cgPSBtc2c7XHJcbiAgICAgICAgICAgICAgICAkcm9vdFNjb3BlLnVzciA9IFVzci5xdWVyeSgpO1xyXG5cdCAgICAgICAgICAgICRzY29wZS5jYW5jZWxVcGxvYWQoKTtcclxuXHQgICAgICAgICAgICBhbmd1bGFyLmVsZW1lbnQoJyNjcm9wTW9kYWwnKS5tb2RhbCgnaGlkZScpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSk7XHJcbiAgICB9XHJcblxyXG4gICAgJHNjb3BlLnRpbWVzdGFtcCA9IGZ1bmN0aW9uKCl7XHJcbiAgICBcdHJldHVybiBEYXRlLm5vdygpO1xyXG4gICAgfVxyXG4gICAgJHNjb3BlLnVwZGF0ZVVzciA9IGZ1bmN0aW9uKCl7XHJcbiAgICBcdCRyb290U2NvcGUudXNyID0gVXNyLnF1ZXJ5KCk7XHJcbiAgICB9XHJcblxyXG4gICAgJHNjb3BlLmRlbGV0ZVJlY29yZCA9IGZ1bmN0aW9uKG51bSl7XHJcbiAgICBcdCRodHRwKHtcclxuICAgICAgICAgICAgbWV0aG9kOiAnUE9TVCcsXHJcbiAgICAgICAgICAgIHVybDogJy9kZWxldGVfcmVjb3JkJyxcclxuICAgICAgICAgICAgaGVhZGVyczogeyAnQ29udGVudC1UeXBlJzogdW5kZWZpbmVkIH0sXHJcbiAgICAgICAgICAgIHRyYW5zZm9ybVJlcXVlc3Q6IGZ1bmN0aW9uIChkYXRhKSB7XHJcbiAgICAgICAgICAgICAgICB2YXIgZmQgPSBuZXcgRm9ybURhdGEoKTtcclxuXHJcbiAgICAgICAgICAgICAgICBmZC5hcHBlbmQoJ251bScsIGFuZ3VsYXIudG9Kc29uKGRhdGEubnVtKSk7XHJcbiAgICAgICAgICAgICAgICByZXR1cm4gZmQ7XHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIGRhdGE6IHtudW06IG51bX1cclxuICAgICAgICB9KS50aGVuKGZ1bmN0aW9uKHJlc3VsdCl7XHJcbiAgICAgICAgXHR2YXIgbXNnID0gcmVzdWx0LmRhdGE7XHJcbiAgICAgICAgXHR2YXIgbXNnX2R0bCA9IFtdO1xyXG4gICAgICAgIFx0aWYobXNnWydkcGltZyddKXtcclxuICAgICAgICBcdFx0bXNnX2R0bCA9IG1zZ1snZHBpbWcnXVsnZGx0J11bJ3N1Y2Nlc3MnXTtcclxuICAgICAgICBcdH1cclxuICAgICAgICBcdGlmKG1zZ1sncnNtJ10pe1xyXG4gICAgICAgIFx0XHRtc2dfZHRsID0gbXNnWydyc20nXVsnZGx0J11bJ3N1Y2Nlc3MnXTtcclxuICAgICAgICBcdH1cclxuICAgICAgICBcdGlmKCFtc2dfZHRsKXtcclxuICAgICAgICAgICAgXHQkc2NvcGUubXNnID0gJyc7XHJcbiAgICAgICAgICAgIH1lbHNle1xyXG4gICAgICAgICAgICAgICAgJHNjb3BlLm1zZyA9IG1zZztcclxuICAgICAgICAgICAgICAgICRyb290U2NvcGUudXNyID0gVXNyLnF1ZXJ5KCk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICAkc2NvcGUuY2xzYmJsID0gZnVuY3Rpb24obnVtKXtcclxuICAgIFx0c3dpdGNoKG51bSl7XHJcbiAgICBcdFx0Y2FzZSAwOlxyXG4gICAgXHRcdFx0JHNjb3BlLmRsdGRwID0gZmFsc2U7XHJcbiAgICBcdFx0XHRicmVhaztcclxuICAgIFx0XHRjYXNlIDE6XHJcbiAgICBcdFx0XHQkc2NvcGUuZGx0cnNtID0gZmFsc2U7XHJcbiAgICBcdFx0XHRicmVhaztcclxuICAgIFx0fVxyXG4gICAgXHRcclxuICAgIH1cclxufV0pO1xyXG5cclxudXNyQ29udGVudC5kaXJlY3RpdmUoJ2ZpbGVJbnB1dCcsIFsnJHBhcnNlJywgJyRodHRwJywgJyR0aW1lb3V0JyxcclxuXHRmdW5jdGlvbigkcGFyc2UsICRodHRwLCAkdGltZW91dCl7XHJcblx0cmV0dXJuIHtcclxuXHQgICAgcmVzdHJpY3Q6ICdBJyxcclxuXHQgICAgbGluazogZnVuY3Rpb24oc2NvcGUsIGVsbSwgYXR0cnMpe1xyXG5cdCAgICAgICAgZWxtLmJpbmQoJ2NoYW5nZScsIGZ1bmN0aW9uKCl7XHJcblx0ICAgICAgICAgICAgXHJcblx0ICAgICAgICAgICAgdmFyIGZpbGVzID0gZWxtWzBdLmZpbGVzO1xyXG5cdCAgICAgICAgICAgICRwYXJzZShhdHRycy5maWxlSW5wdXQpLmFzc2lnbihzY29wZSwgZmlsZXMpO1xyXG5cdCAgICAgICAgICAgIHNjb3BlLiRhcHBseSgpO1xyXG5cdCAgICAgICAgICAgIFxyXG5cdCAgICAgICAgICAgIHNjb3BlLnNod19hdmF0YXJtZGwgPSB0cnVlO1xyXG5cdCAgICAgICAgICAgIHNjb3BlLmxvYWRlciA9IHRydWU7XHJcblxyXG5cdCAgICAgICAgICAgICRodHRwKHtcclxuXHQgICAgICAgICAgICAgICAgbWV0aG9kOiAnUE9TVCcsXHJcblx0ICAgICAgICAgICAgICAgIHVybDogXCIvdmFsaWRhdGVfZHBcIixcclxuXHQgICAgICAgICAgICAgICAgaGVhZGVyczogeyAnQ29udGVudC1UeXBlJzogdW5kZWZpbmVkIH0sXHJcblx0ICAgICAgICAgICAgICAgIHRyYW5zZm9ybVJlcXVlc3Q6IGZ1bmN0aW9uIChkYXRhKSB7XHJcblx0ICAgICAgICAgICAgICAgICAgICB2YXIgZmQgPSBuZXcgRm9ybURhdGEoKTtcclxuXHQgICAgICAgICAgICAgICAgICAgIGFuZ3VsYXIuZm9yRWFjaChkYXRhLmltZ19maWxlcywgZnVuY3Rpb24oZmlsZSl7XHJcblx0ICAgICAgICAgICAgICAgICAgICAgICBmZC5hcHBlbmQoJ2ZpbGUnLCBmaWxlKTtcclxuXHQgICAgICAgICAgICAgICAgICAgIH0pO1xyXG5cdCAgICAgICAgICAgICAgICAgICAgcmV0dXJuIGZkO1xyXG5cdCAgICAgICAgICAgICAgICB9LFxyXG5cdCAgICAgICAgICAgICAgICBkYXRhOiB7aW1nX2ZpbGVzOiBmaWxlc31cclxuXHQgICAgICAgICAgICB9KS50aGVuKGZ1bmN0aW9uKHJlc3VsdCl7XHJcblx0ICAgICAgICAgICAgXHR2YXIgbXNnID0gcmVzdWx0LmRhdGE7XHJcbiAgICAgICAgICAgICAgICAgICAgc2NvcGUuc2h3X2F2YXRhcm1kbCA9IGZhbHNlO1xyXG4gICAgICAgICAgICAgICAgICAgIFxyXG4gICAgICAgICAgICAgICAgICAgIGlmKCFtc2dbJ2RwJ11bJ2Vycm9yJ11bJ2ZpbGUnXSl7XHJcbiAgICAgICAgICAgICAgICAgICAgXHRhbmd1bGFyLmVsZW1lbnQoJyNjcm9wTW9kYWwnKS5hcHBlbmRUbygnYm9keScpLm1vZGFsKHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGJhY2tkcm9wOiAnc3RhdGljJ1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdmFyIGZpbGUgPSBmaWxlc1swXTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgKGZ1bmN0aW9uKGZpbGUpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHZhciByZWFkZXIgPSBuZXcgRmlsZVJlYWRlcigpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgcmVhZGVyLnJlYWRBc0RhdGFVUkwoZmlsZSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICByZWFkZXIub25sb2FkID0gZnVuY3Rpb24oZSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgXHR2YXIgaW1nVGFyZ2V0ID0gZS50YXJnZXQucmVzdWx0O1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgXHRzY29wZS5pbWdGb3JtKGltZ1RhcmdldCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH0oZmlsZSkpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBzY29wZS5tc2cgPSAnJztcclxuICAgICAgICAgICAgICAgICAgICB9ZWxzZXtcclxuICAgICAgICAgICAgICAgICAgICAgICAgc2NvcGUubXNnID0gbXNnO1xyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuXHQgICAgICAgICAgICB9KTtcclxuXHQgICAgICAgIH0pO1xyXG5cdCAgICB9XHJcblx0fVxyXG59XSk7XHJcblxyXG51c3JDb250ZW50LmRpcmVjdGl2ZSgnZmlsZVJlc3VtZScsIFsnJHBhcnNlJywgJyRodHRwJywgJyR0aW1lb3V0JyxcclxuXHRmdW5jdGlvbigkcGFyc2UsICRodHRwLCAkdGltZW91dCl7XHJcblx0cmV0dXJuIHtcclxuXHQgICAgcmVzdHJpY3Q6ICdBJyxcclxuXHQgICAgbGluazogZnVuY3Rpb24oc2NvcGUsIGVsbSwgYXR0cnMpe1xyXG5cdCAgICAgICAgZWxtLmJpbmQoJ2NoYW5nZScsIGZ1bmN0aW9uKCl7XHJcblx0ICAgICAgICAgICAgdmFyIGZpbGVzID0gZWxtWzBdLmZpbGVzO1xyXG5cdCAgICAgICAgICAgICRwYXJzZShhdHRycy5maWxlUmVzdW1lKS5hc3NpZ24oc2NvcGUsIGZpbGVzKTtcclxuXHQgICAgICAgICAgICBzY29wZS4kYXBwbHkoKTtcclxuXHQgICAgICAgICAgICBcclxuXHQgICAgICAgICAgICBzY29wZS5yZXN1bWVfbG9hZGVyID0gdHJ1ZTtcclxuXHJcblx0ICAgICAgICAgICAgJGh0dHAoe1xyXG5cdCAgICAgICAgICAgICAgICBtZXRob2Q6ICdQT1NUJyxcclxuXHQgICAgICAgICAgICAgICAgdXJsOiBcIi91cGxvYWRfcmVzdW1lXCIsXHJcblx0ICAgICAgICAgICAgICAgIGhlYWRlcnM6IHsgJ0NvbnRlbnQtVHlwZSc6IHVuZGVmaW5lZCB9LFxyXG5cdCAgICAgICAgICAgICAgICB0cmFuc2Zvcm1SZXF1ZXN0OiBmdW5jdGlvbiAoZGF0YSkge1xyXG5cdCAgICAgICAgICAgICAgICAgICAgdmFyIGZkID0gbmV3IEZvcm1EYXRhKCk7XHJcblx0ICAgICAgICAgICAgICAgICAgICBhbmd1bGFyLmZvckVhY2goZGF0YS5yZXN1bWVmaWxlcywgZnVuY3Rpb24oZmlsZSl7XHJcblx0ICAgICAgICAgICAgICAgICAgICAgICBmZC5hcHBlbmQoJ2ZpbGUnLCBmaWxlKTtcclxuXHQgICAgICAgICAgICAgICAgICAgIH0pO1xyXG5cdCAgICAgICAgICAgICAgICAgICAgcmV0dXJuIGZkO1xyXG5cdCAgICAgICAgICAgICAgICB9LFxyXG5cdCAgICAgICAgICAgICAgICBkYXRhOiB7cmVzdW1lZmlsZXM6IGZpbGVzfVxyXG5cdCAgICAgICAgICAgIH0pLnRoZW4oZnVuY3Rpb24ocmVzdWx0KXtcclxuXHQgICAgICAgICAgICBcdHZhciBtc2cgPSByZXN1bHQuZGF0YTtcclxuICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhtc2cpO1xyXG4gICAgICAgICAgICAgICAgICAgICR0aW1lb3V0KGZ1bmN0aW9uKCl7XHJcbiAgICAgICAgICAgICAgICAgICAgXHRzY29wZS5yZXN1bWVfbG9hZGVyID0gZmFsc2U7XHJcbiAgICAgICAgICAgICAgICAgICAgXHRzY29wZS51cGRhdGVVc3IoKTtcclxuICAgICAgICAgICAgICAgICAgICBcdGlmKCFtc2dbJ3Jlc3VtZSddKXtcclxuXHQgICAgICAgICAgICAgICAgICAgIFx0c2NvcGUubXNnID0gJyc7XHJcblx0ICAgICAgICAgICAgICAgICAgICB9ZWxzZXtcclxuXHQgICAgICAgICAgICAgICAgICAgICAgICBzY29wZS5tc2cgPSBtc2c7XHJcblx0ICAgICAgICAgICAgICAgICAgICB9XHJcblx0ICAgICAgICAgICAgICAgICAgICBhbmd1bGFyLmVsZW1lbnQoJy5wcmV2aWV3X3Jlc3VtZSAudXBsb2FkJykudmFsKCcnKTtcclxuXHQgICAgICAgICAgICAgICAgICAgIFxyXG4gICAgICAgICAgICAgICAgICAgIH0sIDUwMCk7XHJcblx0ICAgICAgICAgICAgfSk7XHJcblx0ICAgICAgICB9KTtcclxuXHQgICAgfVxyXG5cdH1cclxufV0pO1xyXG5cclxuXHJcbnVzckNvbnRlbnQuZGlyZWN0aXZlKCdqcEN1c3RvbUNyb3AnLCBbJyRwYXJzZScsICckcm9vdFNjb3BlJywgJyR0aW1lb3V0JywgZnVuY3Rpb24oJHBhcnNlLCAkcm9vdFNjb3BlLCAkdGltZW91dCl7XHJcbiAgICByZXR1cm4ge1xyXG4gICAgICAgIHJlc3RyaWN0OiAnQScsXHJcbiAgICAgICAgbGluazogZnVuY3Rpb24gKHNjb3BlLCBlbGVtZW50LCBhdHRycylcclxuICAgICAgICB7XHJcbiAgICAgICAgICAgICQoZnVuY3Rpb24oKXtcclxuICAgICAgICAgICAgXHQkKCcjY3JvcE1vZGFsJykub24oJ3Nob3duLmJzLm1vZGFsJywgZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICBcdFx0XHJcbiAgICAgICAgICAgIFx0XHQkdGltZW91dChmdW5jdGlvbigpe1xyXG4gICAgICAgICAgICBcdFx0XHRzY29wZS5sb2FkZXIgPSBmYWxzZTtcclxuICAgICAgICAgICAgXHRcdFx0JCgnLmltZ2Nyb3BwZXIsIC5wcnZ3JykuaGlkZSgpLmRlbGF5KCcyMDAnKS5mYWRlSW4oKTtcclxuICAgICAgICAgICAgXHRcdH0sIDEwMDApXHJcblx0XHRcdFx0ICB2YXIgamNyb3BfYXBpLFxyXG4gICAgICAgICAgICAgICAgICBib3VuZHgsXHJcbiAgICAgICAgICAgICAgICAgIGJvdW5keSxcclxuXHJcbiAgICAgICAgICAgICAgICAgIC8vIEdyYWIgc29tZSBpbmZvcm1hdGlvbiBhYm91dCB0aGUgcHJldmlldyBwYW5lXHJcbiAgICAgICAgICAgICAgICAgICRwcmV2aWV3ID0gJCgnLnByZXZpZXctcGFuZScpLFxyXG4gICAgICAgICAgICAgICAgICAkcGNudCA9ICQoJy5wcmV2aWV3LXBhbmUgLnByZXZpZXctY29udGFpbmVyJyksXHJcbiAgICAgICAgICAgICAgICAgICRwaW1nID0gJCgnLnByZXZpZXctcGFuZSAucHJldmlldy1jb250YWluZXIgaW1nJyksXHJcbiAgICAgICAgICAgICAgICAgIHhzaXplID0gJHBjbnQud2lkdGgoKSxcclxuICAgICAgICAgICAgICAgICAgeXNpemUgPSAkcGNudC5oZWlnaHQoKTtcclxuICAgICAgICAgICAgICAgICAgXHJcbiAgICAgICAgICAgICAgICAgICQoJyN0YXJnZXQnKS5KY3JvcCh7XHJcbiAgICAgICAgICAgICAgICAgICAgYm94V2lkdGg6IDY3MCxcclxuICAgICAgICAgICAgICAgICAgICAvLyBib3hIZWlnaHQ6IDU1MCxcclxuICAgICAgICAgICAgICAgICAgICBtaW5TaXplOiBbIDEwMCwgMTAwIF0sXHJcbiAgICAgICAgICAgICAgICAgICAgLy8gbWF4U2l6ZTogWyA0NTAsIDQ1MCBdLFxyXG4gICAgICAgICAgICAgICAgICAgIG9uQ2hhbmdlOiB1cGRhdGVQcmV2aWV3LFxyXG4gICAgICAgICAgICAgICAgICAgIG9uU2VsZWN0OiB1cGRhdGVQcmV2aWV3LFxyXG4gICAgICAgICAgICAgICAgICAgIGFzcGVjdFJhdGlvOiB4c2l6ZSAvIHlzaXplXHJcbiAgICAgICAgICAgICAgICAgIH0sZnVuY3Rpb24oKXtcclxuICAgICAgICAgICAgICAgICAgICAvLyBVc2UgdGhlIEFQSSB0byBnZXQgdGhlIHJlYWwgaW1hZ2Ugc2l6ZVxyXG4gICAgICAgICAgICAgICAgICAgIHZhciBib3VuZHMgPSB0aGlzLmdldEJvdW5kcygpO1xyXG4gICAgICAgICAgICAgICAgICAgIGJvdW5keCA9IGJvdW5kc1swXTtcclxuICAgICAgICAgICAgICAgICAgICBib3VuZHkgPSBib3VuZHNbMV07XHJcbiAgICAgICAgICAgICAgICAgICAgXHJcbiAgICAgICAgICAgICAgICAgICAgLy8gU3RvcmUgdGhlIEFQSSBpbiB0aGUgamNyb3BfYXBpIHZhcmlhYmxlXHJcbiAgICAgICAgICAgICAgICAgICAgamNyb3BfYXBpID0gdGhpcztcclxuICAgICAgICAgICAgICAgICAgICBqY3JvcF9hcGkuYW5pbWF0ZVRvKFs1MTAsIDMwMCwgMTkwLCAxMDBdKTtcclxuICAgICAgICAgICAgICAgICAgfSk7XHJcblxyXG5cdCAgICAgICAgICAgICAgICBmdW5jdGlvbiB1cGRhdGVQcmV2aWV3KGMpe1xyXG5cdCAgICAgICAgICAgICAgICAgICAgdmFyIGltZ3ggPSBNYXRoLnJvdW5kKGMueCk7XHJcblx0ICAgICAgICAgICAgICAgICAgICB2YXIgaW1neSA9IE1hdGgucm91bmQoYy55KTtcclxuXHQgICAgICAgICAgICAgICAgICAgIHZhciBpbWd3ID0gTWF0aC5yb3VuZChjLncpO1xyXG5cdCAgICAgICAgICAgICAgICAgICAgdmFyIGltZ2ggPSBNYXRoLnJvdW5kKGMuaCk7XHJcblx0ICAgICAgICAgICAgICAgICAgICB2YXIgaW1ndzIgPSB4c2l6ZTtcclxuXHQgICAgICAgICAgICAgICAgICAgIHZhciBpbWdoMiA9IHlzaXplO1xyXG5cdCAgICAgICAgICAgICAgICAgICAgc2NvcGUuaW1nX2Nvb3JkaW5hdGVzKHtpbWd4LCBpbWd5LCBpbWd3LCBpbWdoLCBpbWd3MiwgaW1naDJ9KTtcclxuXHQgICAgICAgICAgICAgICAgICAgIGlmIChwYXJzZUludChjLncpID4gMCl7XHJcblx0ICAgICAgICAgICAgICAgICAgICAgIHZhciByeCA9IHhzaXplIC8gYy53O1xyXG5cdCAgICAgICAgICAgICAgICAgICAgICB2YXIgcnkgPSB5c2l6ZSAvIGMuaDtcclxuXHQgICAgICAgICAgICAgICAgICAgICAgJHBpbWcuY3NzKHtcclxuXHQgICAgICAgICAgICAgICAgICAgICAgICB3aWR0aDogTWF0aC5yb3VuZChyeCAqIGJvdW5keCkgKyAncHgnLFxyXG5cdCAgICAgICAgICAgICAgICAgICAgICAgIGhlaWdodDogTWF0aC5yb3VuZChyeSAqIGJvdW5keSkgKyAncHgnLFxyXG5cdCAgICAgICAgICAgICAgICAgICAgICAgIG1hcmdpbkxlZnQ6ICctJyArIE1hdGgucm91bmQocnggKiBjLngpICsgJ3B4JyxcclxuXHQgICAgICAgICAgICAgICAgICAgICAgICBtYXJnaW5Ub3A6ICctJyArIE1hdGgucm91bmQocnkgKiBjLnkpICsgJ3B4J1xyXG5cdCAgICAgICAgICAgICAgICAgICAgICB9KTtcclxuXHQgICAgICAgICAgICAgICAgICBcdH1cclxuXHQgICAgICAgICAgICAgICAgfTtcclxuXHRcdFx0XHR9KVxyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9XHJcbiAgICB9O1xyXG59XSk7XG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHJlc291cmNlcy9hc3NldHMvanMvYXBwL3VzZXIvZWRpdF9wcm9maWxlLmpzIl0sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Iiwic291cmNlUm9vdCI6IiJ9");

/***/ }
/******/ ]);