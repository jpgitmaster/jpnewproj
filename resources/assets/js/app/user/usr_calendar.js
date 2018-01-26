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
                className: 'admin',
                stick: true
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
                className: 'admin',
                readon: admn_sdate.reason
                // currentTimezone: 'Asia/Manila' // an option!
            });
            $scope.schd = {};
            // console.log($scope.admin_scheds);
        });
    };
    $scope.testClick = function(){
        angular.element('.slctd_data').fadeOut('fast');
        console.log('test');
    }
    $scope.alertOnEventClick = function( date, jsEvent, view){
        $scope.slctd = $filter('filter')($scope.admin_scheds, {genid: date.genid})[0];
        // var iclone = angular.copy(angular.element('.slctd_data').clone());
        angular.element('.slctd_data').fadeOut('fast');
        var tpl = $compile('<div class="slctd_data" style="position: absolute; z-index: 9; top: inherit; left: 0; right: 0; bottom: 33px; max-width: 330px; display: none;"><div class="popover bs-popover-top" style="max-width: 100%; width: 100%; position: relative; margin: 0;"><div class="arrow"></div><div class="popover-body"><button class="btn btn-primary" ng-click="testClick()" type="button">test</button><h1>'+$scope.slctd.title+'</h1><p>'+$scope.slctd.reason+'</p></div></div></div>')($scope);
        $timeout(function(){
            angular.element(tpl).prependTo($(jsEvent.target).closest('.fc-event-container')).hide().delay(100).fadeIn();
        }, 20);
        // console.log($scope.islct);
    };

    $scope.uiConfig = {
      calendar:{
        height: 500,
        editable: true,
        header:{
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay,listWeek'
        },
        navLinks: true, // can click day/week names to navigate views
        // selectable: true,
        // selectHelper: true,
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
        eventClick: $scope.alertOnEventClick,
        eventDrop: function(event, delta, revertFunc, jsEvent, ui, view){
            // console.log(event.genid);
            // console.log(event.start.format());
            var edate = moment(event.end.format()).startOf('day');
           $http({
                method: 'POST',
                url: '/user/drop_resize_sched',
                headers: { 'Content-Type': undefined },
                transformRequest: function (data) {
                    var fd = new FormData();
                    fd.append('evnt', angular.toJson(data));
                    return fd;
                },
                data: {genid: event.genid, start: event.start.format(), end: edate.subtract(1, 'day')}
            }).then(function(result){
                $scope.msg = result.data;
                console.log(result.data);
            });
        },
        eventResizeStart: function( event, jsEvent, ui, view ) {
            angular.element('.slctd_data').hide();
            angular.element('.fc-event-container').css('position', 'inherit')
        },
        eventResize: function(event, delta, revertFunc, jsEvent, ui, view ){
            var edate = moment(event.end.format()).startOf('day');
           $http({
                method: 'POST',
                url: '/user/drop_resize_sched',
                headers: { 'Content-Type': undefined },
                transformRequest: function (data) {
                    var fd = new FormData();
                    fd.append('evnt', angular.toJson(data));
                    return fd;
                },
                data: {genid: event.genid, start: event.start.format(), end: edate.subtract(1, 'day')}
            }).then(function(result){
                $scope.msg = result.data;
                console.log(result.data);
            });
        }
        // ignoreTimezone: true
      }
    };
    /* event sources array*/
    // $scope.eventSources = [$scope.jpevents, $scope.events];
    $scope.eventSources = [$scope.guest_scheds, $scope.admin_scheds];

    $scope.addActivityType = function(typ){
        console.log(typ);
    }
    $scope.typ = {};
}]);
usrContent.directive('colorPicker', ['$parse', '$http', '$timeout',
    function($parse, $http, $timeout){
    return {
        restrict: 'A',
        link: function(scope, elm, attrs){
            elm.ColorPicker({
                onSubmit: function(hsb, hex, rgb, el) {
                    console.log(hex);
                    scope.typ.color = '#'+hex;
                    $(el).val('#'+hex);
                    $(el).ColorPickerHide();
                }
            });
        }
    }
}]);