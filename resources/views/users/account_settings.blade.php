@extends('users.index')
@section('title', 'Account Settings')

@section('content')
<div class="cntntwrpr">
	<div class="cntntwrpr_rght">
		<div class="cntnbx">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, vel? Aperiam nobis delectus dolor vero. Animi soluta, repellat dolor, neque error, esse aliquid nulla repudiandae natus ipsa voluptatem consectetur numquam?
		</div>
	</div>
	<div class="cntntwrpr_lft">
		<div class="cntnbx">
			<div class="ttl">
			    <h3>Account Settings</h3>
			    <div class="btmbrdr"><hr></div>
			</div>
			
			<div class="lnr">
				<div class="ttlnm">
					<h4 class="ttl">Username</h4>
				</div>
				<div class="cntntdsc">
					<div class="row no-gutters">
						<div class="col-lg-12">
							<div class="nptgrp lbld">
								<a href="">
									<span class="lbldcntnt">http://247globalnursingsolution.com/<span ng-if="usr.username" ng-cloak><%=usr.username | lowercase%></span></span>
								</a>
					        	<label class="lbl">Your Profile Link</label>
					      	</div>
						</div>
					</div>
				</div>
			</div>


			<div class="lnr">
			  <div class="ttlnm">
			    <h4 class="ttl">Password</h4>
			  </div>
			  <div class="cntntdsc">
			    <div class="row no-gutters">
			      <div class="col-lg-12">
			        <div class="bx">
			          <div class="nptgrp lbld">
			            <span class="lbldcntnt pscode">* * * * * *</span>
			            <label class="lbl">Updated about 2 months ago</label>
			          </div>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>

			<div class="lnr">
				<div class="ttlnm">
					<h4 class="ttl">External Links</h4>
				</div>
				<div class="cntntdsc">
					<div class="row no-gutters">
						<div class="col-lg-6">
							<div class="bx">
								<div class="nptgrp lbld">
									<span class="lbldcntnt"></span>
						        	<label class="lbl">Personal Website</label>
						      	</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="bx">
								<div class="nptgrp lbld">
									<span class="lbldcntnt"></span>
						        	<label class="lbl">Facebook</label>
						      	</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="bx">
								<div class="nptgrp lbld">
									<span class="lbldcntnt"></span>
						        	<label class="lbl">Twitter</label>
						      	</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="bx">
								<div class="nptgrp lbld">
									<span class="lbldcntnt"></span>
						        	<label class="lbl">Instagram</label>
						      	</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- <h3>Password</h3>
			<div class="row no-gutters">
          		<div class="col-lg-4">
          			<div class="bx">
          				<div class="nptgrp">
				            <input type="text" ng-model="usr.oldpass" required>
				            <label class="nptlbl">Old Password <span>*</span></label>
				        </div>
          			</div>
          		</div>
          		<div class="col-lg-4">
          			<div class="bx">
          				<div class="nptgrp">
				            <input type="text" ng-model="usr.newpass" required>
				            <label class="nptlbl">New Password <span>*</span></label>
				        </div>
          			</div>
          		</div>
          		<div class="col-lg-4">
          			<div class="bx">
          				<div class="nptgrp">
				            <input type="text" ng-model="usr.confirmpass" required>
				            <label class="nptlbl">Confirm Password <span>*</span></label>
				        </div>
          			</div>
          		</div>
          	</div>

          	<h3>External Links</h3>
          	<div class="row no-gutters">
          		<div class="col-lg-6">
          			<div class="bx">
          				<div class="nptgrp">
				            <input type="text" ng-model="usr.website" required>
				            <label class="nptlbl">Personal Website </label>
				        </div>
          			</div>
          		</div>
          		<div class="col-lg-6">
          			<div class="bx">
          				<div class="nptgrp">
				            <input type="text" ng-model="usr.fb" required>
				            <label class="nptlbl">Facebook <span>*</span></label>
				        </div>
          			</div>
          		</div>
          		<div class="col-lg-6">
          			<div class="bx">
          				<div class="nptgrp">
				            <input type="text" ng-model="usr.twtr" required>
				            <label class="nptlbl">Twitter </label>
				        </div>
          			</div>
          		</div>
          		<div class="col-lg-6">
          			<div class="bx">
          				<div class="nptgrp">
				            <input type="text" ng-model="usr.ig" required>
				            <label class="nptlbl">Instagram </label>
				        </div>
          			</div>
          		</div>
          	</div>  -->
		</div>
	</div>
</div>
@endsection