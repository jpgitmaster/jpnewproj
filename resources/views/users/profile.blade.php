@extends('users.index')
@section('title', 'Dashboard')

@section('content')
<div id="edit_profile" ng-controller="ctrlEditProfile">
	<div class="cntntwrpr">
		<div class="cntntwrpr_rght">
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
		            <div class="dltbtn">
		            	<div class="nptgrp am-flip-x" ng-if="dltdp" ng-cloak>
							<div class="popcntnr">
			                    <div class="popover bs-popover-top" ng-class="{'success': msg['dpimg']['dlt']['success']}">
								    <div class="arrow"></div>
								    <div class="popover-body">
								    	<div ng-if="!msg['dpimg']['dlt']['success']" ng-cloak>
									    	<p>
									    		Are you sure you want to delete your display picture?
									    	</p>
									    	<div class="btns">
									    		<button class="btn btn-primary" ng-click="deleteRecord(0)">
									    			Yes
									    		</button>
									    		<button type="button" class="btn btn-danger" ng-click="clsbbl(0)">
									    			No
									    		</button>
									    	</div>
									    </div>
								    	<div ng-if="msg['dpimg']['dlt']['success']" ng-cloak>
									    	<span class="rmve" ng-click="msg['dpimg']['dlt']['success'] = ''; clsbbl(0)">
					            				<i class="fa fa-close"></i>
		  			            			</span>
									    	<p>
												<%=msg['dpimg']['dlt']['success']%>
											</p>
										</div>
								    </div>
								</div>
			                </div>
		                </div>
		                <button type="button" class="btn btn-danger" ng-click="dltdp = !dltdp" ng-disabled="!usr[0]['imgname']" ng-cloak>
			            	<i class="fa fa-trash"></i>
						</button>
		            </div>
				</div>
			</div>
			<div class="preview_resume cntnbx">
				<div class="ttl">
				    <h3>Resume</h3>
				    <div class="btmbrdr"><hr></div>
				</div>
				<div class="icns">
					<span ng-if="resume_loader" ng-cloak>
		                <svg width="145px" height="145px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
					      <rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="30" fill="#d6f1ff" stroke="#2b74ba" stroke-width="8px"></circle><line x1="50" y1="50" x2="50" y2="30" stroke="#000" stroke-width="5" stroke-linecap="round" transform="rotate(99.6 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="5s" repeatCount="indefinite"></animateTransform></line><line x1="50" y1="50" x2="50" y2="20" stroke="#f00" stroke-width="2px" stroke-linecap="round" opacity="1" transform="rotate(138 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="1s" repeatCount="indefinite"></animateTransform></line>
					    </svg>
				    </span>
				    <div ng-if="!resume_loader" ng-cloak class="cntnt">
					    <div class="fnticn">
							<span ng-if="!usr[0]['rsmext']" ng-cloak>
								<i class="fa fa-file-text-o"></i>
							</span>
							<span ng-if="usr[0]['rsmext'] == 'doc' || usr[0]['rsmext'] == 'docx'" ng-cloak>
								<i class="fa fa-file-word-o"></i>
							</span>
							<span ng-if="usr[0]['rsmext'] == 'pdf'" ng-cloak>
								<i class="fa fa-file-pdf-o"></i>
							</span>
						</div>
						<div class="lbls" ng-class="{'nocntnt': !usr[0]['rsmname']}">
							<div class="lbl">
								<strong>TYPE:</strong> <%=usr[0]['rsmext']%>
							</div>
							<div class="lbl">
								<strong>SIZE:</strong> <%=usr[0]['rsmsize'] / 1000 | number: 1%> KB
							</div>
							<div class="lbl">
								<a href="{{URL::asset('resumes')}}/<%=usr[0]['rsmname']%>?<%=timestamp()%>" target="_blank" class="btn btn-success">
									Download Resume
								</a>
							</div>
						</div>
					</div>
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
		            <div class="dltbtn">
		            	<div class="nptgrp am-flip-x" ng-if="dltrsm" ng-cloak>
							<div class="popcntnr">
			                    <div class="popover bs-popover-top" ng-class="{'success': msg['rsm']['dlt']['success']}">
								    <div class="arrow"></div>
								    <div class="popover-body">
								    	<div ng-if="!msg['rsm']['dlt']['success']" ng-cloak>
									    	<p>
									    		Are you sure you want to delete your resume?
									    	</p>
									    	<div class="btns">
									    		<button class="btn btn-primary" type="button" ng-click="deleteRecord(1)">
									    			Yes
									    		</button>
									    		<button class="btn btn-danger" type="button" ng-click="clsbbl(1)">
									    			No
									    		</button>
									    	</div>
								    	</div>
								    	<div ng-if="msg['rsm']['dlt']['success']" ng-cloak>
									    	<span class="rmve" ng-click="msg['rsm']['dlt']['success'] = ''; clsbbl(1)">
					            				<i class="fa fa-close"></i>
		  			            			</span>
									    	<p>
												<%=msg['rsm']['dlt']['success']%>
											</p>
										</div>

								    </div>
								</div>
			                </div>
		                </div>
		                <button type="button" class="btn btn-danger" ng-click="dltrsm = !dltrsm" ng-disabled="!usr[0]['rsmname']" ng-cloak>
			            	<i class="fa fa-trash"></i>
						</button>
		            </div>
				</div>
			</div>
		</div>
		<div class="cntntwrpr_lft">
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
				    <div class="card-header" ng-click="collapseTab(1)">
				    	<div class="glyph">
		                    <i class="fa fa-address-card"></i>
		                </div>
				        Personal Information
				        <i class="fa fa-chevron-down"></i>
				    </div>

				    <div class="collapse">
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
		              		<div class="col-lg-3">
		              			<div class="bx">
		              				<div class="nptgrp">
							            <input type="text" ng-model="usr.gender" required>
							            <label>Gender <span>*</span></label>
							        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-4">
		              			<div class="bx">
		              				<div class="nptgrp">
							            <input type="text" ng-model="usr.bdate" required>
							            <label>Birthdate <span>*</span></label>
							            <span class="btmlbl">
							            	<strong>Format:</strong> mm/dd/yyyy
							            </span>
							        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-4">
		              			<div class="bx">
		              				<div class="nptgrp">
							            <input type="text" ng-model="usr.bplace" required>
							            <label>Birthplace <span>*</span></label>
							        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-1">
		              			<div class="bx">
		              				<div class="nptgrp">
							            <input type="text" ng-model="usr.age" required>
							            <label>Age <span>*</span></label>
							        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-4">
		              			<div class="bx">
		              				<div class="nptgrp">
							            <input type="text" ng-model="usr.cstatus" required>
							            <label>Civil Status <span>*</span></label>
							        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-4">
		              			<div class="bx">
		              				<div class="nptgrp">
							            <input type="text" ng-model="usr.country" required>
							            <label>Country <span>*</span></label>
							        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-4">
		              			<div class="bx">
		              				<div class="nptgrp">
							            <input type="text" ng-model="usr.nationality" required>
							            <label>Nationality <span>*</span></label>
							        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-12">
		              			<div class="bx">
		              				<div class="nptgrp">
							            <textarea cols="30" rows="10" ng-model="usr.cobjectives" required></textarea>
							            <label>Career Objectives <span>*</span></label>
							        </div>
		              			</div>
		              		</div>
		              	</div> 
						<div class="crdftr" style="margin-top: 0;">
			              	<button class="btn btn-success" type="submit">
			              		Save Changes
			              	</button>
		              	</div>
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" ng-click="collapseTab(2)">
				        <div class="glyph">
		                    <i class="fa fa-phone"></i>
		                </div>
				        Contact Details

				        <i class="fa fa-chevron-down"></i>
				    </div>
				    <div class="collapse">
				      <div class="card-body">
				        <div class="row no-gutters">
		              		<div class="col-lg-4">
		              			<div class="bx">
		              				<div class="nptgrp">
							            <input type="text" ng-model="usr.email" required>
							            <label>Email <span>*</span></label>
							            <span class="btmlbl">
							            	<strong>e.g.</strong> yourname@gmail.com
							            </span>
							        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-4">
		              			<div class="bx">
		              				<div class="nptgrp">
							            <input type="text" ng-model="usr.mobile" required>
							            <label>Mobile No. <span>*</span></label>
							            <span class="btmlbl">
							            	<strong>e.g.</strong> 0917-123-4567
							            </span>
							        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-4">
		              			<div class="bx">
		              				<div class="nptgrp">
							            <input type="text" ng-model="usr.phone" required>
							            <label>Phone No.</label>
							            <span class="btmlbl">
							            	<strong>e.g.</strong> (632) 765-4321
							            </span>
							        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-12">
		              			<div class="bx">
		              				<div class="nptgrp">
							            <input type="text" ng-model="usr.prsnt_addrss" required>
							            <label>Present Address <span>*</span></label>
							            <span class="btmlbl">
							            	Unit No., House/Bldg./St. No. + Street Name, Postal Code
							            </span>
							        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-12">
		              			<div class="bx">
		              				<div class="nptgrp">
							            <input type="text" ng-model="usr.prmnnt_addrss" required>
							            <label>Permanent Address </label>
							            <span class="btmlbl">
							            	Unit No., House/Bldg./St. No. + Street Name, Postal Code
							            </span>
							        </div>
		              			</div>
		              		</div>
		              	</div>
						<div class="crdftr">
			              	<button class="btn btn-success" type="submit">
			              		Save Changes
			              	</button>
		              	</div>
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" ng-click="collapseTab(3)">
				        <div class="glyph">
		                    <i class="fa fa-graduation-cap"></i>
		                </div>
				        Educational Background

				        <i class="fa fa-chevron-down"></i>
				    </div>
				    <div class="collapse">
				      <div class="card-body">
				        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" ng-click="collapseTab(2)">
				        <div class="glyph">
		                    <i class="fa fa-stethoscope"></i>
		                </div>
				        Employment History

				        <i class="fa fa-chevron-down"></i>
				    </div>
				    <div class="collapse">
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