'use strict'; 
var usrContent = angular.module('usrContent', ['ui.calendar', 'ui.bootstrap']);

usrContent.controller('ctrlCalendar', ['$scope', '$rootScope', '$timeout', '$http', '$compile', '$filter', 'uibDateParser', 'uiCalendarConfig',
	function($scope, $rootScope, $timeout, $http, $compile, $filter, uibDateParser, uiCalendarConfig) {

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
    $scope.MaxDateTo = {
        showWeeks: false,
        minDate: new Date()
    };
    $scope.MaxDateCheckout = {
        showWeeks: false,
        minDate: new Date()
    };
    $scope.getMax = function(nwdate, num){
        switch(num){
            case 0:
                $scope.MaxDateCheckout = {
                    showWeeks: false,
                    minDate: nwdate
                }
                break;
            case 1:
                $scope.MaxDateTo = {
                    showWeeks: false,
                    minDate: nwdate
                }
                break;
        }
    }
    
    $scope.activities = [
        {id: 1, name: 'Reserved', color: '#FFF', background: '#17b13c'},
        {id: 2, name: 'Out of Service', color: '#FFF', background: '#a6a6a6'},
    ]

    // $scope.MaxDate = {
    //     showWeeks: false,
    //     maxDate: new Date()
    // };
    
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
        var activities = $filter('filter')($scope.activities, {id: schd.activity})[0],
            admn_sdate = moment(schd.fromdate).startOf('day'),
            admn_edate = moment(schd.todate).startOf('day');
      $scope.admin_scheds.push({
        title: schd.ttl,
        color: activities.background,
        textColor: activities.color,
        start: admn_sdate.clone().format('YYYY-MM-DD'),
        end: admn_edate.clone().add(1, 'day').format('YYYY-MM-DD'),
        className: ['admin'],
        currentTimezone: 'Asia/Manila' // an option!
      });
      $scope.schd = {};
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
        },
        navLinks: true, // can click day/week names to navigate views
        // selectable: true,
        selectHelper: true,
        // select: function(start, end) {
        //     var title = prompt('Event Title:');
        //     var eventData;
        //     if (title) {
        //       // eventData = {
        //       //   title: title,
        //       //   start: start,
        //       //   end: end
        //       // };
        //       $scope.admin_scheds.push({
        //         title: title,
        //         start: start.clone().format('YYYY-MM-DD'),
        //         end: end.clone().format('YYYY-MM-DD'),
        //         className: ['admin'],
        //         currentTimezone: 'Asia/Manila' // an option!
        //       });
        //       $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
        //     }
        //     $('#calendar').fullCalendar('unselect');
        // }
      }
    };
    /* event sources array*/
    // $scope.eventSources = [$scope.jpevents, $scope.events];
    $scope.eventSources = [$scope.guest_scheds, $scope.admin_scheds];
}]);
