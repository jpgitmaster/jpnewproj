'use strict';

var usrApp = angular.module('usrApp', ['ngSanitize', 'ngResource', 'ngAnimate', 'usrHeader', 'usrContent', 'angular.vertilize']);

usrApp.factory('Usr', function ($resource) {
    return $resource('/user', {}, {
        query : { method: 'GET', isArray: true }
    });
});
usrApp.factory('PersnlInfo', function ($resource) {
    return $resource('/user/personal_info', {}, {
        query : { method: 'GET', isArray: false }
    });
});
usrApp.factory('Countries', function ($resource) {
    return $resource('/countries', {}, {
        query : { method: 'GET', isArray: true }
    });
});

usrApp.controller('ctrlApp', ['$scope', '$rootScope', '$timeout', '$http', '$q', 'Usr',
  function($scope, $rootScope, $timeout, $http, $q, Usr) {
    
  var deferred = $q.defer();
  $rootScope.usr = Usr.query();
  
  // Usr.query().$promise.then(function(data) {
 //     $rootScope.usr = data;
 //     deferred.resolve($rootScope.usr);
 //  });
  $scope.currentime = '';
  $scope.timestamp = function(){
      $scope.currentime = '?time='+Date.now();
  }
}]);

usrApp.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('<%=').endSymbol('%>');
});

'use strict'; 
var usrHeader = angular.module('usrHeader', []);

usrHeader.controller('ctrlHeader', ['$scope', '$rootScope', '$timeout', '$http', '$q', 'Usr',
	function($scope, $rootScope, $timeout, $http, $q, Usr) {
    var deferred = $q.defer();
}]);