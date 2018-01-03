@extends('users.index')
@section('title', 'Calendar')

@section('content')
<div class="cntntwrpr" ng-controller="ctrlCalendar">
	<div class="cntntwrpr_rght">
		<div class="cntnbx">
			<div class="ttl">
			    <h3>Partners</h3>
			    <div class="btmbrdr"><hr></div>
			</div>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, vel? Aperiam nobis delectus dolor vero. Animi soluta, repellat dolor, neque error, esse aliquid nulla repudiandae natus ipsa voluptatem consectetur numquam?
		</div>
		<div class="cntnbx">
			<div class="ttl">
			    <h3>Sponsors</h3>
			    <div class="btmbrdr"><hr></div>
			</div>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, vel? Aperiam nobis delectus dolor vero. Animi soluta, repellat dolor, neque error, esse aliquid nulla repudiandae natus ipsa voluptatem consectetur numquam?
		</div>
	</div>
	<div class="cntntwrpr_lft">
		<div class="cntnbx">
			<div class="ttl">
			    <h3>Calendar</h3>
			    <div class="btmbrdr"><hr></div>
			</div>
			<canvas id="line" class="chart chart-line" chart-data="data"
			chart-labels="labels" chart-series="series" chart-options="options"
			chart-dataset-override="datasetOverride" chart-click="onClick">
			</canvas>
		</div>
	</div>
</div>
@endsection