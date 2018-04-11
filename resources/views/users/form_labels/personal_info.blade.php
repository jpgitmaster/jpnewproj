<div class="btmctns">
	<button class="btn btn-primary btn-edt" type="button" ng-click="openForm(forms[0]['cardnum'], 1)">
		Edit &nbsp; <i class="fa fa-pencil-square-o"></i>
	</button>
</div>
<div class="clearfix"></div>
<div class="row no-gutters" style="margin-top: 10px; margin-bottom: 20px;">
	<div class="col-lg-4">
		<div class="bx lbld">
			<div class="nptgrp">
				<span class="vlue">
					<%= frm1.fname ? frm1.fname : '&nbsp;' %>
				</span>
	    	<label class="nptlbl">
	    		First Name <span>*</span>
	    	</label>
	  	</div>
  	</div>
	</div>
	<div class="col-lg-4">
		<div class="bx lbld">
			<div class="nptgrp">
				<span class="vlue">
					<%= frm1.mname ? frm1.mname : '&nbsp;' %>
				</span>
	    	<label class="nptlbl">
	    		Middle Name <span>*</span>
	    	</label>
		  </div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="bx lbld">
			<div class="nptgrp">
				<span class="vlue">
					<%= frm1.lname ? frm1.lname : '&nbsp;' %>
				</span>
	    	<label class="nptlbl">
	    		Last Name <span>*</span>
	    	</label>
	  	</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="bx lbld">
			<div class="nptgrp">
				<span class="vlue">
					<%= frm1.mobile ? frm1.mobile : '&nbsp;' %>
				</span>
	    	<label class="nptlbl">
	    		Mobile No. <span>*</span>
	    	</label>
	  	</div>
  	</div>
	</div>
	<div class="col-lg-6">
		<div class="bx lbld">
			<div class="nptgrp">
				<span class="vlue">
					<%= frm1.phone ? frm1.phone : '&nbsp;' %>
				</span>
	    	<label class="nptlbl">
	    		Telephone No.
	    	</label>
	  	</div>
	  </div>
	</div>
	<div class="col-lg-12">
		<div class="bx lbld">
			<div class="nptgrp">
				<span class="vlue">
					<%= frm1.present_address ? frm1.present_address : '&nbsp;' %>
				</span>
	    	<label class="nptlbl">
	    		Present Address <span>*</span>
	    	</label>
	  	</div>
	  </div>
	</div>

	<div class="col-lg-12">
		<div class="bx lbld">
			<div class="nptgrp">
				<span class="vlue">
					<%= frm1.permanent_address ? frm1.permanent_address : '&nbsp;' %>
				</span>
	    	<label class="nptlbl">
	    		Permanent Address
	    	</label>
	  	</div>
	  </div>
	</div>
	
	<div class="col-lg-4">
		<div class="bx lbld">
			<div class="nptgrp">
				<span class="vlue">
					<%= frm1.gender ? getfltrvalue(gender, frm1.gender, 0) : '&nbsp;' %>
				</span>
	    	<label class="nptlbl">
	    		Gender
	    	</label>
	  	</div>
	  </div>
	</div>
	<div class="col-lg-4">
		<div class="bx lbld">
			<div class="nptgrp">
				<span class="vlue">
					<%= frm1.bday ? frm1.bday : '&nbsp;' %>
				</span>
	    	<label class="nptlbl">
	    		Birthdate <span>*</span>
	    	</label>
	  	</div>
	  </div>
	</div>
	<div class="col-lg-4">
		<div class="bx lbld">
			<div class="nptgrp">
				<span class="vlue">
					<%= frm1.bplace ? frm1.bplace : '&nbsp;' %>
				</span>
	    	<label class="nptlbl">
	    		Birthplace <span>*</span>
	    	</label>
	  	</div>
	  </div>
	</div>
	<div class="col-lg-4">
		<div class="bx lbld">
			<div class="nptgrp">
				<span class="vlue">
					<%= frm1.gender ? getfltrvalue(cstatus, frm1.cstatus, 0) : '&nbsp;' %>
				</span>
	    	<label class="nptlbl">
	    		Civil Status <span>*</span>
	    	</label>
	  	</div>
	  </div>
	</div>
	<div class="col-lg-4">
		<div class="bx lbld">
			<div class="nptgrp">
				<span class="vlue">
					<%= frm1.country ? getfltrvalue(countries, frm1.country, 1) : '&nbsp;' %>
				</span>
	    	<label class="nptlbl">
	    		Country <span>*</span>
	    	</label>
	  	</div>
	  </div>
	</div>
	<div class="col-lg-4">
		<div class="bx lbld">
			<div class="nptgrp">
				<span class="vlue">
					<%= frm1.nationality ? getfltrvalue(countries, frm1.nationality, 2) : '&nbsp;' %>
				</span>
		  	<label class="nptlbl">
		  		Nationality <span>*</span>
		  	</label>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="bx lbld">
			<div class="nptgrp">
				<span class="vlue">
					<%= frm1.objectives ? frm1.objectives : '&nbsp;' %>
				</span>
	    	<label class="nptlbl">
	    		Career Objectives <span>*</span>
	    	</label>
	  	</div>
	  </div>
	</div>
</div>