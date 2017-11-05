@extends('users.index')
@section('title', 'Dashboard')

@section('content')
<div id="edit_profile" ng-controller="ctrlEditProfile">
	<div class="grdprofile">
		<div class="content_right">
			<div class="avatar cntnbx">
				<div class="ttl">
				    <h3>Display Picture</h3>
				    <div class="btmbrdr"><hr></div>
				</div>
				<div class="dsplaypc">
					<span ng-if="!imgtarget && !usr[0]['imgname']" ng-cloak>
						<i class="fa fa-user-circle-o"></i>
					</span>

					<span ng-if="imgtarget" ng-cloak>
						<div class="prvw">
				            <div class="preview-pane">
				                <div class="preview-container">
				                  <span ng-if="imgtarget" ng-cloak>
				                    <img ng-src="<%=imgtarget%>" alt="Display Picture" />
				                  </span>
				                </div>
				            </div>
				        </div>
				    </span>
				    <span ng-if="!imgtarget && usr[0]['imgname']" ng-cloak>
				    	<div class="prvw ltstdp">
				            <div class="preview-pane">
				                <div class="preview-container">
				    				<img ng-src="{{URL::asset('avatars')}}/<%=usr[0]['imgname']%>?<%=timestamp()%>" alt="Display Picture" />
				    			</div>
				            </div>
				        </div>
				    </span>
				</div>
				<div class="clearfix"></div>
				<div class="btns">
					<div class="fileUpload btn btn-primary">
		            	<div class="nptgrp err am-flip-x" ng-if="msg['dp']" ng-cloak>
							<div class="popcntnr">
			                    <div class="popover bs-popover-top" ng-class="{'success': msg['dp']['success']}">
								    <div class="arrow"></div>
								    <div class="popover-body">
								    	<span class="rmve" ng-click="msg['dp'] = ''">
				            				<i class="fa fa-close"></i>
	  			            			</span>
								      	<ul ng-if="msg['dp']['error']['file']" ng-cloak>
											<li ng-repeat="err in msg['dp']['error']['file']">
												<%=err%>
											</li>
										</ul>
										<p ng-if="msg['dp']['success']" ng-cloak>
											<%=msg['dp']['success']%>
										</p>
								    </div>
								</div>
			                </div>
		                </div>
	                	Browse <input type="file" class="upload" file-input="files">
		            </div>
		            <button type="button" class="btn btn-danger">
						<i class="fa fa-trash"></i>
					</button>
				</div>
			</div>
			<div class="preview_resume cntnbx">
				<div class="ttl">
				    <h3>Resume</h3>
				    <div class="btmbrdr"><hr></div>
				</div>
				<div class="icns">
					<span ng-if="resume_loader" ng-cloak>
		                <svg width="170px" height="170px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
					      <rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="30" fill="#d6f1ff" stroke="#2b74ba" stroke-width="8px"></circle><line x1="50" y1="50" x2="50" y2="30" stroke="#000" stroke-width="5" stroke-linecap="round" transform="rotate(99.6 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="5s" repeatCount="indefinite"></animateTransform></line><line x1="50" y1="50" x2="50" y2="20" stroke="#f00" stroke-width="2px" stroke-linecap="round" opacity="1" transform="rotate(138 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="1s" repeatCount="indefinite"></animateTransform></line>
					    </svg>
				    </span>
				    <span ng-if="!resume_loader" ng-cloak>
						<span ng-if="!wordoc && !pdf" ng-cloak>
							<i class="fa fa-file-text-o"></i>
						</span>
						<span ng-if="wordoc" ng-cloak>
							<i class="fa fa-file-word-o"></i>
						</span>
						<span ng-if="pdf" ng-cloak>
							<i class="fa fa-file-pdf-o"></i>
						</span>
					</span>
				</div>
				<div class="btns">
					<div class="fileUpload btn btn-primary">
		            	<div class="nptgrp err am-flip-x" ng-if="msg['resume']" ng-cloak>
							<div class="popcntnr">
			                    <div class="popover bs-popover-top" ng-class="{'success': msg['resume']['success']}">
								    <div class="arrow"></div>
								    <div class="popover-body">
								    	<span class="rmve" ng-click="msg['resume'] = ''">
				            				<i class="fa fa-close"></i>
	  			            			</span>
								      	<ul ng-if="msg['resume']['error']['file']" ng-cloak>
											<li ng-repeat="err in msg['resume']['error']['file']">
												<%=err%>
											</li>
										</ul>
										<p ng-if="msg['resume']['success']" ng-cloak>
											<%=msg['resume']['success']%>
										</p>
								    </div>
								</div>
			                </div>
		                </div>
	                	Browse <input type="file" class="upload" file-resume="files">
		            </div>
		            <button type="button" class="btn btn-danger">
						<i class="fa fa-trash"></i>
					</button>
				</div>
			</div>
		</div>
		<div class="content_left">
			<div class="cntnbx">
				<button class="btn btn-success pvw">
					PREVIEW
				</button>
				<div class="ttl">
				    <h3>User Profile</h3>
				    <div class="btmbrdr"><hr></div>
				</div>
				<div id="edtprof_accrdn">
				  <div class="card">
				    <div class="card-header" data-toggle="collapse" href="#collapseOne">
				    	<div class="glyph">
		                    <i class="fa fa-address-card"></i>
		                </div>
				        Personal Information
				    </div>

				    <div id="collapseOne" class="collapse show">
				      <div class="card-body">
				        <div class="row no-gutters">
		              		<div class="col-lg-4">
		              			<div class="bx">
		              				<div class="nptgrp">
							            <input type="text" ng-model="usr.fname" required>
							            <label>First Name <span>*</span></label>
							        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-4">
		              			<div class="bx">
		              				<div class="nptgrp">
							            <input type="text" ng-model="usr.mname" required>
							            <label>Middle Name <span>*</span></label>
							        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-4">
		              			<div class="bx">
		              				<div class="nptgrp">
							            <input type="text" ng-model="usr.lname" required>
							            <label>Last Name <span>*</span></label>
							        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-12">
		              			<div class="bx">
		              				<div class="nptgrp">
							            <input type="text" ng-model="usr.prsnt_addrss" required>
							            <label>Present Address <span>*</span></label>
							        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-12">
		              			<div class="bx">
		              				<div class="nptgrp">
							            <input type="text" ng-model="usr.prmnnt_addrss" required>
							            <label>Permanent Address </label>
							        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-4">
		              			<div class="bx">
		              				<div class="nptgrp">
							            <input type="text" ng-model="usr.email" required>
							            <label>Email <span>*</span></label>
							        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-4">
		              			<div class="bx">
		              				<div class="nptgrp">
							            <input type="text" ng-model="usr.mobile" required>
							            <label>Mobile No. <span>*</span></label>
							        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-4">
		              			<div class="bx">
		              				<div class="nptgrp">
							            <input type="text" ng-model="usr.phone" required>
							            <label>Phone No.</label>
							        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-3">
		              			<div class="bx">
		              				<div class="nptgrp">
							            <input type="text" ng-model="usr.bdate" required>
							            <label>Birthdate <span>*</span></label>
							        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-3">
		              			<div class="bx">
		              				<div class="nptgrp">
							            <input type="text" ng-model="usr.bplace" required>
							            <label>Birthplace <span>*</span></label>
							        </div>
		              			</div>
		              		</div>
		              	</div>
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header collapsed" data-toggle="collapse" href="#collapseTwo">
				        <div class="glyph">
		                    <i class="fa fa-graduation-cap"></i>
		                </div>
				        Educational Background
				    </div>
				    <div id="collapseTwo" class="collapse">
				      <div class="card-body">
				        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header collapsed" data-toggle="collapse" href="#collapseThree">
				        <div class="glyph">
		                    <i class="fa fa-stethoscope"></i>
		                </div>
				        Employment History
				    </div>
				    <div id="collapseThree" class="collapse">
				      <div class="card-body">
				        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
				      </div>
				    </div>
				  </div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->

	<div class="modal fade" id="cropModal">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      	<button type="button" class="close" data-dismiss="modal" ng-click="cancelUpload()">
	          <span>&times;</span>
	        </button>
	      	<div class="ttl">
			    <h3>Change Display Picture</h3>
			    <div class="btmbrdr"><hr></div>
			</div>
	      <div class="modal-body">
	      	<span ng-if="loader" ng-cloak class="loader">
                <svg width="150px" height="150px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
			      <rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="30" fill="#d6f1ff" stroke="#2b74ba" stroke-width="8px"></circle><line x1="50" y1="50" x2="50" y2="30" stroke="#000" stroke-width="5" stroke-linecap="round" transform="rotate(99.6 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="5s" repeatCount="indefinite"></animateTransform></line><line x1="50" y1="50" x2="50" y2="20" stroke="#f00" stroke-width="2px" stroke-linecap="round" opacity="1" transform="rotate(138 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="1s" repeatCount="indefinite"></animateTransform></line>
			    </svg>
		    </span>
	        <div class="prvw">
	            <div class="preview-pane">
	                <div class="preview-container">
	                  <span ng-if="imgtarget" ng-cloak>
	                    <img ng-src="<%=imgtarget%>" alt="Display Picture" />
	                  </span>
	                </div>
	            </div>
	        </div>
            <div class="imgcropper" jp-custom-crop>
              <img ng-src="<%=imgtarget%>" alt="Cropping Image" id="target" />
            </div> 
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal" ng-click="cancelUpload()">Close</button>
	        <button type="button" class="btn btn-success" ng-click="uploadFile(files)">Crop Image</button>
	      </div>
	    </div>
	  </div>
	</div>
</div>
@endsection