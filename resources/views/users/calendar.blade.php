@extends('users.index')
@section('title', 'Calendar')

@section('content')
<div class="cntntwrpr" ng-controller="ctrlCalendar">
	<div class="cntntwrpr_rght" style="width: 450px;">
		<div class="cntnbx" style="display: inline-block;">
			<div class="ttl">
			    <h3>Guest Add Schedule</h3>
			    <div class="btmbrdr"><hr></div>
			</div>
			<form ng-submit="addSchedule(schd)" style="margin-top: 10px; float: left; width: 100%;">
				<div class="row no-gutters">
					<div class="col-lg-6">
	          			<div class="bx">
	          				<div class="nptgrp">
					            <input type="text" name="sdate" ng-model="schd.sdate"
					            ng-click="open_calendar($event, $index, 'sdate')" is-open="sdate.open[$index]" show-button-bar="false" datepicker-options="MinDate" uib-datepicker-popup="MM/dd/yyyy"
					            readonly required>
					            {{-- <input type="text" name="empsdate" ng-model="emp.empsdate" class="form-control" ng-focus="fcsempsdate = true" ng-blur="fcsempsdate = false" ng-click="open_calendar($event, $index, 'empsdate')" is-open="empsdate.open[$index]" show-button-bar="false" datepicker-options="MaxCurrentDate" uib-datepicker-popup="MM/dd/yyyy" ng-disabled="usr.workexperience == 1" readonly required> --}}
					            <label class="nptlbl">Check-in <span>*</span></label>
					        </div>
	          			</div>
	          		</div>
	          		<div class="col-lg-6">
	          			<div class="bx">
	          				<div class="nptgrp">
					            <input type="text" name="edate" ng-model="schd.edate"
					            ng-click="open_calendar($event, $index, 'edate')" is-open="edate.open[$index]" datepicker-options="MaxDate" show-button-bar="false" uib-datepicker-popup="MM/dd/yyyy" readonly
					            required>
					            {{-- <input type="text" name="empedate" ng-model="emp.empedate" class="form-control" ng-focus="fcsempedate = true" ng-blur="fcsempedate = false" ng-click="open_calendar($event, $index, 'empedate')" is-open="empedate.open[$index]" datepicker-options="dateOptions" show-button-bar="false" uib-datepicker-popup="MM/dd/yyyy" readonly ng-disabled="emp.ispresent || usr.workexperience == 1" required> --}}
					            <label class="nptlbl">Check-out <span>*</span></label>
					        </div>
	          			</div>
	          		</div>
	          		<div class="col-lg-12">
	          			<div class="bx">
	          				<div class="nptgrp">
					            <select ng-model="schd.roomtype" required>
					            	<option value=""></option>
					            	<option value="0">Econo</option>
					            	<option value="1">Premium</option>
					            	<option value="2">Deluxe</option>
					            	<option value="3">Superior</option>
					            	<option value="4">Executive</option>
					            </select>
					            <label class="nptlbl">Room Type <span>*</span></label>
					        </div>
	          			</div>
	          		</div>
	          		<button class="btn btn-primary" ng-click="addEvent()" type="button" style="width: 100%;">ADD EVENT</button>
				</div>
			</form>
		</div>
		<div class="cntnbx" style="overflow-y: hidden;">
			<div class="ttl">
			    <h3>Admin Add Schedule</h3>
			    <div class="btmbrdr"><hr></div>
			</div>
			<form ng-submit="addSchedule(schd)" style="margin-top: 10px; float: left; width: 100%;">
				<div class="row no-gutters">
					<div class="col-lg-6">
	          			<div class="bx">
	          				<div class="nptgrp">
					            <input type="text" ng-model="schd.fromdate" required>
					            <label class="nptlbl">From <span>*</span></label>
					        </div>
	          			</div>
	          		</div>
	          		<div class="col-lg-6">
	          			<div class="bx">
	          				<div class="nptgrp">
					            <input type="text" ng-model="schd.todate" required>
					            <label class="nptlbl">To <span>*</span></label>
					        </div>
	          			</div>
	          		</div>
	          		<div class="col-lg-3">
	          			<div class="bx">
	          				<div class="nptgrp">
					            <input type="text" ng-model="schd.rmno" required>
					            <label class="nptlbl">Room No. <span>*</span></label>
					        </div>
	          			</div>
	          		</div>
	          		<div class="col-lg-9">
	          			<div class="bx">
	          				<div class="nptgrp">
					            <input type="text" ng-model="schd.title" required>
					            <label class="nptlbl">Title <span>*</span></label>
					        </div>
	          			</div>
	          		</div>
	          		<div class="col-lg-12">
	          			<div class="bx">
	          				<div class="nptgrp">
					            <textarea ng-model="schd.title" required>
					            </textarea>
					            <label class="nptlbl">Reason <span>*</span></label>
					        </div>
	          			</div>
	          		</div>
	          		<button class="btn btn-primary" ng-click="addEvent()" type="button" style="width: 100%;">ADD EVENT</button>
				</div>
			</form>
		</div>
		{{-- <div class="cntnbx">
			<div class="ttl">
			    <h3>Sponsors</h3>
			    <div class="btmbrdr"><hr></div>
			</div>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, vel? Aperiam nobis delectus dolor vero. Animi soluta, repellat dolor, neque error, esse aliquid nulla repudiandae natus ipsa voluptatem consectetur numquam?
		</div> --}}
	</div>
	<div class="cntntwrpr_lft" style="margin-right: 450px;">
		<div class="cntnbx clndr">
			<div class="ttl">
			    <h3>Calendar</h3>
			    <div class="btmbrdr"><hr></div>
			</div>
			<div ui-calendar="uiConfig.calendar" class="calendar" ng-model="eventSources"></div>
		</div>
	</div>
</div>
<style>
	.clndr{
		overflow-y: hidden;
		min-height: 600px;
	}
	.fc-view-container, .fc-toolbar.fc-header-toolbar{
		float: left;
		width: 100%;
	}
	.fc-day-grid-event{
		border-radius: 0;
		background-color: #6dc5e6;
		padding: 4px 2px;
		border: 0;
	}
	.btn-default:disabled{
		cursor: not-allowed;
	}
	.btn-default {
	    color: #333;
	    background-color: #fff;
	    border-color: #ccc;
	}
	.fc-day-grid-event .fc-content{
		color: #FFF;
	}
	.btn-info.active{
	    background-color: #007bff;
	    background-image: none;
	    border-color: #005dc1;
	    color: #FFF;
	    border-radius: 0;
	}
	.uib-datepicker-popup.dropdown-menu,
	.uib-datepicker-popup.dropdown-menu li,
	.uib-datepicker-popup.dropdown-menu div{
		box-shadow: none;
		outline: none;
	}
</style>
@endsection