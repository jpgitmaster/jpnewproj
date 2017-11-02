'use strict';
var usrApp = angular.module('usrApp', ['ngResource', 'ngAnimate', 'usrContent']);

usrApp.factory('Usr', function ($resource) {
    return $resource('/user', {}, {
        query : { method: 'GET', isArray: true }
    });
});

usrApp.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('<%=').endSymbol('%>');
});

usrApp.controller('ctrlHeader', ['$scope', '$rootScope', '$timeout', '$http', 'Usr',
	function($scope, $rootScope, $timeout, $http, Usr) {

	Usr.query().$promise.then(function(data) {
       $rootScope.usr = data;
   	});


    $scope.timestamp = function(){
    	return Date.now();
    }
}]);