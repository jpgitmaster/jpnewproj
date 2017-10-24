'use strict';
var ngApp = angular.module('ngApp', ['ngResource', 'ngAnimate']);

ngApp.controller('ctrlApp', ['$scope', '$http', function($scope, $http) {

    $scope.usrRegister = function(usr){
        $http({
            method: 'POST',
            url: "register",
            headers: {'Content-Type': undefined},
            data: {user : usr},
            transformRequest: function (data) {
                var fd = new FormData();
                fd.append('user', angular.toJson(data.user));
                return fd;
            }
        }).then(function(result){
            $scope.msg = result.data;
            // $scope.rgstr = {};
            console.log($scope.msg);
        });
    }

}]);

ngApp.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('<%=').endSymbol('%>');
});