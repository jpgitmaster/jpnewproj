'use strict'; 
var usrContent = angular.module('usrContent', []);

usrContent.controller('ctrlEditProfile', ['$scope', '$rootScope', '$timeout', '$http', 'Usr',
	function($scope, $rootScope, $timeout, $http, Usr) {

	Usr.query().$promise.then(function(data) {
       $rootScope.usr = data;
   	});

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
                $rootScope.usr = Usr.query();
	            $scope.cancelUpload();
	            angular.element('#cropModal').modal('hide');
            }
        });
        
    }

    $scope.timestamp = function(){
    	return Date.now();
    }
    $scope.updateUsr = function(){
    	$rootScope.usr = Usr.query();
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