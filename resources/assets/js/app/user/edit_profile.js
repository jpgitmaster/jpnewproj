'use strict'; 
var usrContent = angular.module('usrContent', ['summernote', 'AxelSoft']);

usrContent.controller('ctrlEditProfile', ['$scope', '$rootScope', '$timeout', '$http', '$q', 'Usr', 'Countries',
    function($scope, $rootScope, $timeout, $http, $q, Usr, Countries) {

    $scope.updateUsr = function(){
        Usr.query().$promise.then(function(data) {
            $rootScope.usr = data;
        });
    }
    
    $scope.countries = Countries.query();

    $scope.imgForm = function(imgtarget){
        $timeout(function(){
            $scope.imgtarget = imgtarget;
        }, 10);
    }

    $scope.img_coordinates = function(coordinates){
        $scope.coordinates = coordinates;
    }

    $scope.cancelUpload = function(){
        $scope.imgtarget = '';
        angular.element('.upload').val('');
        angular.element('#target').data('Jcrop').destroy();
        angular.element('#target').attr('src', '');
    }

    $scope.uploadFile = function(files){
        $http({
            method: 'POST',
            url: '/upload_dp',
            headers: { 'Content-Type': undefined },
            transformRequest: function (data) {
                var fd = new FormData();

                fd.append('coordinates', angular.toJson(data.coordinates));
                angular.forEach(data.img_files, function(file){
                   fd.append('file', file);
                });
                return fd;
            },
            data: {img_files: files, coordinates: $scope.coordinates}
        }).then(function(result){
            console.log(result.data);
            
            var msg = result.data;

            if(!msg['dp']['success']){
                $scope.msg = '';
            }else{
                $scope.msg = msg;
                $scope.updateUsr();
                $scope.timestamp();
                $scope.cancelUpload();
                angular.element('#cropModal').modal('hide');
            }
        });
    }


    $scope.deleteRecord = function(num){
        $http({
            method: 'POST',
            url: '/delete_record',
            headers: { 'Content-Type': undefined },
            transformRequest: function (data) {
                var fd = new FormData();

                fd.append('num', angular.toJson(data.num));
                return fd;
            },
            data: {num: num}
        }).then(function(result){
            var msg = result.data;
            var msg_dtl = [];
            if(msg['dpimg']){
                msg_dtl = msg['dpimg']['dlt']['success'];
            }
            if(msg['rsm']){
                msg_dtl = msg['rsm']['dlt']['success'];
            }
            if(!msg_dtl){
                $scope.msg = '';
            }else{
                $scope.msg = msg;
                $rootScope.usr = Usr.query();
            }
        });
    }

    $scope.clsbbl = function(num){
        switch(num){
            case 0:
                $scope.dltdp = false;
                break;
            case 1:
                $scope.dltrsm = false;
                break;
        }
    }

    angular.element('#edtprof_accrdn .card:nth-child(1) .collapse').collapse('show');
    angular.element('#edtprof_accrdn .card .card-header').addClass('collapsed');
    angular.element('#edtprof_accrdn .card:nth-child(1) .card-header').removeClass('collapsed');
    angular.element('#edtprof_accrdn .card .collapse').collapse('hide');
    var current_num = 1;

    $scope.collapseTab = function(num){
        if(!angular.element('#edtprof_accrdn .card:nth-child('+num+')').hasClass('disabled')){
            angular.element('#edtprof_accrdn .card .collapse').collapse('hide');
            angular.element('#edtprof_accrdn .card:nth-child('+num+') .collapse').collapse('show');
            
            if(current_num == num){
                angular.element('#edtprof_accrdn .card:nth-child('+num+') .card-header').toggleClass('collapsed');
            }else{
                angular.element('#edtprof_accrdn .card .card-header').addClass('collapsed');
                angular.element('#edtprof_accrdn .card:nth-child('+num+') .card-header').toggleClass('collapsed');
            }
            current_num = num;
        }
    }


    $scope.summernote_options = {
        toolbar: [
                ['edit',['undo','redo']],
                ['style', ['bold', 'italic', 'underline']],
                ['alignment', ['ul', 'ol', 'paragraph', 'lineheight']]
                
            ]
    };
    $scope.makeSameAddress = function(check){
        if(check == true){
            $scope.frm2.prmnnt_addrss = angular.copy($scope.frm2.prsnt_addrss);
        }
    }

    $scope.savePersonalInfo = function(frm1){
        // console.log(frm1);
        $http({
            method: 'POST',
            url: '/user/save_personal_info',
            headers: { 'Content-Type': undefined },
            transformRequest: function (data) {
                var fd = new FormData();
                fd.append('user', angular.toJson(data.user));
                return fd;
            },
            data: {user: frm1}
        }).then(function(result){
            $scope.msg = result.data;
            console.log($scope.msg);
        });
    }

    $scope.cstatus = [
        {id: 1, name: 'Single'},
        {id: 2, name: 'Married'},
        {id: 3, name: 'Legally separated'},
        {id: 4, name: 'Annulled'},
        {id: 5, name: 'Widow'},
        {id: 6, name: 'Widower'}
    ];

    $scope.getAge = function(bday){
        var current_date    = new Date();

        var current_yr          = current_date.getFullYear();
        var current_mo          = current_date.getMonth();
        
        var bdate           = new Date(bday);
        if ( Object.prototype.toString.call(bdate) === "[object Date]" ) {

            if (!isNaN(bdate.getTime())){
                var bdate_yr        = bdate.getFullYear();
                var bdate_mo        = bdate.getMonth();
                var your_yr         = current_yr - bdate_yr;
                var your_mo         = current_mo - bdate_mo;
                if(your_mo < 0 || (your_mo === 0 && current_date.getDate() < bdate.getDate())){
                    your_yr--;
                }

                $scope.frm1.age = your_yr;
                // console.log($scope.frm1.age);
            }
        }

    }
}]);

