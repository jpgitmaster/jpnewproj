'use strict';
var ngApp = angular.module('ngApp', ['ngResource', 'ngAnimate']);

ngApp.controller('ctrlApp', ['$scope', '$timeout', '$http',
    function($scope, $timeout, $http) {

    $scope.usrRegister = function(usr){
        $scope.loader = true;
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

            $timeout(function(){
                $scope.loader = false;
                if($scope.msg['has_error'] == false){
                    angular.element('#sccssrgstrtn').modal().velocity('transition.flipXIn');
                    $scope.rgstr = {};    
                }
                console.log($scope.msg);
            }, 500);
        });
    }

    $scope.actv_form = 'login';

    $scope.getForm = function(num){
        switch (num) {
            case 0:
                $scope.actv_form = 'home/form/login';
                break;
            case 1:
                $scope.actv_form = 'home/form/forgot_password';
                break;
            default:
                $scope.actv_form = 'home/form/login';
                break;
        }
    }

}]);

ngApp.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('<%=').endSymbol('%>');
});