'use strict'; 
var usrContent = angular.module('usrContent', ['summernote', 'ui.mask', 'AxelSoft']);

usrContent.controller('ctrlEditProfile',
    ['$scope', '$rootScope', '$filter', '$timeout', '$http', '$q', 'Usr', 'Countries', 'PersnlInfo', 'EmpHistory', 'ProfForms',
    function($scope, $rootScope, $filter, $timeout, $http, $q, Usr, Countries, PersnlInfo, EmpHistory, ProfForms) {

    $scope.proform = ProfForms.query();
    $scope.frm1_loader = false;
    $scope.frm2_loader = false;
    ProfForms.query().$promise.then(function(data) {
        $scope.proform = data;
        var actvfrm = 0,
            actvfrm2 = 0;
        switch(data['personalinfo']){
            case 0:
                actvfrm = 1;
                break;
            case 1:
                actvfrm = 0;
                break;
        }

        switch(data['educationalbg']){
            case 0:
                actvfrm2 = 1;
                break;
            case 1:
                actvfrm2 = 0;
                break;
        }
        $timeout(function(){
            if(data['personalinfo'] && !data['educationalbg']){
                $scope.collapseTab(2);
            }
        }, 200);
        $scope.forms = [
            {'form':  'PersonalInfo', 'cardnum': 0, 'actvform': actvfrm},
            {'form':  'EducationalBg', 'cardnum': 1, 'actvform': actvfrm2},
        ];
    });
    
    $scope.openForm = function(cardnum, card){
        switch(card){
            case 0:
                $scope.forms[cardnum]['actvform'] = 0;
                break;
            case 1:
                $scope.forms[cardnum]['actvform'] = 1;
                break;
        }
        
        // console.log(card);
        if($scope.msg['success']){
            $scope.msg['success'] = '';
        }
        var fadefrm = cardnum+1;
        angular.element('.card:nth-child('+fadefrm+') .crdbdy').hide().delay(200).fadeIn();
    }
    $scope.updateUsr = function(){
        Usr.query().$promise.then(function(data) {
            $rootScope.usr = data;
        });
    }
    $scope.msg = [];
    $scope.countries = Countries.query();
    $scope.frm1 = [];
    $scope.frm2 = [];
    PersnlInfo.query().$promise.then(function(data) {
        $scope.frm1 = data;
        $scope.cvlstatus = $scope.frm1.cstatus;
        $scope.country = $scope.frm1.country;
        $scope.nationality = $scope.frm1.nationality;
    });
    // CntctDtls.query().$promise.then(function(data) {
    //     $scope.frm2 = data;
    // });
    $scope.select_status = {
        onSelect: function (item) {
            $scope.frm1.cstatus = item.id;
        }
    };
    $scope.select_country = {
        onSelect: function (item) {
            $scope.frm1.country = item.id;
        }
    };
    $scope.select_nationality = {
        onSelect: function (item) {
            $scope.frm1.nationality = item.id;
        }
    };
    $scope.cstatus = [
        {id: 1, name: 'Single'},
        {id: 2, name: 'Married'},
        {id: 3, name: 'Legally separated'},
        {id: 4, name: 'Annulled'},
        {id: 5, name: 'Widow'},
        {id: 6, name: 'Widower'}
    ];

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
            case 2:
                $scope.frm1cnfrm = false;
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
            $scope.frm1.permanent_address = angular.copy($scope.frm1.present_address);
        }
    }

    $scope.savePersonalInfo = function(frm1){
        $scope.frm1_loader = true;
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
            if(!$scope.msg['error']){
                $scope.forms[0]['actvform'] = 0;
            }
            angular.element('.card:nth-child(1) .crdbdy').hide().delay(200).fadeIn();
            $timeout(function(){
                $scope.frm1_loader = false;
                if($scope.msg['success']){
                    if($scope.msg['success']['prsnl']['added']){
                        $scope.collapseTab(2);
                        $scope.proform['personalinfo'] = 1;
                    }
                }
            }, 200);
            console.log($scope.msg);
        });
    }
    $scope.jpemps = EmpHistory.query();
    $scope.saveEmploymentHistory = function(emp, wrk){
        // console.log(emp);
        $scope.frm2_loader = true;
        $http({
            method: 'POST',
            url: '/user/save_employment_history',
            headers: { 'Content-Type': undefined },
            transformRequest: function (data) {
                var fd = new FormData();
                fd.append('emp', angular.toJson(data.emp));
                fd.append('wrk', angular.toJson(data.wrk));
                return fd;
            },
            data: {emp: emp, wrk: wrk}
        }).then(function(result){
            $scope.msg = result.data;
            // if(!$scope.msg['error']){
            //     $scope.forms[1]['actvform'] = 0;
            // }
            // angular.element('.card:nth-child(2) .crdbdy').hide().delay(200).fadeIn();
            // $timeout(function(){
            //     $scope.frm2_loader = false;
            //     if($scope.msg['success']){
            //         if($scope.msg['success']['emphstry']['added']){
            //             $scope.collapseTab(3);
            //             $scope.proform['educationalbg'] = 1;
            //         }
            //     }
            // }, 200);
            $scope.jpemps.push({
                'company'        : emp.company,
                'position'       : emp.position,
                'currency'       : emp.currency,
                'salary'         : emp.salary,
                'sdate'          : emp.sdate,
                'edate'          : emp.edate,
                'ispresent'      : emp.ispresent,
                'jbdescription'  : emp.jbdescription,
                'reasonforleaving' : emp.reasonforleaving
            });
            console.log($scope.msg);
        });
    }

    $scope.currencies = [
        { id: 1, name: 'USD $' },
        { id: 2, name: 'Php ₱' }
    ];
    
    $scope.getAge = function(bday){
        var current_date    = new Date();

        var current_yr      = current_date.getFullYear();
        var current_mo      = current_date.getMonth();

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

    $scope.gender = [
        {id: 1, name: 'Female'},
        {id: 2, name: 'Male'}
    ];

    var fltr = '';
    $scope.getfltrvalue = function(arr, arr_id, idntfr){
        if($filter('filter')(arr, {id: arr_id})[0]){
            switch(idntfr){
                case 0:
                    fltr = $filter('filter')(arr, {id: arr_id})[0].name;
                    break;
                case 1:
                    fltr = $filter('filter')(arr, {id: arr_id})[0].country;
                    break;
                case 2:
                    fltr = $filter('filter')(arr, {id: arr_id})[0].nationality;
                    break;
            }
            return fltr;
        }
    }
    $scope.yrsxprncs = [
        {id: 1, name: 'No Work Experience'},
        {id: 2, name: '1-3 Yrs. of Experience'},
        {id: 3, name: '4-6 Yrs. of Experience'},
        {id: 4, name: '7 yrs. and Above'}
    ];

    $scope.emps = [{
        'company'        : "",
        'position'       : "",
        'salary'         : "",
        'sdate'          : "",
        'edate'          : "",
        'ispresent'      : "",
        'jbdescription'  : "",
        'reasonforleaving' : ""
    }];
    $scope.msg['error'] = [];
    $scope.addEmp = function(emp){
        $scope.emps.unshift({
            'company'        : "",
            'position'       : "",
            'salary'         : "",
            'sdate'          : "",
            'edate'          : "",
            'ispresent'      : "",
            'jbdescription'  : "",
            'reasonforleaving' : ""
        });
        if(typeof $scope.msg['error']['emp'] != "undefined"){
            $scope.msg['error']['emp'].splice(0, 0, {});
        }
    }

    $scope.updateEmpForm = function(emp){
        if(typeof emp == 'undefined' || emp == 1){
           $scope.emps = [{
                'company'        : "",
                'position'       : "",
                'salary'         : "",
                'sdate'          : "",
                'edate'          : "",
                'ispresent'      : "",
                'jbdescription'  : "",
                'reasonforleaving' : ""
            }];
        }
    }

    $scope.removeEmp = function(emp){
        var index = $scope.emps.indexOf(emp);
        $scope.emps.splice(index, 1);
        if(typeof $scope.msg['error']['emp'] != 'undefined'){
            $scope.msg['error']['emp'].splice(index, 1);
        }
    }
    $scope.checked = 0;
    $scope.clearEndate = function(index, ispresent){
        if(ispresent == 1){
            $scope.emps[index].edate = '';
            $scope.checked++;
        }else{
            $scope.checked--;
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
usrContent.directive('currencyInput', [function () {
    return {
        require: 'ngModel',
        link: function (scope, element, attrs, ngModel) {
            attrs.$set('ngTrim', "false");

            var formatter = function(str, isNum) {
                str = String( Number(str || 0) / (isNum?1:100) );
                str = (str=='0'?'0.0':str).split('.');
                str[1] = str[1] || '0';
                return str[0].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,') + '.' + (str[1].length==1?str[1]+'0':str[1]);
            }
            var updateView = function(val) {
                scope.$applyAsync(function () {
                    ngModel.$setViewValue(val || '');
                    ngModel.$render();
                });
            }
            var parseNumber = function(val) {
                var modelString = formatter(ngModel.$modelValue, true);
                var sign = {
                    pos: /[+]/.test(val),
                    neg: /[-]/.test(val)
                }
                sign.has = sign.pos || sign.neg;
                sign.both = sign.pos && sign.neg;

                if (!val || sign.has && val.length==1 || ngModel.$modelValue && Number(val)===0) {
                    var newVal = (!val || ngModel.$modelValue && Number()===0?'':val);
                    if (ngModel.$modelValue !== newVal)
                        updateView(newVal);

                    return '';
                }
                else {
                    var valString = String(val || '');
                    var newSign = (sign.both && ngModel.$modelValue>=0 || !sign.both && sign.neg?'-':'');
                    var newVal = valString.replace(/[^0-9]/g,'');
                    var viewVal = newSign + formatter(angular.copy(newVal));

                    if (modelString !== valString)
                        updateView(viewVal);

                    return (Number(newSign + newVal) / 100) || 0;
                }
            }
            var formatNumber = function(val) {
                if (val) {
                    var str = String(val).split('.');
                    str[1] = str[1] || '0';
                    val = str[0] + '.' + (str[1].length==1?str[1]+'0':str[1]);
                }
                return parseNumber(val);
            }

            ngModel.$parsers.push(parseNumber);
            ngModel.$formatters.push(formatNumber);
        }
    };
}]);