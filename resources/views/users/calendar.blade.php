@extends('users.index')
@section('title', 'Calendar')

@section('content')
<div class="cntntwrpr" ng-controller="ctrlCalendar">
	<div class="cntntwrpr_rght">
		<div class="cntnbx">
			<div class="ttl">
			    <h3>Admin Add Schedule</h3>
			    <div class="btmbrdr"><hr></div>
			</div>
			<form ng-submit="AdminSched(schd)">
				<div class="row no-gutters">
					<div class="col-lg-12">
	          			<div class="bx">
	          				<div class="nptgrp">
					            <input type="text" ng-model="schd.title" required>
					            <label class="nptlbl">Activity <span>*</span></label>
					        </div>
	          			</div>
	          		</div>
					<div class="col-lg-6">
	          			<div class="bx">
	          				<div class="nptgrp">
					            <input type="text" name="fromdate" ng-model="schd.start" ng-click="open_calendar($event, $index, 'fromdate')" datepicker-options="MinDate" is-open="fromdate.open[$index]" show-button-bar="false" uib-datepicker-popup="MM/dd/yyyy" ng-change="getMax(schd.start, 1)" readonly required>
					            <label class="nptlbl">From <span>*</span></label>
					        </div>
	          			</div>
	          		</div>
	          		<div class="col-lg-6">
	          			<div class="bx">
	          				<div class="nptgrp">
					            <input type="text" name="todate" ng-model="schd.end" ng-click="open_calendar($event, $index, 'todate', schd.end)" is-open="todate.open[$index]" datepicker-options="MaxDateTo" show-button-bar="false" uib-datepicker-popup="MM/dd/yyyy" readonly required>
					            <label class="nptlbl">To <span>*</span></label>
					        </div>
	          			</div>
	          		</div>
	          		<div class="col-lg-12">
	          			<div class="bx">
	          				{{-- <div class="nptgrp">
					            <select ng-model="schd.activity_type" required>
					            	<option value=""></option>
					            	<option ng-repeat="actvty in activities" ng-value="actvty.id"><%=actvty.name%></option>
					            </select>
					            <label class="nptlbl">Activity Type <span>*</span></label>
					        </div> --}}
						        <div class="nptgrp cstmdrpdwn" ng-if="activities" ng-cloak>
	            				{{-- <input type="hidden" ng-model="schd.activity_type"> --}}
	            				<div custom-select="actvty.id as actvty.name for actvty in activities | filter: {name: $searchTerm} track by actvty.id" ng-model="schd.activity_type" custom-select-options="select_status">
	            					<div>
		            					<div class="brclr" style="background-color: <%= actvty.color  %>;"></div>
													<strong><%= actvty.name  %></strong>
												</div>
												<div class="clearfix"></div>
											</div>
											<label class="nptlbl">Activity Type <span>*</span></label>
		          			</div>
		          		</div>
	          		</div>
	          		{{-- <div class="col-lg-3">
	          			<div class="bx">
	          				<div class="nptgrp">
					             <select ng-model="schd.activity" required>
					            	<option value="0">0</option>
					            	<option value="001">001</option>
					            	<option value="002">002</option>
					            	<option value="003">003</option>
					            	<option value="004">004</option>
					            	<option value="005">005</option>
					            	<option value="006">006</option>
					            	<option value="007">007</option>
					            	<option value="008">008</option>
					            	<option value="009">009</option>
					            </select>
					            <label class="nptlbl">Room No. <span>*</span></label>
					        </div>
	          			</div>
	          		</div> --}}
	          		<div class="col-lg-12">
	          			<div class="bx">
	          				<div class="nptgrp">
					            <select ng-model="schd.room_type" required>
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
	          		<div class="col-lg-12">
	          			<div class="bx">
	          				<div class="nptgrp">
					            <textarea ng-model="schd.reason" required>
					            </textarea>
					            <label class="nptlbl">Reason <span>*</span></label>
					        </div>
	          			</div>
	          		</div>
	          		<button class="btn btn-primary" type="submit">ADD SCHEDULE</button>
				</div>
			</form>
		</div>
		{{-- <div class="cntnbx" style="display: inline-block;">
			<div class="ttl">
			    <h3>Guest Add Schedule</h3>
			    <div class="btmbrdr"><hr></div>
			</div>
			<form ng-submit="GuestSched(schd)" style="margin-top: 10px; float: left; width: 100%;">
				<div class="row no-gutters">
					<div class="col-lg-6">
	          			<div class="bx">
	          				<div class="nptgrp">
					            <input type="text" name="sdate" ng-model="schd.sdate"
					            ng-click="open_calendar($event, $index, 'sdate')" is-open="sdate.open[$index]" show-button-bar="false" datepicker-options="MinDate" uib-datepicker-popup="MM/dd/yyyy" ng-change="getMax(schd.sdate, 0)"
					            readonly required>
					            <label class="nptlbl">Check-in <span>*</span></label>
					        </div>
	          			</div>
	          		</div>
	          		<div class="col-lg-6">
	          			<div class="bx">
	          				<div class="nptgrp">
					            <input type="text" name="edate" ng-model="schd.edate"
					            ng-click="open_calendar($event, $index, 'edate')" is-open="edate.open[$index]" show-button-bar="false" uib-datepicker-popup="MM/dd/yyyy" datepicker-options="MaxDateCheckout" readonly required>
					            <label class="nptlbl">Check-out <span>*</span></label>
					        </div>
	          			</div>
	          		</div>
				</div>
				<button class="btn btn-primary" type="submit" style="width: 100%;">ADD SCHEDULE</button>
			</form>
		</div> --}}
		<div class="cntnbx">
			<div class="ttl">
			    <h3>Add Activity Type</h3>
			    <div class="btmbrdr"><hr></div>
			</div>
			<form ng-submit="addActivityType(typ)">
				<div class="row no-gutters">
					<div class="col-lg-12">
						<div class="bx">
	          				<div class="nptgrp">
					            <input type="text" ng-model="typ.name" />
					            <label class="nptlbl">Name <span>*</span></label>
					        </div>
	          			</div>
					</div>
					<div class="col-lg-6">
						<div class="bx">
        			<div class="nptgrp">
		            <input type="text" ng-model="typ.txtcolor" color-picker />
		            <div class="clrbgnpt"></div>
		            <label class="nptlbl">Text Color <span>*</span></label>
			        </div>
      			</div>
					</div>
					<div class="col-lg-6">
						<div class="bx">
        			<div class="nptgrp">
		            <input type="text" ng-model="typ.bgcolor" color-picker />
		            <div class="clrbgnpt"></div>
		            <label class="nptlbl">Background Color <span>*</span></label>
			        </div>
      			</div>
					</div>
					<div class="col-lg-12">
	          			<div class="bx">
	          				<div class="nptgrp">
					            <textarea ng-model="typ.description" required>
					            </textarea>
					            <label class="nptlbl">Description <span>*</span></label>
					        </div>
	          			</div>
	          		</div>
				</div>
				<button class="btn btn-primary" type="submit">ADD ACTIVITY TYPE</button>
			</form>
		</div>
		{{-- <div class="cntnbx">
			<div class="ttl">
			    <h3>Sponsors</h3>
			    <div class="btmbrdr"><hr></div>
			</div>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, vel? Aperiam nobis delectus dolor vero. Animi soluta, repellat dolor, neque error, esse aliquid nulla repudiandae natus ipsa voluptatem consectetur numquam?
		</div> --}}
		<!-- <div class="cntnbx" ng-if="slctd" ng-cloak>
			<div class="ttl">
			    <h3>Selected</h3>
			    <div class="btmbrdr"><hr></div>
			</div>
			
			<ul class="slctd_data">
				<li>
					<strong>Activity:</strong> 
					<%= slctd.title %>
				</li>
				<li>
					<strong>Reason:</strong>
					<%= slctd.reason %>
				</li>
			</ul>
		</div> -->

	</div>
	<div class="cntntwrpr_lft">
		<div class="cntnbx clndr">
			<div class="ttl">
			    <h3>Calendar</h3>
			    <div class="btmbrdr"><hr></div>
			</div>
			<div ui-calendar="uiConfig.calendar" class="calendar" ng-model="eventSources"></div>
		</div>
	</div>
</div>
@endsection