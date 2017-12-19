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
eval("'use strict'; \r\nvar usrContent = angular.module('usrContent', ['summernote', 'AxelSoft']);\r\n\r\nusrContent.controller('ctrlEditProfile', ['$scope', '$rootScope', '$filter', '$timeout', '$http', '$q', 'Usr', 'Countries', 'PersnlInfo',\r\n    function($scope, $rootScope, $filter, $timeout, $http, $q, Usr, Countries, PersnlInfo) {\r\n\r\n    $scope.updateUsr = function(){\r\n        Usr.query().$promise.then(function(data) {\r\n            $rootScope.usr = data;\r\n        });\r\n    }\r\n    \r\n    $scope.countries    = Countries.query();\r\n    PersnlInfo.query().$promise.then(function(data) {\r\n        $scope.frm1 = data;\r\n        $scope.cvlstatus = $scope.frm1.cstatus;\r\n        $scope.country = $scope.frm1.country;\r\n        $scope.nationality = $scope.frm1.nationality;\r\n    });\r\n    $scope.select_status = {\r\n        onSelect: function (item) {\r\n            $scope.frm1.cstatus = item.id;\r\n        }\r\n    };\r\n    $scope.select_country = {\r\n        onSelect: function (item) {\r\n            $scope.frm1.country = item.id;\r\n        }\r\n    };\r\n    $scope.select_nationality = {\r\n        onSelect: function (item) {\r\n            $scope.frm1.nationality = item.id;\r\n        }\r\n    };\r\n    $scope.cstatus = [\r\n        {id: 1, name: 'Single'},\r\n        {id: 2, name: 'Married'},\r\n        {id: 3, name: 'Legally separated'},\r\n        {id: 4, name: 'Annulled'},\r\n        {id: 5, name: 'Widow'},\r\n        {id: 6, name: 'Widower'}\r\n    ];\r\n\r\n    $scope.imgForm = function(imgtarget){\r\n        $timeout(function(){\r\n            $scope.imgtarget = imgtarget;\r\n        }, 10);\r\n    }\r\n\r\n    $scope.img_coordinates = function(coordinates){\r\n        $scope.coordinates = coordinates;\r\n    }\r\n\r\n    $scope.cancelUpload = function(){\r\n        $scope.imgtarget = '';\r\n        angular.element('.upload').val('');\r\n        angular.element('#target').data('Jcrop').destroy();\r\n        angular.element('#target').attr('src', '');\r\n    }\r\n\r\n    $scope.uploadFile = function(files){\r\n        $http({\r\n            method: 'POST',\r\n            url: '/upload_dp',\r\n            headers: { 'Content-Type': undefined },\r\n            transformRequest: function (data) {\r\n                var fd = new FormData();\r\n\r\n                fd.append('coordinates', angular.toJson(data.coordinates));\r\n                angular.forEach(data.img_files, function(file){\r\n                   fd.append('file', file);\r\n                });\r\n                return fd;\r\n            },\r\n            data: {img_files: files, coordinates: $scope.coordinates}\r\n        }).then(function(result){\r\n            console.log(result.data);\r\n            \r\n            var msg = result.data;\r\n\r\n            if(!msg['dp']['success']){\r\n                $scope.msg = '';\r\n            }else{\r\n                $scope.msg = msg;\r\n                $scope.updateUsr();\r\n                $scope.timestamp();\r\n                $scope.cancelUpload();\r\n                angular.element('#cropModal').modal('hide');\r\n            }\r\n        });\r\n    }\r\n\r\n\r\n    $scope.deleteRecord = function(num){\r\n        $http({\r\n            method: 'POST',\r\n            url: '/delete_record',\r\n            headers: { 'Content-Type': undefined },\r\n            transformRequest: function (data) {\r\n                var fd = new FormData();\r\n\r\n                fd.append('num', angular.toJson(data.num));\r\n                return fd;\r\n            },\r\n            data: {num: num}\r\n        }).then(function(result){\r\n            var msg = result.data;\r\n            var msg_dtl = [];\r\n            if(msg['dpimg']){\r\n                msg_dtl = msg['dpimg']['dlt']['success'];\r\n            }\r\n            if(msg['rsm']){\r\n                msg_dtl = msg['rsm']['dlt']['success'];\r\n            }\r\n            if(!msg_dtl){\r\n                $scope.msg = '';\r\n            }else{\r\n                $scope.msg = msg;\r\n                $rootScope.usr = Usr.query();\r\n            }\r\n        });\r\n    }\r\n\r\n    $scope.clsbbl = function(num){\r\n        switch(num){\r\n            case 0:\r\n                $scope.dltdp = false;\r\n                break;\r\n            case 1:\r\n                $scope.dltrsm = false;\r\n                break;\r\n        }\r\n    }\r\n\r\n    angular.element('#edtprof_accrdn .card:nth-child(1) .collapse').collapse('show');\r\n    angular.element('#edtprof_accrdn .card .card-header').addClass('collapsed');\r\n    angular.element('#edtprof_accrdn .card:nth-child(1) .card-header').removeClass('collapsed');\r\n    angular.element('#edtprof_accrdn .card .collapse').collapse('hide');\r\n    var current_num = 1;\r\n\r\n    $scope.collapseTab = function(num){\r\n        if(!angular.element('#edtprof_accrdn .card:nth-child('+num+')').hasClass('disabled')){\r\n            angular.element('#edtprof_accrdn .card .collapse').collapse('hide');\r\n            angular.element('#edtprof_accrdn .card:nth-child('+num+') .collapse').collapse('show');\r\n            \r\n            if(current_num == num){\r\n                angular.element('#edtprof_accrdn .card:nth-child('+num+') .card-header').toggleClass('collapsed');\r\n            }else{\r\n                angular.element('#edtprof_accrdn .card .card-header').addClass('collapsed');\r\n                angular.element('#edtprof_accrdn .card:nth-child('+num+') .card-header').toggleClass('collapsed');\r\n            }\r\n            current_num = num;\r\n        }\r\n    }\r\n\r\n\r\n    $scope.summernote_options = {\r\n        toolbar: [\r\n                ['edit',['undo','redo']],\r\n                ['style', ['bold', 'italic', 'underline']],\r\n                ['alignment', ['ul', 'ol', 'paragraph', 'lineheight']]\r\n                \r\n            ]\r\n    };\r\n    $scope.makeSameAddress = function(check){\r\n        if(check == true){\r\n            $scope.frm2.prmnnt_addrss = angular.copy($scope.frm2.prsnt_addrss);\r\n        }\r\n    }\r\n    $scope.frm1_loader = false;\r\n    $scope.savePersonalInfo = function(frm1){\r\n        console.log(frm1);\r\n        $scope.frm1_loader = true;\r\n        $http({\r\n            method: 'POST',\r\n            url: '/user/save_personal_info',\r\n            headers: { 'Content-Type': undefined },\r\n            transformRequest: function (data) {\r\n                var fd = new FormData();\r\n                fd.append('user', angular.toJson(data.user));\r\n                return fd;\r\n            },\r\n            data: {user: frm1}\r\n        }).then(function(result){\r\n            $timeout(function(){\r\n                $scope.msg = result.data;\r\n                $scope.frm1_loader = false;\r\n                console.log($scope.msg);\r\n            }, 500);\r\n        });\r\n    }\r\n    \r\n    $scope.getAge = function(bday){\r\n        var current_date    = new Date();\r\n\r\n        var current_yr      = current_date.getFullYear();\r\n        var current_mo      = current_date.getMonth();\r\n\r\n        var bdate           = new Date(bday);\r\n        if ( Object.prototype.toString.call(bdate) === \"[object Date]\" ) {\r\n\r\n            if (!isNaN(bdate.getTime())){\r\n                var bdate_yr        = bdate.getFullYear();\r\n                var bdate_mo        = bdate.getMonth();\r\n                var your_yr         = current_yr - bdate_yr;\r\n                var your_mo         = current_mo - bdate_mo;\r\n                if(your_mo < 0 || (your_mo === 0 && current_date.getDate() < bdate.getDate())){\r\n                    your_yr--;\r\n                }\r\n\r\n                $scope.frm1.age = your_yr;\r\n                // console.log($scope.frm1.age);\r\n            }\r\n        }\r\n\r\n    }\r\n}]);\r\n\r\nusrContent.directive('fileInput', ['$parse', '$http', '$timeout',\r\n    function($parse, $http, $timeout){\r\n    return {\r\n        restrict: 'A',\r\n        link: function(scope, elm, attrs){\r\n            elm.bind('change', function(){\r\n                \r\n                var files = elm[0].files;\r\n                $parse(attrs.fileInput).assign(scope, files);\r\n                scope.$apply();\r\n                \r\n                scope.shw_avatarmdl = true;\r\n                scope.loader = true;\r\n\r\n                $http({\r\n                    method: 'POST',\r\n                    url: \"/validate_dp\",\r\n                    headers: { 'Content-Type': undefined },\r\n                    transformRequest: function (data) {\r\n                        var fd = new FormData();\r\n                        angular.forEach(data.img_files, function(file){\r\n                           fd.append('file', file);\r\n                        });\r\n                        return fd;\r\n                    },\r\n                    data: {img_files: files}\r\n                }).then(function(result){\r\n                    var msg = result.data;\r\n                    scope.shw_avatarmdl = false;\r\n                    \r\n                    if(!msg['dp']['error']['file']){\r\n                        angular.element('#cropModal').appendTo('body').modal({\r\n                            backdrop: 'static'\r\n                        });\r\n                        var file = files[0];\r\n                        (function(file) {\r\n                            var reader = new FileReader();\r\n                            reader.readAsDataURL(file);\r\n                            reader.onload = function(e) {\r\n                                var imgTarget = e.target.result;\r\n                                scope.imgForm(imgTarget);\r\n                            }\r\n                        }(file));\r\n                        scope.msg = '';\r\n                    }else{\r\n                        scope.msg = msg;\r\n                    }\r\n                });\r\n            });\r\n        }\r\n    }\r\n}]);\r\n\r\nusrContent.directive('fileResume', ['$parse', '$http', '$timeout',\r\n    function($parse, $http, $timeout){\r\n    return {\r\n        restrict: 'A',\r\n        link: function(scope, elm, attrs){\r\n            elm.bind('change', function(){\r\n                var files = elm[0].files;\r\n                $parse(attrs.fileResume).assign(scope, files);\r\n                scope.$apply();\r\n                \r\n                scope.resume_loader = true;\r\n\r\n                $http({\r\n                    method: 'POST',\r\n                    url: \"/upload_resume\",\r\n                    headers: { 'Content-Type': undefined },\r\n                    transformRequest: function (data) {\r\n                        var fd = new FormData();\r\n                        angular.forEach(data.resumefiles, function(file){\r\n                           fd.append('file', file);\r\n                        });\r\n                        return fd;\r\n                    },\r\n                    data: {resumefiles: files}\r\n                }).then(function(result){\r\n                    var msg = result.data;\r\n                    console.log(msg);\r\n                    $timeout(function(){\r\n                        scope.resume_loader = false;\r\n                        scope.updateUsr();\r\n                        if(!msg['resume']){\r\n                            scope.msg = '';\r\n                        }else{\r\n                            scope.msg = msg;\r\n                        }\r\n                        angular.element('.preview_resume .upload').val('');\r\n                        \r\n                    }, 500);\r\n                });\r\n            });\r\n        }\r\n    }\r\n}]);\r\n\r\n\r\nusrContent.directive('jpCustomCrop', ['$parse', '$rootScope', '$timeout', function($parse, $rootScope, $timeout){\r\n    return {\r\n        restrict: 'A',\r\n        link: function (scope, element, attrs)\r\n        {\r\n            $(function(){\r\n                $('#cropModal').on('shown.bs.modal', function () {\r\n                    \r\n                    $timeout(function(){\r\n                        scope.loader = false;\r\n                        $('.imgcropper, .prvw').hide().delay('200').fadeIn();\r\n                    }, 1000)\r\n                  var jcrop_api,\r\n                  boundx,\r\n                  boundy,\r\n\r\n                  // Grab some information about the preview pane\r\n                  $preview = $('.preview-pane'),\r\n                  $pcnt = $('.preview-pane .preview-container'),\r\n                  $pimg = $('.preview-pane .preview-container img'),\r\n                  xsize = $pcnt.width(),\r\n                  ysize = $pcnt.height();\r\n                  \r\n                  $('#target').Jcrop({\r\n                    boxWidth: 670,\r\n                    // boxHeight: 550,\r\n                    minSize: [ 100, 100 ],\r\n                    // maxSize: [ 450, 450 ],\r\n                    onChange: updatePreview,\r\n                    onSelect: updatePreview,\r\n                    aspectRatio: xsize / ysize\r\n                  },function(){\r\n                    // Use the API to get the real image size\r\n                    var bounds = this.getBounds();\r\n                    boundx = bounds[0];\r\n                    boundy = bounds[1];\r\n                    \r\n                    // Store the API in the jcrop_api variable\r\n                    jcrop_api = this;\r\n                    jcrop_api.animateTo([510, 300, 190, 100]);\r\n                  });\r\n\r\n                    function updatePreview(c){\r\n                        var imgx = Math.round(c.x);\r\n                        var imgy = Math.round(c.y);\r\n                        var imgw = Math.round(c.w);\r\n                        var imgh = Math.round(c.h);\r\n                        var imgw2 = xsize;\r\n                        var imgh2 = ysize;\r\n                        scope.img_coordinates({imgx: imgx, imgy: imgy, imgw: imgw, imgh: imgh, imgw2: imgw2, imgh2: imgh2});\r\n                        if (parseInt(c.w) > 0){\r\n                          var rx = xsize / c.w;\r\n                          var ry = ysize / c.h;\r\n                          $pimg.css({\r\n                            width: Math.round(rx * boundx) + 'px',\r\n                            height: Math.round(ry * boundy) + 'px',\r\n                            marginLeft: '-' + Math.round(rx * c.x) + 'px',\r\n                            marginTop: '-' + Math.round(ry * c.y) + 'px'\r\n                          });\r\n                        }\r\n                    };\r\n                })\r\n            });\r\n        }\r\n    };\r\n}]);//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC91c2VyL2VkaXRfcHJvZmlsZS5qcz8wYzNkIl0sInNvdXJjZXNDb250ZW50IjpbIid1c2Ugc3RyaWN0JzsgXHJcbnZhciB1c3JDb250ZW50ID0gYW5ndWxhci5tb2R1bGUoJ3VzckNvbnRlbnQnLCBbJ3N1bW1lcm5vdGUnLCAnQXhlbFNvZnQnXSk7XHJcblxyXG51c3JDb250ZW50LmNvbnRyb2xsZXIoJ2N0cmxFZGl0UHJvZmlsZScsIFsnJHNjb3BlJywgJyRyb290U2NvcGUnLCAnJGZpbHRlcicsICckdGltZW91dCcsICckaHR0cCcsICckcScsICdVc3InLCAnQ291bnRyaWVzJywgJ1BlcnNubEluZm8nLFxyXG4gICAgZnVuY3Rpb24oJHNjb3BlLCAkcm9vdFNjb3BlLCAkZmlsdGVyLCAkdGltZW91dCwgJGh0dHAsICRxLCBVc3IsIENvdW50cmllcywgUGVyc25sSW5mbykge1xyXG5cclxuICAgICRzY29wZS51cGRhdGVVc3IgPSBmdW5jdGlvbigpe1xyXG4gICAgICAgIFVzci5xdWVyeSgpLiRwcm9taXNlLnRoZW4oZnVuY3Rpb24oZGF0YSkge1xyXG4gICAgICAgICAgICAkcm9vdFNjb3BlLnVzciA9IGRhdGE7XHJcbiAgICAgICAgfSk7XHJcbiAgICB9XHJcbiAgICBcclxuICAgICRzY29wZS5jb3VudHJpZXMgICAgPSBDb3VudHJpZXMucXVlcnkoKTtcclxuICAgIFBlcnNubEluZm8ucXVlcnkoKS4kcHJvbWlzZS50aGVuKGZ1bmN0aW9uKGRhdGEpIHtcclxuICAgICAgICAkc2NvcGUuZnJtMSA9IGRhdGE7XHJcbiAgICAgICAgJHNjb3BlLmN2bHN0YXR1cyA9ICRzY29wZS5mcm0xLmNzdGF0dXM7XHJcbiAgICAgICAgJHNjb3BlLmNvdW50cnkgPSAkc2NvcGUuZnJtMS5jb3VudHJ5O1xyXG4gICAgICAgICRzY29wZS5uYXRpb25hbGl0eSA9ICRzY29wZS5mcm0xLm5hdGlvbmFsaXR5O1xyXG4gICAgfSk7XHJcbiAgICAkc2NvcGUuc2VsZWN0X3N0YXR1cyA9IHtcclxuICAgICAgICBvblNlbGVjdDogZnVuY3Rpb24gKGl0ZW0pIHtcclxuICAgICAgICAgICAgJHNjb3BlLmZybTEuY3N0YXR1cyA9IGl0ZW0uaWQ7XHJcbiAgICAgICAgfVxyXG4gICAgfTtcclxuICAgICRzY29wZS5zZWxlY3RfY291bnRyeSA9IHtcclxuICAgICAgICBvblNlbGVjdDogZnVuY3Rpb24gKGl0ZW0pIHtcclxuICAgICAgICAgICAgJHNjb3BlLmZybTEuY291bnRyeSA9IGl0ZW0uaWQ7XHJcbiAgICAgICAgfVxyXG4gICAgfTtcclxuICAgICRzY29wZS5zZWxlY3RfbmF0aW9uYWxpdHkgPSB7XHJcbiAgICAgICAgb25TZWxlY3Q6IGZ1bmN0aW9uIChpdGVtKSB7XHJcbiAgICAgICAgICAgICRzY29wZS5mcm0xLm5hdGlvbmFsaXR5ID0gaXRlbS5pZDtcclxuICAgICAgICB9XHJcbiAgICB9O1xyXG4gICAgJHNjb3BlLmNzdGF0dXMgPSBbXHJcbiAgICAgICAge2lkOiAxLCBuYW1lOiAnU2luZ2xlJ30sXHJcbiAgICAgICAge2lkOiAyLCBuYW1lOiAnTWFycmllZCd9LFxyXG4gICAgICAgIHtpZDogMywgbmFtZTogJ0xlZ2FsbHkgc2VwYXJhdGVkJ30sXHJcbiAgICAgICAge2lkOiA0LCBuYW1lOiAnQW5udWxsZWQnfSxcclxuICAgICAgICB7aWQ6IDUsIG5hbWU6ICdXaWRvdyd9LFxyXG4gICAgICAgIHtpZDogNiwgbmFtZTogJ1dpZG93ZXInfVxyXG4gICAgXTtcclxuXHJcbiAgICAkc2NvcGUuaW1nRm9ybSA9IGZ1bmN0aW9uKGltZ3RhcmdldCl7XHJcbiAgICAgICAgJHRpbWVvdXQoZnVuY3Rpb24oKXtcclxuICAgICAgICAgICAgJHNjb3BlLmltZ3RhcmdldCA9IGltZ3RhcmdldDtcclxuICAgICAgICB9LCAxMCk7XHJcbiAgICB9XHJcblxyXG4gICAgJHNjb3BlLmltZ19jb29yZGluYXRlcyA9IGZ1bmN0aW9uKGNvb3JkaW5hdGVzKXtcclxuICAgICAgICAkc2NvcGUuY29vcmRpbmF0ZXMgPSBjb29yZGluYXRlcztcclxuICAgIH1cclxuXHJcbiAgICAkc2NvcGUuY2FuY2VsVXBsb2FkID0gZnVuY3Rpb24oKXtcclxuICAgICAgICAkc2NvcGUuaW1ndGFyZ2V0ID0gJyc7XHJcbiAgICAgICAgYW5ndWxhci5lbGVtZW50KCcudXBsb2FkJykudmFsKCcnKTtcclxuICAgICAgICBhbmd1bGFyLmVsZW1lbnQoJyN0YXJnZXQnKS5kYXRhKCdKY3JvcCcpLmRlc3Ryb3koKTtcclxuICAgICAgICBhbmd1bGFyLmVsZW1lbnQoJyN0YXJnZXQnKS5hdHRyKCdzcmMnLCAnJyk7XHJcbiAgICB9XHJcblxyXG4gICAgJHNjb3BlLnVwbG9hZEZpbGUgPSBmdW5jdGlvbihmaWxlcyl7XHJcbiAgICAgICAgJGh0dHAoe1xyXG4gICAgICAgICAgICBtZXRob2Q6ICdQT1NUJyxcclxuICAgICAgICAgICAgdXJsOiAnL3VwbG9hZF9kcCcsXHJcbiAgICAgICAgICAgIGhlYWRlcnM6IHsgJ0NvbnRlbnQtVHlwZSc6IHVuZGVmaW5lZCB9LFxyXG4gICAgICAgICAgICB0cmFuc2Zvcm1SZXF1ZXN0OiBmdW5jdGlvbiAoZGF0YSkge1xyXG4gICAgICAgICAgICAgICAgdmFyIGZkID0gbmV3IEZvcm1EYXRhKCk7XHJcblxyXG4gICAgICAgICAgICAgICAgZmQuYXBwZW5kKCdjb29yZGluYXRlcycsIGFuZ3VsYXIudG9Kc29uKGRhdGEuY29vcmRpbmF0ZXMpKTtcclxuICAgICAgICAgICAgICAgIGFuZ3VsYXIuZm9yRWFjaChkYXRhLmltZ19maWxlcywgZnVuY3Rpb24oZmlsZSl7XHJcbiAgICAgICAgICAgICAgICAgICBmZC5hcHBlbmQoJ2ZpbGUnLCBmaWxlKTtcclxuICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgcmV0dXJuIGZkO1xyXG4gICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICBkYXRhOiB7aW1nX2ZpbGVzOiBmaWxlcywgY29vcmRpbmF0ZXM6ICRzY29wZS5jb29yZGluYXRlc31cclxuICAgICAgICB9KS50aGVuKGZ1bmN0aW9uKHJlc3VsdCl7XHJcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKHJlc3VsdC5kYXRhKTtcclxuICAgICAgICAgICAgXHJcbiAgICAgICAgICAgIHZhciBtc2cgPSByZXN1bHQuZGF0YTtcclxuXHJcbiAgICAgICAgICAgIGlmKCFtc2dbJ2RwJ11bJ3N1Y2Nlc3MnXSl7XHJcbiAgICAgICAgICAgICAgICAkc2NvcGUubXNnID0gJyc7XHJcbiAgICAgICAgICAgIH1lbHNle1xyXG4gICAgICAgICAgICAgICAgJHNjb3BlLm1zZyA9IG1zZztcclxuICAgICAgICAgICAgICAgICRzY29wZS51cGRhdGVVc3IoKTtcclxuICAgICAgICAgICAgICAgICRzY29wZS50aW1lc3RhbXAoKTtcclxuICAgICAgICAgICAgICAgICRzY29wZS5jYW5jZWxVcGxvYWQoKTtcclxuICAgICAgICAgICAgICAgIGFuZ3VsYXIuZWxlbWVudCgnI2Nyb3BNb2RhbCcpLm1vZGFsKCdoaWRlJyk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcblxyXG4gICAgJHNjb3BlLmRlbGV0ZVJlY29yZCA9IGZ1bmN0aW9uKG51bSl7XHJcbiAgICAgICAgJGh0dHAoe1xyXG4gICAgICAgICAgICBtZXRob2Q6ICdQT1NUJyxcclxuICAgICAgICAgICAgdXJsOiAnL2RlbGV0ZV9yZWNvcmQnLFxyXG4gICAgICAgICAgICBoZWFkZXJzOiB7ICdDb250ZW50LVR5cGUnOiB1bmRlZmluZWQgfSxcclxuICAgICAgICAgICAgdHJhbnNmb3JtUmVxdWVzdDogZnVuY3Rpb24gKGRhdGEpIHtcclxuICAgICAgICAgICAgICAgIHZhciBmZCA9IG5ldyBGb3JtRGF0YSgpO1xyXG5cclxuICAgICAgICAgICAgICAgIGZkLmFwcGVuZCgnbnVtJywgYW5ndWxhci50b0pzb24oZGF0YS5udW0pKTtcclxuICAgICAgICAgICAgICAgIHJldHVybiBmZDtcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgZGF0YToge251bTogbnVtfVxyXG4gICAgICAgIH0pLnRoZW4oZnVuY3Rpb24ocmVzdWx0KXtcclxuICAgICAgICAgICAgdmFyIG1zZyA9IHJlc3VsdC5kYXRhO1xyXG4gICAgICAgICAgICB2YXIgbXNnX2R0bCA9IFtdO1xyXG4gICAgICAgICAgICBpZihtc2dbJ2RwaW1nJ10pe1xyXG4gICAgICAgICAgICAgICAgbXNnX2R0bCA9IG1zZ1snZHBpbWcnXVsnZGx0J11bJ3N1Y2Nlc3MnXTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICBpZihtc2dbJ3JzbSddKXtcclxuICAgICAgICAgICAgICAgIG1zZ19kdGwgPSBtc2dbJ3JzbSddWydkbHQnXVsnc3VjY2VzcyddO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIGlmKCFtc2dfZHRsKXtcclxuICAgICAgICAgICAgICAgICRzY29wZS5tc2cgPSAnJztcclxuICAgICAgICAgICAgfWVsc2V7XHJcbiAgICAgICAgICAgICAgICAkc2NvcGUubXNnID0gbXNnO1xyXG4gICAgICAgICAgICAgICAgJHJvb3RTY29wZS51c3IgPSBVc3IucXVlcnkoKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxuICAgICRzY29wZS5jbHNiYmwgPSBmdW5jdGlvbihudW0pe1xyXG4gICAgICAgIHN3aXRjaChudW0pe1xyXG4gICAgICAgICAgICBjYXNlIDA6XHJcbiAgICAgICAgICAgICAgICAkc2NvcGUuZGx0ZHAgPSBmYWxzZTtcclxuICAgICAgICAgICAgICAgIGJyZWFrO1xyXG4gICAgICAgICAgICBjYXNlIDE6XHJcbiAgICAgICAgICAgICAgICAkc2NvcGUuZGx0cnNtID0gZmFsc2U7XHJcbiAgICAgICAgICAgICAgICBicmVhaztcclxuICAgICAgICB9XHJcbiAgICB9XHJcblxyXG4gICAgYW5ndWxhci5lbGVtZW50KCcjZWR0cHJvZl9hY2NyZG4gLmNhcmQ6bnRoLWNoaWxkKDEpIC5jb2xsYXBzZScpLmNvbGxhcHNlKCdzaG93Jyk7XHJcbiAgICBhbmd1bGFyLmVsZW1lbnQoJyNlZHRwcm9mX2FjY3JkbiAuY2FyZCAuY2FyZC1oZWFkZXInKS5hZGRDbGFzcygnY29sbGFwc2VkJyk7XHJcbiAgICBhbmd1bGFyLmVsZW1lbnQoJyNlZHRwcm9mX2FjY3JkbiAuY2FyZDpudGgtY2hpbGQoMSkgLmNhcmQtaGVhZGVyJykucmVtb3ZlQ2xhc3MoJ2NvbGxhcHNlZCcpO1xyXG4gICAgYW5ndWxhci5lbGVtZW50KCcjZWR0cHJvZl9hY2NyZG4gLmNhcmQgLmNvbGxhcHNlJykuY29sbGFwc2UoJ2hpZGUnKTtcclxuICAgIHZhciBjdXJyZW50X251bSA9IDE7XHJcblxyXG4gICAgJHNjb3BlLmNvbGxhcHNlVGFiID0gZnVuY3Rpb24obnVtKXtcclxuICAgICAgICBpZighYW5ndWxhci5lbGVtZW50KCcjZWR0cHJvZl9hY2NyZG4gLmNhcmQ6bnRoLWNoaWxkKCcrbnVtKycpJykuaGFzQ2xhc3MoJ2Rpc2FibGVkJykpe1xyXG4gICAgICAgICAgICBhbmd1bGFyLmVsZW1lbnQoJyNlZHRwcm9mX2FjY3JkbiAuY2FyZCAuY29sbGFwc2UnKS5jb2xsYXBzZSgnaGlkZScpO1xyXG4gICAgICAgICAgICBhbmd1bGFyLmVsZW1lbnQoJyNlZHRwcm9mX2FjY3JkbiAuY2FyZDpudGgtY2hpbGQoJytudW0rJykgLmNvbGxhcHNlJykuY29sbGFwc2UoJ3Nob3cnKTtcclxuICAgICAgICAgICAgXHJcbiAgICAgICAgICAgIGlmKGN1cnJlbnRfbnVtID09IG51bSl7XHJcbiAgICAgICAgICAgICAgICBhbmd1bGFyLmVsZW1lbnQoJyNlZHRwcm9mX2FjY3JkbiAuY2FyZDpudGgtY2hpbGQoJytudW0rJykgLmNhcmQtaGVhZGVyJykudG9nZ2xlQ2xhc3MoJ2NvbGxhcHNlZCcpO1xyXG4gICAgICAgICAgICB9ZWxzZXtcclxuICAgICAgICAgICAgICAgIGFuZ3VsYXIuZWxlbWVudCgnI2VkdHByb2ZfYWNjcmRuIC5jYXJkIC5jYXJkLWhlYWRlcicpLmFkZENsYXNzKCdjb2xsYXBzZWQnKTtcclxuICAgICAgICAgICAgICAgIGFuZ3VsYXIuZWxlbWVudCgnI2VkdHByb2ZfYWNjcmRuIC5jYXJkOm50aC1jaGlsZCgnK251bSsnKSAuY2FyZC1oZWFkZXInKS50b2dnbGVDbGFzcygnY29sbGFwc2VkJyk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgY3VycmVudF9udW0gPSBudW07XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG5cclxuXHJcbiAgICAkc2NvcGUuc3VtbWVybm90ZV9vcHRpb25zID0ge1xyXG4gICAgICAgIHRvb2xiYXI6IFtcclxuICAgICAgICAgICAgICAgIFsnZWRpdCcsWyd1bmRvJywncmVkbyddXSxcclxuICAgICAgICAgICAgICAgIFsnc3R5bGUnLCBbJ2JvbGQnLCAnaXRhbGljJywgJ3VuZGVybGluZSddXSxcclxuICAgICAgICAgICAgICAgIFsnYWxpZ25tZW50JywgWyd1bCcsICdvbCcsICdwYXJhZ3JhcGgnLCAnbGluZWhlaWdodCddXVxyXG4gICAgICAgICAgICAgICAgXHJcbiAgICAgICAgICAgIF1cclxuICAgIH07XHJcbiAgICAkc2NvcGUubWFrZVNhbWVBZGRyZXNzID0gZnVuY3Rpb24oY2hlY2spe1xyXG4gICAgICAgIGlmKGNoZWNrID09IHRydWUpe1xyXG4gICAgICAgICAgICAkc2NvcGUuZnJtMi5wcm1ubnRfYWRkcnNzID0gYW5ndWxhci5jb3B5KCRzY29wZS5mcm0yLnByc250X2FkZHJzcyk7XHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG4gICAgJHNjb3BlLmZybTFfbG9hZGVyID0gZmFsc2U7XHJcbiAgICAkc2NvcGUuc2F2ZVBlcnNvbmFsSW5mbyA9IGZ1bmN0aW9uKGZybTEpe1xyXG4gICAgICAgIGNvbnNvbGUubG9nKGZybTEpO1xyXG4gICAgICAgICRzY29wZS5mcm0xX2xvYWRlciA9IHRydWU7XHJcbiAgICAgICAgJGh0dHAoe1xyXG4gICAgICAgICAgICBtZXRob2Q6ICdQT1NUJyxcclxuICAgICAgICAgICAgdXJsOiAnL3VzZXIvc2F2ZV9wZXJzb25hbF9pbmZvJyxcclxuICAgICAgICAgICAgaGVhZGVyczogeyAnQ29udGVudC1UeXBlJzogdW5kZWZpbmVkIH0sXHJcbiAgICAgICAgICAgIHRyYW5zZm9ybVJlcXVlc3Q6IGZ1bmN0aW9uIChkYXRhKSB7XHJcbiAgICAgICAgICAgICAgICB2YXIgZmQgPSBuZXcgRm9ybURhdGEoKTtcclxuICAgICAgICAgICAgICAgIGZkLmFwcGVuZCgndXNlcicsIGFuZ3VsYXIudG9Kc29uKGRhdGEudXNlcikpO1xyXG4gICAgICAgICAgICAgICAgcmV0dXJuIGZkO1xyXG4gICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICBkYXRhOiB7dXNlcjogZnJtMX1cclxuICAgICAgICB9KS50aGVuKGZ1bmN0aW9uKHJlc3VsdCl7XHJcbiAgICAgICAgICAgICR0aW1lb3V0KGZ1bmN0aW9uKCl7XHJcbiAgICAgICAgICAgICAgICAkc2NvcGUubXNnID0gcmVzdWx0LmRhdGE7XHJcbiAgICAgICAgICAgICAgICAkc2NvcGUuZnJtMV9sb2FkZXIgPSBmYWxzZTtcclxuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKCRzY29wZS5tc2cpO1xyXG4gICAgICAgICAgICB9LCA1MDApO1xyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG4gICAgXHJcbiAgICAkc2NvcGUuZ2V0QWdlID0gZnVuY3Rpb24oYmRheSl7XHJcbiAgICAgICAgdmFyIGN1cnJlbnRfZGF0ZSAgICA9IG5ldyBEYXRlKCk7XHJcblxyXG4gICAgICAgIHZhciBjdXJyZW50X3lyICAgICAgPSBjdXJyZW50X2RhdGUuZ2V0RnVsbFllYXIoKTtcclxuICAgICAgICB2YXIgY3VycmVudF9tbyAgICAgID0gY3VycmVudF9kYXRlLmdldE1vbnRoKCk7XHJcblxyXG4gICAgICAgIHZhciBiZGF0ZSAgICAgICAgICAgPSBuZXcgRGF0ZShiZGF5KTtcclxuICAgICAgICBpZiAoIE9iamVjdC5wcm90b3R5cGUudG9TdHJpbmcuY2FsbChiZGF0ZSkgPT09IFwiW29iamVjdCBEYXRlXVwiICkge1xyXG5cclxuICAgICAgICAgICAgaWYgKCFpc05hTihiZGF0ZS5nZXRUaW1lKCkpKXtcclxuICAgICAgICAgICAgICAgIHZhciBiZGF0ZV95ciAgICAgICAgPSBiZGF0ZS5nZXRGdWxsWWVhcigpO1xyXG4gICAgICAgICAgICAgICAgdmFyIGJkYXRlX21vICAgICAgICA9IGJkYXRlLmdldE1vbnRoKCk7XHJcbiAgICAgICAgICAgICAgICB2YXIgeW91cl95ciAgICAgICAgID0gY3VycmVudF95ciAtIGJkYXRlX3lyO1xyXG4gICAgICAgICAgICAgICAgdmFyIHlvdXJfbW8gICAgICAgICA9IGN1cnJlbnRfbW8gLSBiZGF0ZV9tbztcclxuICAgICAgICAgICAgICAgIGlmKHlvdXJfbW8gPCAwIHx8ICh5b3VyX21vID09PSAwICYmIGN1cnJlbnRfZGF0ZS5nZXREYXRlKCkgPCBiZGF0ZS5nZXREYXRlKCkpKXtcclxuICAgICAgICAgICAgICAgICAgICB5b3VyX3lyLS07XHJcbiAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgJHNjb3BlLmZybTEuYWdlID0geW91cl95cjtcclxuICAgICAgICAgICAgICAgIC8vIGNvbnNvbGUubG9nKCRzY29wZS5mcm0xLmFnZSk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcblxyXG4gICAgfVxyXG59XSk7XHJcblxyXG51c3JDb250ZW50LmRpcmVjdGl2ZSgnZmlsZUlucHV0JywgWyckcGFyc2UnLCAnJGh0dHAnLCAnJHRpbWVvdXQnLFxyXG4gICAgZnVuY3Rpb24oJHBhcnNlLCAkaHR0cCwgJHRpbWVvdXQpe1xyXG4gICAgcmV0dXJuIHtcclxuICAgICAgICByZXN0cmljdDogJ0EnLFxyXG4gICAgICAgIGxpbms6IGZ1bmN0aW9uKHNjb3BlLCBlbG0sIGF0dHJzKXtcclxuICAgICAgICAgICAgZWxtLmJpbmQoJ2NoYW5nZScsIGZ1bmN0aW9uKCl7XHJcbiAgICAgICAgICAgICAgICBcclxuICAgICAgICAgICAgICAgIHZhciBmaWxlcyA9IGVsbVswXS5maWxlcztcclxuICAgICAgICAgICAgICAgICRwYXJzZShhdHRycy5maWxlSW5wdXQpLmFzc2lnbihzY29wZSwgZmlsZXMpO1xyXG4gICAgICAgICAgICAgICAgc2NvcGUuJGFwcGx5KCk7XHJcbiAgICAgICAgICAgICAgICBcclxuICAgICAgICAgICAgICAgIHNjb3BlLnNod19hdmF0YXJtZGwgPSB0cnVlO1xyXG4gICAgICAgICAgICAgICAgc2NvcGUubG9hZGVyID0gdHJ1ZTtcclxuXHJcbiAgICAgICAgICAgICAgICAkaHR0cCh7XHJcbiAgICAgICAgICAgICAgICAgICAgbWV0aG9kOiAnUE9TVCcsXHJcbiAgICAgICAgICAgICAgICAgICAgdXJsOiBcIi92YWxpZGF0ZV9kcFwiLFxyXG4gICAgICAgICAgICAgICAgICAgIGhlYWRlcnM6IHsgJ0NvbnRlbnQtVHlwZSc6IHVuZGVmaW5lZCB9LFxyXG4gICAgICAgICAgICAgICAgICAgIHRyYW5zZm9ybVJlcXVlc3Q6IGZ1bmN0aW9uIChkYXRhKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhciBmZCA9IG5ldyBGb3JtRGF0YSgpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBhbmd1bGFyLmZvckVhY2goZGF0YS5pbWdfZmlsZXMsIGZ1bmN0aW9uKGZpbGUpe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICBmZC5hcHBlbmQoJ2ZpbGUnLCBmaWxlKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHJldHVybiBmZDtcclxuICAgICAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgICAgIGRhdGE6IHtpbWdfZmlsZXM6IGZpbGVzfVxyXG4gICAgICAgICAgICAgICAgfSkudGhlbihmdW5jdGlvbihyZXN1bHQpe1xyXG4gICAgICAgICAgICAgICAgICAgIHZhciBtc2cgPSByZXN1bHQuZGF0YTtcclxuICAgICAgICAgICAgICAgICAgICBzY29wZS5zaHdfYXZhdGFybWRsID0gZmFsc2U7XHJcbiAgICAgICAgICAgICAgICAgICAgXHJcbiAgICAgICAgICAgICAgICAgICAgaWYoIW1zZ1snZHAnXVsnZXJyb3InXVsnZmlsZSddKXtcclxuICAgICAgICAgICAgICAgICAgICAgICAgYW5ndWxhci5lbGVtZW50KCcjY3JvcE1vZGFsJykuYXBwZW5kVG8oJ2JvZHknKS5tb2RhbCh7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBiYWNrZHJvcDogJ3N0YXRpYydcclxuICAgICAgICAgICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhciBmaWxlID0gZmlsZXNbMF07XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIChmdW5jdGlvbihmaWxlKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB2YXIgcmVhZGVyID0gbmV3IEZpbGVSZWFkZXIoKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHJlYWRlci5yZWFkQXNEYXRhVVJMKGZpbGUpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgcmVhZGVyLm9ubG9hZCA9IGZ1bmN0aW9uKGUpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB2YXIgaW1nVGFyZ2V0ID0gZS50YXJnZXQucmVzdWx0O1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHNjb3BlLmltZ0Zvcm0oaW1nVGFyZ2V0KTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgfShmaWxlKSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHNjb3BlLm1zZyA9ICcnO1xyXG4gICAgICAgICAgICAgICAgICAgIH1lbHNle1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBzY29wZS5tc2cgPSBtc2c7XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgIH1cclxuICAgIH1cclxufV0pO1xyXG5cclxudXNyQ29udGVudC5kaXJlY3RpdmUoJ2ZpbGVSZXN1bWUnLCBbJyRwYXJzZScsICckaHR0cCcsICckdGltZW91dCcsXHJcbiAgICBmdW5jdGlvbigkcGFyc2UsICRodHRwLCAkdGltZW91dCl7XHJcbiAgICByZXR1cm4ge1xyXG4gICAgICAgIHJlc3RyaWN0OiAnQScsXHJcbiAgICAgICAgbGluazogZnVuY3Rpb24oc2NvcGUsIGVsbSwgYXR0cnMpe1xyXG4gICAgICAgICAgICBlbG0uYmluZCgnY2hhbmdlJywgZnVuY3Rpb24oKXtcclxuICAgICAgICAgICAgICAgIHZhciBmaWxlcyA9IGVsbVswXS5maWxlcztcclxuICAgICAgICAgICAgICAgICRwYXJzZShhdHRycy5maWxlUmVzdW1lKS5hc3NpZ24oc2NvcGUsIGZpbGVzKTtcclxuICAgICAgICAgICAgICAgIHNjb3BlLiRhcHBseSgpO1xyXG4gICAgICAgICAgICAgICAgXHJcbiAgICAgICAgICAgICAgICBzY29wZS5yZXN1bWVfbG9hZGVyID0gdHJ1ZTtcclxuXHJcbiAgICAgICAgICAgICAgICAkaHR0cCh7XHJcbiAgICAgICAgICAgICAgICAgICAgbWV0aG9kOiAnUE9TVCcsXHJcbiAgICAgICAgICAgICAgICAgICAgdXJsOiBcIi91cGxvYWRfcmVzdW1lXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgaGVhZGVyczogeyAnQ29udGVudC1UeXBlJzogdW5kZWZpbmVkIH0sXHJcbiAgICAgICAgICAgICAgICAgICAgdHJhbnNmb3JtUmVxdWVzdDogZnVuY3Rpb24gKGRhdGEpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdmFyIGZkID0gbmV3IEZvcm1EYXRhKCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGFuZ3VsYXIuZm9yRWFjaChkYXRhLnJlc3VtZWZpbGVzLCBmdW5jdGlvbihmaWxlKXtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgZmQuYXBwZW5kKCdmaWxlJywgZmlsZSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICByZXR1cm4gZmQ7XHJcbiAgICAgICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgICAgICBkYXRhOiB7cmVzdW1lZmlsZXM6IGZpbGVzfVxyXG4gICAgICAgICAgICAgICAgfSkudGhlbihmdW5jdGlvbihyZXN1bHQpe1xyXG4gICAgICAgICAgICAgICAgICAgIHZhciBtc2cgPSByZXN1bHQuZGF0YTtcclxuICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhtc2cpO1xyXG4gICAgICAgICAgICAgICAgICAgICR0aW1lb3V0KGZ1bmN0aW9uKCl7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHNjb3BlLnJlc3VtZV9sb2FkZXIgPSBmYWxzZTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgc2NvcGUudXBkYXRlVXNyKCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGlmKCFtc2dbJ3Jlc3VtZSddKXtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHNjb3BlLm1zZyA9ICcnO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB9ZWxzZXtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHNjb3BlLm1zZyA9IG1zZztcclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICBhbmd1bGFyLmVsZW1lbnQoJy5wcmV2aWV3X3Jlc3VtZSAudXBsb2FkJykudmFsKCcnKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgXHJcbiAgICAgICAgICAgICAgICAgICAgfSwgNTAwKTtcclxuICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9XHJcbiAgICB9XHJcbn1dKTtcclxuXHJcblxyXG51c3JDb250ZW50LmRpcmVjdGl2ZSgnanBDdXN0b21Dcm9wJywgWyckcGFyc2UnLCAnJHJvb3RTY29wZScsICckdGltZW91dCcsIGZ1bmN0aW9uKCRwYXJzZSwgJHJvb3RTY29wZSwgJHRpbWVvdXQpe1xyXG4gICAgcmV0dXJuIHtcclxuICAgICAgICByZXN0cmljdDogJ0EnLFxyXG4gICAgICAgIGxpbms6IGZ1bmN0aW9uIChzY29wZSwgZWxlbWVudCwgYXR0cnMpXHJcbiAgICAgICAge1xyXG4gICAgICAgICAgICAkKGZ1bmN0aW9uKCl7XHJcbiAgICAgICAgICAgICAgICAkKCcjY3JvcE1vZGFsJykub24oJ3Nob3duLmJzLm1vZGFsJywgZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAgICAgICAgIFxyXG4gICAgICAgICAgICAgICAgICAgICR0aW1lb3V0KGZ1bmN0aW9uKCl7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHNjb3BlLmxvYWRlciA9IGZhbHNlO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAkKCcuaW1nY3JvcHBlciwgLnBydncnKS5oaWRlKCkuZGVsYXkoJzIwMCcpLmZhZGVJbigpO1xyXG4gICAgICAgICAgICAgICAgICAgIH0sIDEwMDApXHJcbiAgICAgICAgICAgICAgICAgIHZhciBqY3JvcF9hcGksXHJcbiAgICAgICAgICAgICAgICAgIGJvdW5keCxcclxuICAgICAgICAgICAgICAgICAgYm91bmR5LFxyXG5cclxuICAgICAgICAgICAgICAgICAgLy8gR3JhYiBzb21lIGluZm9ybWF0aW9uIGFib3V0IHRoZSBwcmV2aWV3IHBhbmVcclxuICAgICAgICAgICAgICAgICAgJHByZXZpZXcgPSAkKCcucHJldmlldy1wYW5lJyksXHJcbiAgICAgICAgICAgICAgICAgICRwY250ID0gJCgnLnByZXZpZXctcGFuZSAucHJldmlldy1jb250YWluZXInKSxcclxuICAgICAgICAgICAgICAgICAgJHBpbWcgPSAkKCcucHJldmlldy1wYW5lIC5wcmV2aWV3LWNvbnRhaW5lciBpbWcnKSxcclxuICAgICAgICAgICAgICAgICAgeHNpemUgPSAkcGNudC53aWR0aCgpLFxyXG4gICAgICAgICAgICAgICAgICB5c2l6ZSA9ICRwY250LmhlaWdodCgpO1xyXG4gICAgICAgICAgICAgICAgICBcclxuICAgICAgICAgICAgICAgICAgJCgnI3RhcmdldCcpLkpjcm9wKHtcclxuICAgICAgICAgICAgICAgICAgICBib3hXaWR0aDogNjcwLFxyXG4gICAgICAgICAgICAgICAgICAgIC8vIGJveEhlaWdodDogNTUwLFxyXG4gICAgICAgICAgICAgICAgICAgIG1pblNpemU6IFsgMTAwLCAxMDAgXSxcclxuICAgICAgICAgICAgICAgICAgICAvLyBtYXhTaXplOiBbIDQ1MCwgNDUwIF0sXHJcbiAgICAgICAgICAgICAgICAgICAgb25DaGFuZ2U6IHVwZGF0ZVByZXZpZXcsXHJcbiAgICAgICAgICAgICAgICAgICAgb25TZWxlY3Q6IHVwZGF0ZVByZXZpZXcsXHJcbiAgICAgICAgICAgICAgICAgICAgYXNwZWN0UmF0aW86IHhzaXplIC8geXNpemVcclxuICAgICAgICAgICAgICAgICAgfSxmdW5jdGlvbigpe1xyXG4gICAgICAgICAgICAgICAgICAgIC8vIFVzZSB0aGUgQVBJIHRvIGdldCB0aGUgcmVhbCBpbWFnZSBzaXplXHJcbiAgICAgICAgICAgICAgICAgICAgdmFyIGJvdW5kcyA9IHRoaXMuZ2V0Qm91bmRzKCk7XHJcbiAgICAgICAgICAgICAgICAgICAgYm91bmR4ID0gYm91bmRzWzBdO1xyXG4gICAgICAgICAgICAgICAgICAgIGJvdW5keSA9IGJvdW5kc1sxXTtcclxuICAgICAgICAgICAgICAgICAgICBcclxuICAgICAgICAgICAgICAgICAgICAvLyBTdG9yZSB0aGUgQVBJIGluIHRoZSBqY3JvcF9hcGkgdmFyaWFibGVcclxuICAgICAgICAgICAgICAgICAgICBqY3JvcF9hcGkgPSB0aGlzO1xyXG4gICAgICAgICAgICAgICAgICAgIGpjcm9wX2FwaS5hbmltYXRlVG8oWzUxMCwgMzAwLCAxOTAsIDEwMF0pO1xyXG4gICAgICAgICAgICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgZnVuY3Rpb24gdXBkYXRlUHJldmlldyhjKXtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdmFyIGltZ3ggPSBNYXRoLnJvdW5kKGMueCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhciBpbWd5ID0gTWF0aC5yb3VuZChjLnkpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB2YXIgaW1ndyA9IE1hdGgucm91bmQoYy53KTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdmFyIGltZ2ggPSBNYXRoLnJvdW5kKGMuaCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhciBpbWd3MiA9IHhzaXplO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB2YXIgaW1naDIgPSB5c2l6ZTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgc2NvcGUuaW1nX2Nvb3JkaW5hdGVzKHtpbWd4LCBpbWd5LCBpbWd3LCBpbWdoLCBpbWd3MiwgaW1naDJ9KTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKHBhcnNlSW50KGMudykgPiAwKXtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICB2YXIgcnggPSB4c2l6ZSAvIGMudztcclxuICAgICAgICAgICAgICAgICAgICAgICAgICB2YXIgcnkgPSB5c2l6ZSAvIGMuaDtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAkcGltZy5jc3Moe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgd2lkdGg6IE1hdGgucm91bmQocnggKiBib3VuZHgpICsgJ3B4JyxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGhlaWdodDogTWF0aC5yb3VuZChyeSAqIGJvdW5keSkgKyAncHgnLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgbWFyZ2luTGVmdDogJy0nICsgTWF0aC5yb3VuZChyeCAqIGMueCkgKyAncHgnLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgbWFyZ2luVG9wOiAnLScgKyBNYXRoLnJvdW5kKHJ5ICogYy55KSArICdweCdcclxuICAgICAgICAgICAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIH07XHJcbiAgICAgICAgICAgICAgICB9KVxyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9XHJcbiAgICB9O1xyXG59XSk7XG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHJlc291cmNlcy9hc3NldHMvanMvYXBwL3VzZXIvZWRpdF9wcm9maWxlLmpzIl0sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Iiwic291cmNlUm9vdCI6IiJ9");

/***/ }
/******/ ]);