'use strict'; 
var usrContent = angular.module('usrContent', ['ui.calendar', 'ui.bootstrap']);

usrContent.factory('Schd', function ($resource) {
    return $resource('/user/views_scheds', {}, {
        query : { method: 'GET', isArray: true }
    });
});
usrContent.controller('ctrlCalendar', ['$scope', '$rootScope', '$timeout', '$http', '$compile', '$filter', 'uibDateParser', 'uiCalendarConfig', 'Schd',
    function($scope, $rootScope, $timeout, $http, $compile, $filter, uibDateParser, uiCalendarConfig, Schd) {

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
        {id: 1, name: 'Reserved', textColor: '#FFF', color: '#17b13c'},
        {id: 2, name: 'Out of Service', textColor: '#FFF', color: '#a6a6a6'},
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
    Schd.query().$promise.then(function(data) {
        // $scope.admin_scheds = data;

        angular.forEach(data, function(value, key){
            moment.tz.add('Asia/Manila|+08 +09|-80 -90|010101010|-1kJI0 AL0 cK10 65X0 mXB0 vX0 VK10 1db0|24e6');
            // console.log(moment(value.end).add(9, 'hours').tz("Asia/Manila").format());
            $scope.admin_scheds.push({
                genid: value.genid,
                title: value.title,
                color: value.color,
                textColor: value.textColor,
                start: moment(value.start).tz("Asia/Manila").format('YYYY-MM-DD'),
                end: moment(value.end).add(1, 'day').tz("Asia/Manila").format('YYYY-MM-DD'),
                reason: value.reason,
                className: 'admin'
                // currentTimezone: 'Asia/Manila',
                // allDay: true
            });
        });
    });
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
        className: ['guest']
        // currentTimezone: 'Asia/Manila' // an option!
      });
      console.log($scope.guest_scheds);
    };


    $scope.schd = {};
    var activities = {},
        sked = {};
    $scope.AdminSched = function(sked) {
        if(sked.activity_type){
            activities = $filter('filter')($scope.activities, {id: sked.activity_type})[0];
        }
        var admn_sdate = moment(sked.start).startOf('day'),
            admn_edate = moment(sked.end).startOf('day');
        
        if(activities.color){
            sked.color = activities.color;
        }

        if(activities.textColor){
            sked.textColor = activities.textColor;
        }

        $http({
            method: 'POST',
            url: '/user/save_calendar',
            headers: { 'Content-Type': undefined },
            transformRequest: function (data) {
                var fd = new FormData();
                fd.append('sched', angular.toJson(data.sched));
                return fd;
            },
            data: {sched: sked}
        }).then(function(result){
            $scope.msg = result.data;
            console.log(result.data);

            $scope.admin_scheds.push({
                genid: 32132,
                title: sked.title,
                color: activities.color,
                textColor: activities.textColor,
                start: admn_sdate.clone().format('YYYY-MM-DD'),
                end: admn_edate.clone().add(1, 'day').format('YYYY-MM-DD'),
                className: 'admin'
                // currentTimezone: 'Asia/Manila' // an option!
            });
            $scope.schd = {};
            // console.log($scope.admin_scheds);
        });
    };

    // $scope.slctd = {};
    $scope.islct = false;
    $scope.alertOnEventClick = function( date, jsEvent, view){
        $scope.slctd = $filter('filter')($scope.admin_scheds, {genid: date.genid})[0];
        $scope.islct = true;
        $timeout(function(){
            angular.element('.slctd_data').prependTo($(jsEvent.target).closest('.fc-event-container')).hide().delay(100).fadeIn();
        }, 20);
        console.log(jsEvent.target);
    };

    $scope.testClick = function(){
        console.log('working');
    }

    $scope.uiConfig = {
      calendar:{
        editable: true,
        header:{
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay,listWeek'
        },
        navLinks: true, // can click day/week names to navigate views
        selectable: false,
        selectHelper: false,
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
        eventClick: $scope.alertOnEventClick
        // ignoreTimezone: true
      }
    };
    /* event sources array*/
    // $scope.eventSources = [$scope.jpevents, $scope.events];
    $scope.eventSources = [$scope.guest_scheds, $scope.admin_scheds];
}]);
