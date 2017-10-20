'use strict';
var usrApp = angular.module('usrApp', ['ngResource', 'ngAnimate', 'usrContent']);

usrApp.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('<%=').endSymbol('%>');
});