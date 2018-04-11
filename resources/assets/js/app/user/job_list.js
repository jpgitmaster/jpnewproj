'use strict'; 
var usrContent = angular.module('usrContent', []);

usrContent.controller('ctrlJobList', ['$scope', '$rootScope', '$timeout', '$http', 'Usr',
	function($scope, $rootScope, $timeout, $http, Usr) {

	$scope.viewResume = function(){
    $('#resume_tpl').appendTo('body').modal().velocity('transition.flipXIn');
  }
}]);

usrContent.filter('customOrderBy', function () {
   return function (arr) {

     var numbers = [];
     var strings = [];
       angular.forEach(arr, function(item){
            if(item.ispresent == true ){
              numbers.push(item);     
            }
            else
              strings.push(item);     
          });

        return numbers.sort().concat(strings);
    };
});