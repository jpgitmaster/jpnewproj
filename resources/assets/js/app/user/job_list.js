'use strict'; 
var usrContent = angular.module('usrContent', []);

usrContent.controller('ctrlJobList', ['$scope', '$rootScope', '$timeout', '$http', 'Usr',
	function($scope, $rootScope, $timeout, $http, Usr) {

	$scope.viewResume = function(){
    $('#resume_tpl').appendTo('body').modal().velocity('transition.flipXIn');
  }
}]);