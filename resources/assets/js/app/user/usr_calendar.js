'use strict'; 
var usrContent = angular.module('usrContent', ['ui.calendar', 'ui.bootstrap']);

usrContent.controller('ctrlCalendar', ['$scope', '$rootScope', '$timeout', '$http', '$compile', 'uibDateParser', 'uiCalendarConfig',
	function($scope, $rootScope, $timeout, $http, $compile, uibDateParser, uiCalendarConfig) {

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
    $scope.NoWeeks = {
        showWeeks: false
    };
    
    /* event source that contains custom events on the scope */
    $scope.guest_scheds = [
      // {title: 'Long Event',start: new Date(y, m, d - 5),end: new Date(y, m, d - 2)},
    ];

    $scope.admin_scheds = [

    ];

    // $scope.jpevents = [
    //   {title: 'JP Long Event',start: new Date(y, m, d - 5),end: new Date(y, m, d - 2)},
    // ];

    $scope.GuestSched = function(schd) {
        var sdate = moment(schd.sdate).startOf('day');
        var edate = moment(schd.edate).startOf('day');
        // console.log(todayDate);
      $scope.guest_scheds.push({
        // title: 'Open Sesame',
        start: sdate.clone().format('YYYY-MM-DD'),
        end: edate.clone().add(1, 'day').format('YYYY-MM-DD'),
        className: ['guest'],
        currentTimezone: 'Asia/Manila' // an option!
      });
      console.log($scope.guest_scheds);
    };

    $scope.AdminSched = function(schd) {
        var admn_sdate = moment(schd.fromdate).startOf('day');
        var admn_edate = moment(schd.todate).startOf('day');
        // console.log(todayDate);
      $scope.admin_scheds.push({
        // title: 'Open Sesame',
        start: admn_sdate.clone().format('YYYY-MM-DD'),
        end: admn_edate.clone().add(1, 'day').format('YYYY-MM-DD'),
        className: ['admin'],
        currentTimezone: 'Asia/Manila' // an option!
      });
      console.log($scope.admin_scheds);
    };



	$scope.uiConfig = {
      calendar:{
        editable: true,
        timezone: 'Asia/Manila',
        header:{
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay,listWeek'
        }
      }
    };
    /* event sources array*/
    // $scope.eventSources = [$scope.jpevents, $scope.events];
    $scope.eventSources = [$scope.guest_scheds, $scope.admin_scheds];
}]);
