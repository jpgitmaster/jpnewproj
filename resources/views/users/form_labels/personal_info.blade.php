<div ng-if="msg['success']['prsnl']['updated']" ng-cloak>
	<div style="width: 100%;
	    text-align: center;
	    display: inline-block;
	    color: #54c3ec;
	    margin-top: -30px;
	    position: relative;
	    top: -20px;">
		<p style="font: 28px segobl; margin: 0;">
			<%= msg['success']['prsnl']['updated'] %> &nbsp;
			<i class="fa fa-check-circle" style="font-size: 35px;"></i>
		</p>
	</div>
</div>
<div class="row no-gutters">
	<div class="col-lg-4">
		<div class="nptgrp lbld">
			<span class="lbldcntnt">
				<%= frm1.fname ? frm1.fname : '&nbsp;' %>
			</span>
	    	<label class="lbl">
	    		First Name
	    	</label>
	  	</div>
	</div>
	<div class="col-lg-4">
		<div class="nptgrp lbld">
			<span class="lbldcntnt">
				<%= frm1.mname ? frm1.mname : '&nbsp;' %>
			</span>
	    	<label class="lbl">
	    		Middle Name
	    	</label>
	  	</div>
	</div>
	<div class="col-lg-4">
		<div class="nptgrp lbld">
			<span class="lbldcntnt">
				<%= frm1.lname ? frm1.lname : '&nbsp;' %>
			</span>
	    	<label class="lbl">
	    		Last Name
	    	</label>
	  	</div>
	</div>
	<div class="col-lg-6">
		<div class="nptgrp lbld">
			<span class="lbldcntnt">
				<%= frm1.mobile ? frm1.mobile : '&nbsp;' %>
			</span>
	    	<label class="lbl">
	    		Mobile No.
	    	</label>
	  	</div>
	</div>
	<div class="col-lg-6">
		<div class="nptgrp lbld">
			<span class="lbldcntnt">
				<%= frm1.phone ? frm1.phone : '&nbsp;' %>
			</span>
	    	<label class="lbl">
	    		Telephone No.
	    	</label>
	  	</div>
	</div>
	<div class="col-lg-12">
		<div class="nptgrp lbld">
			<span class="lbldcntnt">
				<%= frm1.permanent_address ? frm1.permanent_address : '&nbsp;' %>
			</span>
	    	<label class="lbl">
	    		Permanent Address
	    	</label>
	  	</div>
	</div>
	<div class="col-lg-12">
		<div class="nptgrp lbld">
			<span class="lbldcntnt">
				<%= frm1.present_address ? frm1.present_address : '&nbsp;' %>
			</span>
	    	<label class="lbl">
	    		Present Address
	    	</label>
	  	</div>
	</div>
	
	<div class="col-lg-4">
		<div class="nptgrp lbld">
			<span class="lbldcntnt">
				<%= frm1.gender ? getfltrvalue(gender, frm1.gender, 0) : '&nbsp;' %>
			</span>
	    	<label class="lbl">
	    		Gender
	    	</label>
	  	</div>
	</div>
	<div class="col-lg-4">
		<div class="nptgrp lbld">
			<span class="lbldcntnt">
				<%= frm1.bday ? frm1.bday : '&nbsp;' %>
			</span>
	    	<label class="lbl">
	    		Gender
	    	</label>
	  	</div>
	</div>
	<div class="col-lg-4">
		<div class="nptgrp lbld">
			<span class="lbldcntnt">
				<%= frm1.bplace ? frm1.bplace : '&nbsp;' %>
			</span>
	    	<label class="lbl">
	    		Gender
	    	</label>
	  	</div>
	</div>
	<div class="col-lg-4">
		<div class="nptgrp lbld">
			<span class="lbldcntnt">
				<%= frm1.gender ? getfltrvalue(cstatus, frm1.cstatus, 0) : '&nbsp;' %>
			</span>
	    	<label class="lbl">
	    		Civil Status
	    	</label>
	  	</div>
	</div>
	<div class="col-lg-4">
		<div class="nptgrp lbld">
			<span class="lbldcntnt">
				<%= frm1.country ? getfltrvalue(countries, frm1.country, 1) : '&nbsp;' %>
			</span>
	    	<label class="lbl">
	    		Country
	    	</label>
	  	</div>
	</div>
	<div class="col-lg-4">
		<div class="nptgrp lbld">
			<span class="lbldcntnt">
				<%= frm1.nationality ? getfltrvalue(countries, frm1.nationality, 2) : '&nbsp;' %>
			</span>
	    	<label class="lbl">
	    		Nationality
	    	</label>
	  	</div>
	</div>
	<div class="col-lg-12">
		<div class="nptgrp lbld">
			<span class="lbldcntnt">
				<%= frm1.objectives ? frm1.objectives : '&nbsp;' %>
			</span>
	    	<label class="lbl">
	    		Career Objectives
	    	</label>
	  	</div>
	</div>
</div>
<div class="crdftr">
	<div class="btmctns">
		<button class="btn btn-primary" type="button" ng-click="openForm(forms[0]['cardnum'], 1)">
			Edit &nbsp; <i class="fa fa-pencil-square-o"></i>
		</button>
	</div>
</div>