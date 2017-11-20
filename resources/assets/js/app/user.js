'use strict';
var usrApp = angular.module('usrApp', ['ngResource', 'ngAnimate', 'usrHeader', 'usrContent']);

usrApp.factory('Usr', function ($resource) {
    return $resource('/user', {}, {
        query : { method: 'GET', isArray: true }
    });
});

usrApp.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('<%=').endSymbol('%>');
});

'use strict'; 
var usrHeader = angular.module('usrHeader', []);

usrHeader.controller('ctrlHeader', ['$scope', '$rootScope', '$timeout', '$http', '$q', 'Usr',
	function($scope, $rootScope, $timeout, $http, $q, Usr) {

  var deferred = $q.defer();

	Usr.query().$promise.then(function(data) {
     $rootScope.usr = data;
     deferred.resolve($rootScope.usr);
  });


    $scope.timestamp = function(){
    	return Date.now();
    }
}]);