<div class="btmctns">
	<button class="btn btn-primary btn-edt" type="button" ng-click="openForm(forms[1]['cardnum'], 1)">
		Edit &nbsp; <i class="fa fa-pencil-square-o"></i>
	</button>
</div>
<div class="row no-gutters">
	<div class="col-lg-12">
		<div class="nptgrp lbld">
			<span class="lbldcntnt">
				<%= schl.school ? schl.school : '&nbsp;' %>
			</span>
	    	<label class="lbl">
	    		School
	    	</label>
	  	</div>
	</div>
	<div class="col-lg-6">
		<div class="nptgrp lbld">
			<span class="lbldcntnt">
				<%= schl.course ? schl.course : '&nbsp;' %>
			</span>
	    	<label class="lbl">
	    		Course
	    	</label>
	  	</div>
	</div>
	<div class="col-lg-3">
		<div class="nptgrp lbld">
			<span class="lbldcntnt">
				<%= schl.sdate ? schl.sdate : '&nbsp;' %>
			</span>
	    	<label class="lbl">
	    		Start Date
	    	</label>
	  	</div>
	</div>
	<div class="col-lg-3">
		<div class="nptgrp lbld">
			<span class="lbldcntnt">
				<%= schl.edate ? schl.edate : '&nbsp;' %>
			</span>
	    	<label class="lbl">
	    		End Date
	    	</label>
	  	</div>
	</div>
	<div class="col-lg-12">
		<div class="nptgrp lbld">
			<span class="lbldcntnt">
				<div ng-bind-html="schl.awardsrecognition" ng-if="schl.awardsrecognition" ng-cloak></div>
				<div ng-if="!schl.awardsrecognition" ng-cloak>
					&nbsp;
				</div>
			</span>
	    	<label class="lbl">
	    		Awards and Recognition
	    	</label>
	  	</div>
	</div>
</div>