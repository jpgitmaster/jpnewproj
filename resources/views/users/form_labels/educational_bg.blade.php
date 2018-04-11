<div class="btmctns">
	<button class="btn btn-primary btn-edt" type="button" ng-click="openForm(forms[1]['cardnum'], 1)">
		Edit &nbsp; <i class="fa fa-pencil-square-o"></i>
	</button>
</div>
<div class="clearfix"></div>
<div class="row no-gutters" style="margin-top: 10px; margin-bottom: 20px;">
	<div class="col-lg-12">
		<div class="bx lbld">
			<div class="nptgrp">
				<span class="vlue">
					<%= schl.school ? schl.school : '&nbsp;' %>
				</span>
	    	<label class="nptlbl">
	    		School <span>*</span>
	    	</label>
	  	</div>
	  </div>
	</div>
	<div class="col-lg-6">
		<div class="bx lbld">
			<div class="nptgrp">
				<span class="vlue">
					<%= schl.course ? schl.course : '&nbsp;' %>
				</span>
	    	<label class="nptlbl">
	    		Course <span>*</span>
	    	</label>
	  	</div>
	  </div>
	</div>
	<div class="col-lg-3">
		<div class="bx lbld">
			<div class="nptgrp">
				<span class="vlue">
					<%= schl.sdate ? schl.sdate : '&nbsp;' %>
				</span>
	    	<label class="nptlbl">
	    		Start Date <span>*</span>
	    	</label>
	  	</div>
	  </div>
	</div>
	<div class="col-lg-3">
		<div class="bx lbld">
			<div class="nptgrp">
				<span class="vlue">
					<%= schl.edate ? schl.edate : '&nbsp;' %>
				</span>
	    	<label class="nptlbl">
	    		End Date <span>*</span>
	    	</label>
	  	</div>
	  </div>
	</div>
	<div class="col-lg-12" ng-if="schl.awardsrecognition" ng-cloak>
		<div class="bx lbld">
			<div class="nptgrp">
				<span class="vlue">
					<div ng-bind-html="schl.awardsrecognition" ng-if="schl.awardsrecognition" ng-cloak></div>
					<div ng-if="!schl.awardsrecognition" ng-cloak>
						&nbsp;
					</div>
				</span>
	    	<label class="nptlbl">
	    		Awards and Recognition
	    	</label>
	  	</div>
	  </div>
	</div>
</div>