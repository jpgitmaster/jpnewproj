'use strict'; 
var usrContent = angular.module('usrContent', ['ui.calendar', 'ui.bootstrap']);

usrContent.controller('ctrlCalendar', ['$scope', '$rootScope', '$timeout', '$http', '$compile', 'uibDateParser', 'uiCalendarConfig',
	function($scope, $rootScope, $timeout, $http, $compile, uibDateParser, uiCalendarConfig) {

	var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();


    $scope.open_calendar = function($event, index, datepicker){
        $scope[datepicker] = {}; $scope[datepicker].open = {};
        $event.preventDefault();
        $event.stopPropagation();
        $scope[datepicker].open[index] = !$scope[datepicker].open[index];
    }
    $scope.MinDate = {
        showWeeks: false,
        minDate: new Date()
    };
    $scope.MaxDate = {
        showWeeks: false,
        maxDate: new Date()
    };
    
    $scope.eventSource = {};

    /* event source that contains custom events on the scope */
    $scope.events = [
      // {title: 'Long Event',start: new Date(y, m, d - 5),end: new Date(y, m, d - 2)},
    ];

    // $scope.jpevents = [
    //   {title: 'JP Long Event',start: new Date(y, m, d - 5),end: new Date(y, m, d - 2)},
    // ];

    $scope.addEvent = function() {
      $scope.events.push({
        // title: 'Open Sesame',
        start: new Date(y, m, d - 5),
        end: new Date(y, m, d - 2),
        className: ['openSesame']
      });
    };



	$scope.uiConfig = {
      calendar:{
        editable: true,
        header:{
          left: 'title',
          // center: 'today',
          right: 'prev,next'
        }
      }
    };
    /* event sources array*/
    // $scope.eventSources = [$scope.jpevents, $scope.events];
    $scope.eventSources = [$scope.events];
}]);