usrContent.directive('fileInput', ['$parse', '$http', '$timeout',
    function($parse, $http, $timeout){
    return {
        restrict: 'A',
        link: function(scope, elm, attrs){
            elm.bind('change', function(){
                
                var files = elm[0].files;
                $parse(attrs.fileInput).assign(scope, files);
                scope.$apply();
                
                scope.shw_avatarmdl = true;
                scope.loader = true;

                $http({
                    method: 'POST',
                    url: "/validate_dp",
                    headers: { 'Content-Type': undefined },
                    transformRequest: function (data) {
                        var fd = new FormData();
                        angular.forEach(data.img_files, function(file){
                           fd.append('file', file);
                        });
                        return fd;
                    },
                    data: {img_files: files}
                }).then(function(result){
                    var msg = result.data;
                    scope.shw_avatarmdl = false;
                    
                    if(!msg['dp']['error']['file']){
                        angular.element('#cropModal').appendTo('body').modal({
                            backdrop: 'static'
                        });
                        var file = files[0];
                        (function(file) {
                            var reader = new FileReader();
                            reader.readAsDataURL(file);
                            reader.onload = function(e) {
                                var imgTarget = e.target.result;
                                scope.imgForm(imgTarget);
                            }
                        }(file));
                        scope.msg = '';
                    }else{
                        scope.msg = msg;
                    }
                });
            });
        }
    }
}]);

usrContent.directive('fileResume', ['$parse', '$http', '$timeout',
    function($parse, $http, $timeout){
    return {
        restrict: 'A',
        link: function(scope, elm, attrs){
            elm.bind('change', function(){
                var files = elm[0].files;
                $parse(attrs.fileResume).assign(scope, files);
                scope.$apply();
                
                scope.resume_loader = true;

                $http({
                    method: 'POST',
                    url: "/upload_resume",
                    headers: { 'Content-Type': undefined },
                    transformRequest: function (data) {
                        var fd = new FormData();
                        angular.forEach(data.resumefiles, function(file){
                           fd.append('file', file);
                        });
                        return fd;
                    },
                    data: {resumefiles: files}
                }).then(function(result){
                    var msg = result.data;
                    console.log(msg);
                    $timeout(function(){
                        scope.resume_loader = false;
                        scope.updateUsr();
                        if(!msg['resume']){
                            scope.msg = '';
                        }else{
                            scope.msg = msg;
                        }
                        angular.element('.preview_resume .upload').val('');
                        
                    }, 500);
                });
            });
        }
    }
}]);


usrContent.directive('jpCustomCrop', ['$parse', '$rootScope', '$timeout', function($parse, $rootScope, $timeout){
    return {
        restrict: 'A',
        link: function (scope, element, attrs)
        {
            $(function(){
                $('#cropModal').on('shown.bs.modal', function () {
                    
                    $timeout(function(){
                        scope.loader = false;
                        $('.imgcropper, .prvw').hide().delay('200').fadeIn();
                    }, 1000)
                  var jcrop_api,
                  boundx,
                  boundy,

                  // Grab some information about the preview pane
                  $preview = $('.preview-pane'),
                  $pcnt = $('.preview-pane .preview-container'),
                  $pimg = $('.preview-pane .preview-container img'),
                  xsize = $pcnt.width(),
                  ysize = $pcnt.height();
                  
                  $('#target').Jcrop({
                    boxWidth: 670,
                    // boxHeight: 550,
                    minSize: [ 100, 100 ],
                    // maxSize: [ 450, 450 ],
                    onChange: updatePreview,
                    onSelect: updatePreview,
                    aspectRatio: xsize / ysize
                  },function(){
                    // Use the API to get the real image size
                    var bounds = this.getBounds();
                    boundx = bounds[0];
                    boundy = bounds[1];
                    
                    // Store the API in the jcrop_api variable
                    jcrop_api = this;
                    jcrop_api.animateTo([510, 300, 190, 100]);
                  });

                    function updatePreview(c){
                        var imgx = Math.round(c.x);
                        var imgy = Math.round(c.y);
                        var imgw = Math.round(c.w);
                        var imgh = Math.round(c.h);
                        var imgw2 = xsize;
                        var imgh2 = ysize;
                        scope.img_coordinates({imgx, imgy, imgw, imgh, imgw2, imgh2});
                        if (parseInt(c.w) > 0){
                          var rx = xsize / c.w;
                          var ry = ysize / c.h;
                          $pimg.css({
                            width: Math.round(rx * boundx) + 'px',
                            height: Math.round(ry * boundy) + 'px',
                            marginLeft: '-' + Math.round(rx * c.x) + 'px',
                            marginTop: '-' + Math.round(ry * c.y) + 'px'
                          });
                        }
                    };
                })
            });
        }
    };
}]);