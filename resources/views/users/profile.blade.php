@extends('users.index')
@section('title', 'Edit Profile')

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
				    				<img ng-src="{{URL::asset('avatars')}}/<%=usr[0]['imgname']%><%=currentime%>" alt="Display Picture" ng-cloak />
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
							<div class="lbl" ng-if="usr[0]['rsmname']" ng-cloak>
								<a href="{{URL::asset('resumes')}}/<%=usr[0]['rsmname']%>" target="_blank" class="btn btn-success">
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
								    	<p>Are you sure you want to delete your resume?</p>
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
				<div class="ttl">
			    <h3>User Profile</h3>
			    <div class="btmbrdr"><hr></div>
				</div>
				<div id="topfrms" class="row no-gutters">
					<div class="col-lg-3">
						<div class="bx">
							<div class="nptgrp">
	    					<select required>
	                <option value=""></option>
	              </select>
		            <label class="nptlbl">
		            	Work Availability <span>*</span>
		            </label>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="bx">
							<div class="nptgrp">
	    					<select required>
	                <option value=""></option>
	              </select>
		            <label class="nptlbl">
		            	Type of Work <span>*</span>
		            </label>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<button class="btn btn-success pvw" type="button" ng-click="viewResume(jpemps)">
							PREVIEW
						</button>
					</div>
				</div>
				<div id="edtprof_accrdn">
				  <div class="card">
				    <button class="card-header" ng-click="collapseTab(1)" type="button">
				    	<div class="glyph">
                <i class="fa fa-address-card"></i>
              </div>
			        Personal Information
			        <i class="fa fa-chevron-down"></i>
				    </button>
				    <div class="alert am-fade" ng-if="success_prsnl" ng-cloak>
							<i class="fa fa-check-circle"></i>
							<span>
								<%=msg['success']['prsnl']['added']%>
								<%=msg['success']['prsnl']['updated']%>
							</span>
						</div>
				    <div class="collapse">
				      <div class="card-body">
				      	<div class="crdbdy">
					      	<div class="frmldr" ng-if="!forms[0] || frm1_loader" ng-cloak>
		                <svg width="145px" height="145px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
							      	<rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="30" fill="#d6f1ff" stroke="#2b74ba" stroke-width="8px"></circle><line x1="50" y1="50" x2="50" y2="30" stroke="#000" stroke-width="5" stroke-linecap="round" transform="rotate(99.6 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="5s" repeatCount="indefinite"></animateTransform></line><line x1="50" y1="50" x2="50" y2="20" stroke="#f00" stroke-width="2px" stroke-linecap="round" opacity="1" transform="rotate(138 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="1s" repeatCount="indefinite"></animateTransform></line>
							    	</svg>
						    	</div>
							    <div ng-if="!forms[0]['actvform']" ng-cloak>
							    	<div ng-include src="'/user/lbl_personal_info'"></div>
	              	</div>
              		<div class="clearfix"></div>
              		<div ng-if="forms[0]['actvform']" ng-cloak>
							    	<button type="button" class="cls" ng-click="openForm(forms[0]['cardnum'], 0)" ng-if="frmx1" ng-cloak>
						          <i class="fa fa-times"></i>
						        </button>
						      	<form name="formProf1" ng-submit="savePersonalInfo(frm1)" novalidate>
							        <div class="row no-gutters">
			              		<div class="col-lg-4">
			              			<div class="bx">
			              				<div class="nptgrp" ng-class="{'err': msg['error']['prsnl']['fname']}" ng-mouseover="fcs_fname = true" ng-mouseleave="fcs_fname = false">
								            	<input type="text" ng-model="frm1.fname" required>
								            	<label class="nptlbl">First Name <span>*</span></label>
								            	<div class="am-flip-x popcntnr" ng-if="msg['error']['prsnl']['fname'] && fcs_fname === true" ng-cloak>
			                        	<div class="popover bs-popover-top">
															    <div class="arrow"></div>
															    <div class="popover-body">
															      <%= msg['error']['prsnl']['fname'][0] %>
															    </div>
																</div>
							                </div>
								        		</div>
			              			</div>
			              		</div>
			              		<div class="col-lg-4">
			              			<div class="bx">
			              				<div class="nptgrp" ng-class="{'err': msg['error']['prsnl']['mname']}" ng-mouseover="fcs_mname = true" ng-mouseleave="fcs_mname = false">
								            	<input type="text" ng-model="frm1.mname" required>
								            	<label class="nptlbl">Middle Name <span>*</span></label>
								            	<div class="am-flip-x popcntnr" ng-if="msg['error']['prsnl']['mname'] && fcs_mname === true" ng-cloak>
			                        	<div class="popover bs-popover-top">
															    <div class="arrow"></div>
															    <div class="popover-body">
															      <%= msg['error']['prsnl']['mname'][0] %>
															    </div>
																</div>
							                </div>
								        		</div>
			              			</div>
			              		</div>
			              		<div class="col-lg-4">
			              			<div class="bx">
			              				<div class="nptgrp" ng-class="{'err': msg['error']['prsnl']['lname']}" ng-mouseover="fcs_lname = true" ng-mouseleave="fcs_lname = false">
								            	<input type="text" ng-model="frm1.lname" required>
								            	<label class="nptlbl">Last Name <span>*</span></label>
								            	<div class="am-flip-x popcntnr" ng-if="msg['error']['prsnl']['lname'] && fcs_lname === true" ng-cloak>
			                        	<div class="popover bs-popover-top">
															    <div class="arrow"></div>
															    <div class="popover-body">
															      <%= msg['error']['prsnl']['lname'][0] %>
															    </div>
																</div>
							                </div>
							        			</div>
			              			</div>
			              		</div>
			              		<div class="col-lg-6">
			              			<div class="bx">
			              				<div class="nptgrp" ng-class="{'err': msg['error']['prsnl']['mobile']}" ng-mouseover="fcs_mobile = true" ng-mouseleave="fcs_mobile = false">
									            <input type="text" ng-model="frm1.mobile" required>
									            <label class="nptlbl">Mobile No. <span>*</span></label>
									            <div class="am-flip-x popcntnr" ng-if="msg['error']['prsnl']['mobile'] && fcs_mobile === true" ng-cloak>
			                        	<div class="popover bs-popover-top">
															    <div class="arrow"></div>
															    <div class="popover-body">
															      <%= msg['error']['prsnl']['mobile'][0] %>
															    </div>
																</div>
							                </div>
									            <span class="btmlbl">
									            	<strong>e.g.</strong> 0917-123-4567
									            </span>
								        		</div>
			              			</div>
			              		</div>
			              		<div class="col-lg-6">
			              			<div class="bx">
			              				<div class="nptgrp" ng-class="{'err': msg['error']['prsnl']['phone']}" ng-mouseover="fcs_phone = true" ng-mouseleave="fcs_phone = false">
								            	<input type="text" ng-model="frm1.phone" required>
								            	<label class="nptlbl">Phone No.</label>
								            	<div class="am-flip-x popcntnr" ng-if="msg['error']['prsnl']['phone'] && fcs_phone === true" ng-cloak>
			                        	<div class="popover bs-popover-top">
												    			<div class="arrow"></div>
															    <div class="popover-body">
															      <%= msg['error']['prsnl']['phone'][0] %>
															    </div>
																</div>
							                </div>
									            <span class="btmlbl">
									            	<strong>e.g.</strong> (632) 765-4321
									            </span>
								        		</div>
			              			</div>
			              		</div>
			              		<div class="col-lg-12">
			              			<div class="bx">
			              				<div class="nptgrp" ng-class="{'err': msg['error']['prsnl']['present_address']}" ng-mouseover="fcs_present_address = true" ng-mouseleave="fcs_present_address = false">
								            	<input type="text" ng-model="frm1.present_address" ng-change="makeSameAddress(check, frm1)" required>
								            	<label class="nptlbl">Present Address <span>*</span></label>
								            	<div class="am-flip-x popcntnr" ng-if="msg['error']['prsnl']['present_address'] && fcs_present_address === true" ng-cloak>
			                        	<div class="popover bs-popover-top">
												    			<div class="arrow"></div>
															    <div class="popover-body">
															      <%= msg['error']['prsnl']['present_address'][0] %>
															    </div>
																</div>
							                </div>
									            <span class="btmlbl">
									            	Unit No., House/Bldg./St. No. + Street Name, Postal Code
									            </span>
										        </div>
			              			</div>
			              		</div>
			              		<div class="col-lg-12">
			              			<div class="bx">
			              				<div class="nptgrp" ng-class="{'err': msg['error']['prsnl']['permanent_address']}" ng-mouseover="fcs_permanent_address = true" ng-mouseleave="fcs_permanent_address = false">
								            	<input type="text" ng-model="frm1.permanent_address" ng-change="makeSameAddress(check, frm1)" required>
								            	<label class="nptlbl">Permanent Address </label>
								            	<div class="am-flip-x popcntnr" ng-if="msg['error']['prsnl']['permanent_address'] && fcs_permanent_address === true" ng-cloak>
			                        	<div class="popover bs-popover-top">
												    			<div class="arrow"></div>
															    <div class="popover-body">
															      <%= msg['error']['prsnl']['permanent_address'][0] %>
															    </div>
																</div>
							                </div>
									            <span class="btmlbl">
									            	Unit No., House/Bldg./St. No. + Street Name, Postal Code
									            </span>
									            <label class="ctrl">
												        Same as Present Address
												        <input type="checkbox" ng-model="check" ng-change="makeSameAddress(check, frm1)" ng-checked="frm1.present_address == frm1.permanent_address" />
												        <div class="ctrl_indicator"></div>
												   		</label>
								        		</div>
			              			</div>
			              		</div>
			              		<div class="col-lg-4">
			              			<div class="bx">
			              				<div class="nptgrp radio" ng-class="{'err': msg['error']['prsnl']['gender']}">
								            	<label class="nptlbl">Gender: <span>*</span></label>
				              				<div class="rdbx" ng-mouseover="fcs_gndr = true" ng-mouseleave="fcs_gndr = false">
				              					<div class="mlbx">
				                          <input type="radio" id="male" class="btnbx" ng-class="{'actv': frm1.gender == 2}" ng-model="frm1.gender" value="2" required>
				                          <label for="male">Male</label>
				                        </div>
				                        <div class="fmlbx">
				                          <input type="radio" id="female" class="btnbx" ng-class="{'actv': frm1.gender == 1}" ng-model="frm1.gender" value="1" required>
				                          <label for="female">Female</label>
				                        </div>
				              				</div>
				              				<div class="am-flip-x popcntnr" ng-if="msg['error']['prsnl']['gender'] && fcs_gndr === true" ng-cloak>
			                        	<div class="popover bs-popover-top">
																    <div class="arrow"></div>
																    <div class="popover-body">
																      <%= msg['error']['prsnl']['gender'][0] %>
																    </div>
																</div>
							                </div>
								        		</div>
			              			</div>
			              		</div>
			              		<div class="col-lg-4">
			              			<div class="bx">
			              				<input type="hidden" ng-model="frm1.age" required>
			              				<div class="nptgrp" ng-class="{'err': msg['error']['prsnl']['bday']}" ng-mouseover="fcs_bday = true" ng-mouseleave="fcs_bday = false">
								            	<input type="text" ng-model="frm1.bday" ng-change="getAge(frm1.bday)" ui-mask="99/99/9999" model-view-value="true" required>
								            	<label class="nptlbl">Birthdate <span>*</span></label>
								            	<div class="am-flip-x popcntnr" ng-if="msg['error']['prsnl']['bday'] && fcs_bday === true" ng-cloak>
			                        	<div class="popover bs-popover-top">
												    			<div class="arrow"></div>
															    <div class="popover-body">
															      <%= msg['error']['prsnl']['bday'][0] %>
															    </div>
																</div>
							                </div>
									            <span class="btmlbl">
									            	<strong>Format:</strong> mm/dd/yyyy
									            </span>
								        		</div>
			              			</div>
			              		</div>
			              		<div class="col-lg-4">
			              			<div class="bx">
			              				<div class="nptgrp" ng-class="{'err': msg['error']['prsnl']['bplace']}" ng-mouseover="fcs_bplace = true" ng-mouseleave="fcs_bplace = false">
								            	<input type="text" ng-model="frm1.bplace" required>
								            	<label class="nptlbl">Birthplace <span>*</span></label>
								            	<div class="am-flip-x popcntnr" ng-if="msg['error']['prsnl']['bplace'] && fcs_bplace === true" ng-cloak>
			                        	<div class="popover bs-popover-top">
															    <div class="arrow"></div>
															    <div class="popover-body">
															      <%= msg['error']['prsnl']['bplace'][0] %>
															    </div>
																</div>
							                </div>
							        			</div>
			              			</div>
			              		</div>
			              		<div class="col-lg-4">
			              			<div class="bx">
			              				<div class="nptgrp cstmdrpdwn" ng-class="{'err': msg['error']['prsnl']['cstatus']}" ng-mouseover="fcs_cstatus = true" ng-mouseleave="fcs_cstatus = false">
				              				<input type="hidden" ng-model="frm1.cstatus">
				              				<div custom-select="cs.id as cs.name for cs in cstatus | filter: {name: $searchTerm} track by cs.id" ng-model="cvlstatus" custom-select-options="select_status">
																<strong><%= cs.name  %></strong>
																<div class="clearfix"></div>
															</div>
															<label class="nptlbl">Civil Status <span>*</span></label>
															<div class="am-flip-x popcntnr" ng-if="msg['error']['prsnl']['cstatus'] && fcs_cstatus === true" ng-cloak>
			                        	<div class="popover bs-popover-top">
															    <div class="arrow"></div>
															    <div class="popover-body">
															      <%= msg['error']['prsnl']['cstatus'][0] %>
															    </div>
																</div>
							                </div>
			              				</div>
			              			</div>
			              		</div>
			              		<div class="col-lg-4">
			              			<div class="bx">
			              				<div class="nptgrp cstmdrpdwn" ng-class="{'err': msg['error']['prsnl']['country']}" ng-mouseover="fcs_country = true" ng-mouseleave="fcs_country = false">
			              					<input type="hidden" ng-model="frm1.country">
			              					<div custom-select="c.id as c.country for c in countries | filter: {country: $searchTerm} track by c.id" ng-model="country" custom-select-options="select_country">
																<strong><%= c.country  %></strong>
																<div class="clearfix"></div>
															</div>
															<label class="nptlbl">Country <span>*</span></label>
															<div class="am-flip-x popcntnr" ng-if="msg['error']['prsnl']['country'] && fcs_country === true" ng-cloak>
			                        	<div class="popover bs-popover-top">
															    <div class="arrow"></div>
															    <div class="popover-body">
															      <%= msg['error']['prsnl']['country'][0] %>
															    </div>
																</div>
							                </div>
			              				</div>
			              			</div>
			              		</div>
			              		<div class="col-lg-4">
			              			<div class="bx">
			              				<div class="nptgrp cstmdrpdwn" ng-class="{'err': msg['error']['prsnl']['nationality']}" ng-mouseover="fcs_nationality = true" ng-mouseleave="fcs_nationality = false">
			              					<input type="hidden" ng-model="frm1.nationality">
				              				<div custom-select="n.id as n.nationality for n in countries | filter: {nationality: $searchTerm} track by n.id" ng-model="nationality" custom-select-options="select_nationality">
																<strong><%= n.nationality  %></strong>
																<div class="clearfix"></div>
															</div>
															<label class="nptlbl">Nationality <span>*</span></label>
															<div class="am-flip-x popcntnr" ng-if="msg['error']['prsnl']['nationality'] && fcs_nationality === true" ng-cloak>
			                        	<div class="popover bs-popover-top">
															    <div class="arrow"></div>
															    <div class="popover-body">
															      <%= msg['error']['prsnl']['nationality'][0] %>
															    </div>
																</div>
							                </div>
			              				</div>
			              			</div>
			              		</div>
			              		<div class="col-lg-12">
			              			<div class="bx">
			              				<div class="nptgrp txtarea" ng-class="{'err': msg['error']['prsnl']['objectives']}" ng-mouseover="fcs_objectives = true" ng-mouseleave="fcs_objectives = false">
								            	<textarea ng-model="frm1.objectives" maxlength="200" required></textarea>
								            	<label class="nptlbl">Career Objectives <span>*</span></label>
									            <div class="totlngth">
								            		<%= 200 - frm1.objectives.length %> Character<%= frm1.objectives.length >= 199 ? '' : 's' %> Remaining
									            </div>
									            <div class="am-flip-x popcntnr" ng-if="msg['error']['prsnl']['objectives'] && fcs_objectives === true" ng-cloak style="bottom: 90px;">
			                        	<div class="popover bs-popover-top">
														    	<div class="arrow"></div>
															    <div class="popover-body">
															      <%= msg['error']['prsnl']['objectives'][0] %>
															    </div>
																</div>
							                </div>
								        		</div>
			              			</div>
			              		</div>
			              	</div>
											<div class="crdftr">
												<div class="btmctns">
					              	<button class="btn btn-success pvw" type="submit">
					              		Save Changes
					              	</button>
				              	</div>
			              	</div>
						        </form>
	              	</div>
		            </div>
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <button class="card-header" ng-click="collapseTab(2)" type="button" ng-disabled="!proform['personalinfo']">
			        <div class="glyph">
                <i class="fa fa-graduation-cap"></i>
              </div>
			        Educational Background
			        <i class="fa fa-chevron-down"></i>
				    </button>
				    <div class="alert am-fade" ng-if="success_educ" ng-cloak>
							<i class="fa fa-check-circle"></i>
							<span>
								<%=msg['success']['educbg']['added']%>
								<%=msg['success']['educbg']['updated']%>
							</span>
						</div>
				    <div class="collapse">
				      <div class="card-body">
				      	<div class="frmldr" ng-if="frm2_loader" ng-cloak>
	                <svg width="145px" height="145px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
						      	<rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="30" fill="#d6f1ff" stroke="#2b74ba" stroke-width="8px"></circle><line x1="50" y1="50" x2="50" y2="30" stroke="#000" stroke-width="5" stroke-linecap="round" transform="rotate(99.6 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="5s" repeatCount="indefinite"></animateTransform></line><line x1="50" y1="50" x2="50" y2="20" stroke="#f00" stroke-width="2px" stroke-linecap="round" opacity="1" transform="rotate(138 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="1s" repeatCount="indefinite"></animateTransform></line>
							    </svg>
						    </div>
						    <div ng-if="!forms[1]['actvform']" ng-cloak>
							    <div ng-include src="'/user/lbl_educational_bg'"></div>
	              </div>
	              <div ng-if="forms[1]['actvform']" ng-cloak>
						    	<button type="button" class="cls" ng-click="openForm(forms[1]['cardnum'], 0)" ng-if="frmx2" ng-cloak>
					          <i class="fa fa-times"></i>
					        </button>
					      	<form ng-submit="saveEducBg(schl)" method="POST" novalidate>
						      	<div class="row no-gutters">
						      		<div class="col-lg-12">
		              			<div class="bx">
		              				<div class="nptgrp" ng-class="{'err': msg['error']['educbg']['school']}" ng-mouseover="fcs_school = true" ng-mouseleave="fcs_school = false">
								            <input type="text" ng-model="schl.school" required>
								            <label class="nptlbl">School Name <span>*</span></label>
								            <div class="am-flip-x popcntnr" ng-if="msg['error']['educbg']['school'] && fcs_school === true" ng-cloak>
		                        	<div class="popover bs-popover-top">
														    <div class="arrow"></div>
														    <div class="popover-body">
														      <%= msg['error']['educbg']['school'][0] %>
														    </div>
															</div>
						                </div>
									        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-6">
		              			<div class="bx">
		              				<div class="nptgrp" ng-class="{'err': msg['error']['educbg']['course']}" ng-mouseover="fcs_course = true" ng-mouseleave="fcs_course = false">
								            <input type="text" ng-model="schl.course" required>
								            <label class="nptlbl">Course <span>*</span></label>
								            <div class="am-flip-x popcntnr" ng-if="msg['error']['educbg']['course'] && fcs_course === true" ng-cloak>
		                        	<div class="popover bs-popover-top">
														    <div class="arrow"></div>
														    <div class="popover-body">
														      <%= msg['error']['educbg']['course'][0] %>
														    </div>
															</div>
						                </div>
									        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-3">
		              			<div class="bx">
		              				<div class="nptgrp" ng-class="{'err': msg['error']['educbg']['sdate']}" ng-mouseover="fcs_edcsdate = true" ng-mouseleave="fcs_edcsdate = false">
								            <input type="text" ng-model="schl.sdate" ui-mask="99/99/9999" model-view-value="true" required>
								            <label class="nptlbl">Start Date <span>*</span></label>
								            <div class="am-flip-x popcntnr" ng-if="msg['error']['educbg']['sdate'] && fcs_edcsdate === true" ng-cloak>
		                        	<div class="popover bs-popover-top">
														    <div class="arrow"></div>
														    <div class="popover-body">
														      <%= msg['error']['educbg']['sdate'][0] %>
														    </div>
															</div>
						                </div>
									        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-3">
		              			<div class="bx">
		              				<div class="nptgrp" ng-class="{'err': msg['error']['educbg']['edate']}" ng-mouseover="fcs_edcedate = true" ng-mouseleave="fcs_edcedate = false">
								            <input type="text" ng-model="schl.edate" ui-mask="99/99/9999" model-view-value="true" required>
								            <label class="nptlbl">End Date <span>*</span></label>
								            <div class="am-flip-x popcntnr" ng-if="msg['error']['educbg']['edate'] && fcs_edcedate === true" ng-cloak>
		                        	<div class="popover bs-popover-top">
														    <div class="arrow"></div>
														    <div class="popover-body">
														      <%= msg['error']['educbg']['edate'][0] %>
														    </div>
															</div>
						                </div>
									        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-12">
		              			<div class="bx">
		              				<div class="nptgrp txtarea wysiwyg" ng-class="{'err': msg['error']['educbg']['awardsrecognition']}" ng-mouseover="fcs_awrds = true" ng-mouseleave="fcs_awrds = false">
								            <summernote ng-model="schl.awardsrecognition" config="summernote_options"></summernote>
								            <label class="nptlbl">Awards and Recognition <span>*</span></label>
								            <div class="am-flip-x popcntnr" ng-if="msg['error']['educbg']['awardsrecognition'] && fcs_awrds === true" ng-cloak>
		                        	<div class="popover bs-popover-top">
														    <div class="arrow"></div>
														    <div class="popover-body">
														      <%= msg['error']['educbg']['awardsrecognition'][0] %>
														    </div>
															</div>
						                </div>
									        </div>
		              			</div>
		              		</div>
						      	</div>
						      	<div class="crdftr">
			              	<button class="btn btn-success" type="submit">
			              		Save Changes
			              	</button>
		              	</div>
		              </form>
		            </div>
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <button class="card-header" ng-click="collapseTab(3)" type="button" ng-disabled="!proform['educationalbg']">
			        <div class="glyph">
                <i class="fa fa-stethoscope"></i>
              </div>
				      Employment History
				      <i class="fa fa-chevron-down"></i>
				    </button>
				    <div class="alert am-fade" ng-if="success_emp" ng-cloak>
							<i class="fa fa-check-circle"></i>
							<span>
								<%=msg['success']['emphistory']%>
							</span>
						</div>
				    <div class="collapse">
				      <div id="empcard" class="card-body">
				      	<div class="frmldr" ng-if="frm3_loader" ng-cloak>
	                <svg width="145px" height="145px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
						      	<rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="30" fill="#d6f1ff" stroke="#2b74ba" stroke-width="8px"></circle><line x1="50" y1="50" x2="50" y2="30" stroke="#000" stroke-width="5" stroke-linecap="round" transform="rotate(99.6 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="5s" repeatCount="indefinite"></animateTransform></line><line x1="50" y1="50" x2="50" y2="20" stroke="#f00" stroke-width="2px" stroke-linecap="round" opacity="1" transform="rotate(138 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="1s" repeatCount="indefinite"></animateTransform></line>
							    </svg>
						    </div>
						    <div class="crdbdy">
						    	<div class="nptgrp wrkxprnc">
          					<select ng-model="wrkexperience" ng-change="updateEmpForm(wrkexperience)" required>
                      <option ng-repeat="xprnc in yrsxprncs" ng-value="xprnc.id" ng-selected="xprnc.id == usr[0]['wrkexperience']" ng-disabled="xprnc.disabled">
                      	<%=xprnc.name%>
                      </option>
                    </select>
				            <label class="nptlbl">
				            	Work Experience <span>*</span>
				            </label>
									</div>
		        			<button ng-click="addEmp(emp)" ng-disabled="((!wrkexperience || wrkexperience <= 1 || emps.length >= 4) && !jpemps.length) || empbtndisable" class="btn btn-primary btnwrkxprnc" type="button">
                  	Add Work Experience &nbsp;&nbsp; <i class="fa fa-plus"></i>
                	</button>
	              	<div class="clearfix"></div>
					        <form ng-submit="saveEmploymentHistory(emps)" method="POST" novalidate>
		              	<div class="rwemp" ng-if="wrkexperience && wrkexperience >= 1 && emps.length" ng-cloak>
			              	<div class="am-fade row no-gutters" ng-repeat="emp in emps | limitTo: 4 - jpemps.length">
			              		<div class="col-lg-12" ng-if="emps.length > 1 || jpemps.length">
			              			<button ng-click="removeEmp(emp)" class="cls" type="button">
			                    	<span class="fa fa-close"></span>
			                  	</button>
			                  	<input type="hidden" ng-model="emp.empid">
			              		</div>
			              		<div class="col-lg-8">
			              			<div class="bx">
			              				<div class="nptgrp" ng-class="{'err': msg['error']['emp'][$index]['company'][0]}" ng-mouseover="fcs_company = true" ng-mouseleave="fcs_company = false">
									            <input type="text" ng-model="emp.company" required>
									            <label class="nptlbl">Employer Name <span>*</span></label>
									            <div class="am-flip-x popcntnr" ng-if="msg['error']['emp'][$index]['company'][0] && fcs_company === true" ng-cloak>
						                    <div class="popover bs-popover-top">
													    		<div class="arrow"></div>
															    <div class="popover-body">
															      <%= msg['error']['emp'][$index]['company'][0] %>
															    </div>
																</div>
							                </div>
										        </div>
			              			</div>
			              		</div>
			              		<div class="col-lg-4">
			              			<div class="bx">
			              				<div class="nptgrp" ng-class="{'err': msg['error']['emp'][$index]['position']}" ng-mouseover="fcs_position = true" ng-mouseleave="fcs_position = false">
									            <input type="text" ng-model="emp.position" required>
									            <label class="nptlbl">Position <span>*</span></label>
									            <div class="am-flip-x popcntnr" ng-if="msg['error']['emp'][$index]['position'] && fcs_position === true" ng-cloak>
			                        	<div class="popover bs-popover-top">
															    <div class="arrow"></div>
															    <div class="popover-body">
															      <%= msg['error']['emp'][$index]['position'][0] %>
															    </div>
																</div>
							                </div>
										        </div>
			              			</div>
			              		</div>
			              		<div class="col-lg-4">
			              			<div class="bx">
			              				<div class="nptgrp" ng-class="{'err': msg['error']['emp'][$index]['salary']}" ng-mouseover="fcs_salary = true" ng-mouseleave="fcs_salary = false">
			              					<div class="input-group">
			              						<span class="input-group-addon">
														        <select name="currency" ng-model="emp.currency" required ng-init="emp.currency='1'">
																			<option ng-repeat="crncy in currencies" ng-value="crncy.id">
																				<%=crncy.name%>
																			</option>
																		</select>
														    </span>
									            	<input type="text" ng-model="emp.salary" currency-input maxlength="12" required>
									            </div>
								            	<label class="nptlbl">Salary Rate <span>*</span></label>
									            <div class="am-flip-x popcntnr" ng-if="msg['error']['emp'][$index]['salary'] && fcs_salary === true" ng-cloak>
			                        	<div class="popover bs-popover-top">
															    <div class="arrow"></div>
															    <div class="popover-body">
															      <%= msg['error']['emp'][$index]['salary'][0] %>
															    </div>
																</div>
							            		</div>
								        		</div>
			              			</div>
			              		</div>
			              		<div class="col-lg-4">
			              			<div class="bx">
			              				<div class="nptgrp" ng-class="{'err': msg['error']['emp'][$index]['sdate']}" ng-mouseover="fcs_sdate = true" ng-mouseleave="fcs_sdate = false">
									            <input type="text" ng-model="emp.sdate" ui-mask="99/99/9999" model-view-value="true" required>
									            <label class="nptlbl">Start Date <span>*</span></label>
									            <span class="btmlbl">
									            	<strong>Format:</strong> mm/dd/yyyy
									            </span>
									            <div class="am-flip-x popcntnr" ng-if="msg['error']['emp'][$index]['sdate'] && fcs_sdate === true" ng-cloak>
			                        	<div class="popover bs-popover-top">
															    <div class="arrow"></div>
															    <div class="popover-body">
															      <%= msg['error']['emp'][$index]['sdate'][0] %>
															    </div>
																</div>
							                </div>
								        		</div>
			              			</div>
			              		</div>
			              		<div class="col-lg-4">
			              			<div class="bx">
			              				<div class="nptgrp" ng-class="{'err': msg['error']['emp'][$index]['edate']}" ng-mouseover="fcs_edate = true" ng-mouseleave="fcs_edate = false">
								            <input type="text" ng-model="emp.edate" ui-mask="99/99/9999" model-view-value="true" ng-disabled="emp.ispresent" required>
								            <label class="nptlbl">End Date <span>*</span></label>
								            <span class="btmlbl">
								            	<strong>Format:</strong> mm/dd/yyyy
								            </span>
								            
								            <div class="am-flip-x popcntnr" ng-if="msg['error']['emp'][$index]['edate'] && fcs_edate === true" ng-cloak style="bottom: 57px;">
		                        	<div class="popover bs-popover-top">
											    			<div class="arrow"></div>
														    <div class="popover-body">
														      <%= msg['error']['emp'][$index]['edate'][0] %>
														    </div>
															</div>
						                </div>
						                <label class="ctrl">
									        		Present Employer
									        		<input type="checkbox" ng-model="emp.ispresent" ng-change="clearEndate($index, emp.ispresent, 'add')" ng-disabled="checked == 1 && !emp.ispresent || empchckbx" />
									        		<div class="ctrl_indicator"></div>
									    			</label>
								        		</div>
			              			</div>
			              		</div>
			              		<div class="col-lg-6">
			              			<div class="bx">
			              				<div class="nptgrp txtarea wysiwyg" ng-class="{'err': msg['error']['emp'][$index]['jbdescription']}" ng-mouseover="fcs_jbdescription = true" ng-mouseleave="fcs_jbdescription = false">
									            <summernote ng-model="emp.jbdescription" config="summernote_options"></summernote>
									            <label class="nptlbl">Job Description <span>*</span></label>
									            <div class="am-flip-x popcntnr" ng-if="msg['error']['emp'][$index]['jbdescription'] && fcs_jbdescription === true" ng-cloak>
			                        	<div class="popover bs-popover-top">
															    <div class="arrow"></div>
															    <div class="popover-body">
															      <%= msg['error']['emp'][$index]['jbdescription'][0] %>
															    </div>
																</div>
							                </div>
										        </div>
			              			</div>
			              		</div>
			              		<div class="col-lg-6">
			              			<div class="bx">
			              				<div class="nptgrp txtarea wysiwyg" ng-class="{'err': msg['error']['emp'][$index]['reasonforleaving']}" ng-mouseover="fcs_reasonforleaving = true" ng-mouseleave="fcs_reasonforleaving = false">
									            <summernote ng-model="emp.reasonforleaving" config="summernote_options"></summernote>
									            <label class="nptlbl">Reason for Leaving <span>*</span></label>
									            <div class="am-flip-x popcntnr" ng-if="msg['error']['emp'][$index]['reasonforleaving'] && fcs_reasonforleaving === true" ng-cloak>
			                        	<div class="popover bs-popover-top">
															    <div class="arrow"></div>
															    <div class="popover-body">
															      <%= msg['error']['emp'][$index]['reasonforleaving'][0] %>
															    </div>
																</div>
							                </div>
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
			            </form>
			            <div class="clearfix"></div>
			            <form ng-submit="updateEmpHistory(empedt_indx, empedt)" method="POST" novalidate ng-show="frmempupdt" ng-cloak id="frmempupdt">
		              	<div class="am-fade row no-gutters">
		              		<div class="col-lg-8">
		              			<div class="bx">
		              				<div class="nptgrp" ng-class="{'err': msg['error']['emp']['company'][0]}" ng-mouseover="edt_company = true" ng-mouseleave="edt_company = false">
								            <input type="text" ng-model="empedt.company" required>
								            <label class="nptlbl">Employer Name <span>*</span></label>
								            <div class="am-flip-x popcntnr" ng-if="msg['error']['emp']['company'][0] && edt_company === true" ng-cloak>
					                    <div class="popover bs-popover-top">
												    		<div class="arrow"></div>
														    <div class="popover-body">
														      <%= msg['error']['emp']['company'][0] %>
														    </div>
															</div>
						                </div>
									        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-4">
		              			<div class="bx">
		              				<div class="nptgrp" ng-class="{'err': msg['error']['emp']['position'][0]}" ng-mouseover="edt_position = true" ng-mouseleave="edt_position = false">
								            <input type="text" ng-model="empedt.position" required>
								            <label class="nptlbl">Position <span>*</span></label>
								            <div class="am-flip-x popcntnr" ng-if="msg['error']['emp']['position'][0] && edt_position === true" ng-cloak>
					                    <div class="popover bs-popover-top">
												    		<div class="arrow"></div>
														    <div class="popover-body">
														      <%= msg['error']['emp']['position'][0] %>
														    </div>
															</div>
						                </div>
									        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-4">
		              			<div class="bx">
		              				<div class="nptgrp" ng-class="{'err': msg['error']['emp']['salary'][0]}" ng-mouseover="edt_salary = true" ng-mouseleave="edt_salary = false">
		              					<div class="input-group">
		              						<span class="input-group-addon">
													        <select name="currency" ng-model="empedt.currency" required>
																		<option ng-repeat="crncy in currencies" ng-value="crncy.id">
																			<%=crncy.name%>
																		</option>
																	</select>
													    </span>
								            	<input type="text" ng-model="empedt.salary" currency-input maxlength="12" required>
								            </div>
							            	<label class="nptlbl">Salary Rate <span>*</span></label>
							            	<div class="am-flip-x popcntnr" ng-if="msg['error']['emp']['salary'][0] && edt_salary === true" ng-cloak>
					                    <div class="popover bs-popover-top">
												    		<div class="arrow"></div>
														    <div class="popover-body">
														      <%= msg['error']['emp']['salary'][0] %>
														    </div>
															</div>
						                </div>
							        		</div>
		              			</div>
		              		</div>
		              		<div class="col-lg-4">
		              			<div class="bx">
		              				<div class="nptgrp" ng-class="{'err': msg['error']['emp']['sdate'][0]}" ng-mouseover="edt_sdate = true" ng-mouseleave="edt_sdate = false">
								            <input type="text" ng-model="empedt.sdate" ui-mask="99/99/9999" model-view-value="true" required>
								            <label class="nptlbl">Start Date <span>*</span></label>
								            <span class="btmlbl">
								            	<strong>Format:</strong> mm/dd/yyyy
								            </span>
								            <div class="am-flip-x popcntnr" ng-if="msg['error']['emp']['sdate'][0] && edt_sdate === true" ng-cloak>
					                    <div class="popover bs-popover-top">
												    		<div class="arrow"></div>
														    <div class="popover-body">
														      <%= msg['error']['emp']['sdate'][0] %>
														    </div>
															</div>
						                </div>
							        		</div>
		              			</div>
		              		</div>
		              		<div class="col-lg-4">
		              			<div class="bx">
		              				<div class="nptgrp" ng-class="{'err': msg['error']['emp']['edate'][0]}" ng-mouseover="edt_edate = true" ng-mouseleave="edt_edate = false">
								            <input type="text" ng-model="empedt.edate" ui-mask="99/99/9999" model-view-value="true" ng-disabled="empedt.ispresent" required>
								            <label class="nptlbl">End Date <span>*</span></label>
								            <div class="am-flip-x popcntnr" ng-if="msg['error']['emp']['edate'][0] && edt_edate === true" ng-cloak style="bottom: 57px;">
					                    <div class="popover bs-popover-top">
												    		<div class="arrow"></div>
														    <div class="popover-body">
														      <%= msg['error']['emp']['edate'][0] %>
														    </div>
															</div>
						                </div>
								            <span class="btmlbl">
								            	<strong>Format:</strong> mm/dd/yyyy
								            </span>
								            <label class="ctrl">
									        		Present Employer
									        		<input type="checkbox" ng-model="empedt.ispresent" ng-change="clearEndate($index, empedt.ispresent, 'edt')" ng-disabled="checked == 1 && !empedt.ispresent || empedtchckbx" />
									        		<div class="ctrl_indicator"></div>
									    			</label>
			              			</div>
			              		</div>
		              		</div>
		              		<div class="col-lg-6">
		              			<div class="bx">
		              				<div class="nptgrp txtarea wysiwyg" ng-class="{'err': msg['error']['emp']['jbdescription']}" ng-mouseover="edt_jbdescription = true" ng-mouseleave="edt_jbdescription = false">
								            <summernote ng-model="empedt.jbdescription" config="summernote_options"></summernote>
								            <label class="nptlbl">Job Description <span>*</span></label>
								            <div class="am-flip-x popcntnr" ng-if="msg['error']['emp']['jbdescription'][0] && edt_jbdescription === true" ng-cloak>
					                    <div class="popover bs-popover-top">
												    		<div class="arrow"></div>
														    <div class="popover-body">
														      <%= msg['error']['emp']['jbdescription'][0] %>
														    </div>
															</div>
						                </div>
									        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-6">
		              			<div class="bx">
		              				<div class="nptgrp txtarea wysiwyg" ng-class="{'err': msg['error']['emp']['reasonforleaving']}" ng-mouseover="edt_reasonforleaving = true" ng-mouseleave="edt_reasonforleaving = false">
								            <summernote ng-model="empedt.reasonforleaving" config="summernote_options"></summernote>
								            <label class="nptlbl">Reason for Leaving <span>*</span></label>
								            <div class="am-flip-x popcntnr" ng-if="msg['error']['emp']['reasonforleaving'][0] && edt_reasonforleaving === true" ng-cloak>
					                    <div class="popover bs-popover-top">
												    		<div class="arrow"></div>
														    <div class="popover-body">
														      <%= msg['error']['emp']['reasonforleaving'][0] %>
														    </div>
															</div>
						                </div>
									        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-12 btnupdt">
		              			<button class="btn btn-success" type="submit">
				              		Save Changes
				              	</button>
		              		</div>
		              	</div>
			            </form>
			            <div class="clearfix"></div>
			            <div class="rwemp am-fade" ng-if="jpemps.length" ng-cloak>
			            	<div ng-repeat="jpemp in jpemps | orderBy: '-id' | limitTo: 4" ng-class="'empko'+$index" class="pcemp">
			            		<button ng-click="showEmplbl($index)" class="cls" type="button" ng-if="jphide[$index]" ng-cloak>
	                    	<span class="fa fa-close"></span>
	                  	</button>
	                  	<div class="alert am-fade" ng-if="msg['success_emp']['indx'+$index]" ng-cloak>
												<i class="fa fa-check-circle"></i>
												<span>
													<%=msg['success_emp']['indx'+$index]%>
												</span>
											</div>
			              	<div class="row no-gutters ptop20" ng-show="!jphide[$index]" ng-cloak>
			              		<div class="col-lg-12">
			              			<div class="btnactns">
			              				<button class="btn btn-primary" type="button" ng-click="editEmpForm(jpemp, $index)">
				              				<i class="fa fa-pencil"></i>
				              			</button>
				              			<div class="dltbtn">
				              				<div class="nptgrp am-flip-x" ng-if="dltemp[$index]" ng-cloak>
																<div class="popcntnr">
									                <div class="popover bs-popover-top">
																    <div class="arrow"></div>
																    <div class="popover-body">
																    	<div>
																	    	<p>
																	    		Are you sure you want to delete this record?
																	    	</p>
																	    	<div class="btns">
																	    		<button type="button" class="btn btn-primary" ng-click="deleteEmp(jpemp, $index)">
																	    			Yes
																	    		</button>
																	    		<button type="button" class="btn btn-danger" ng-click="clsbbl('dltemp', $index)">
																	    			No
																	    		</button>
																	    	</div>
																	    </div>
																    </div>
																	</div>
									              </div>
									            </div>
				              				<button class="btn btn-danger" ng-click="dltemp[$index] = !dltemp[$index]">
					              				<i class="fa fa-trash"></i>
					              			</button>
				              			</div>
			              			</div>
			              		</div>
												<div class="col-lg-8">
													<div class="nptgrp lbld">
														<span class="lbldcntnt">
															<%= jpemp.company ? jpemp.company : '&nbsp;' %>
														</span>
											    	<label class="lbl">
											    		Company
											    	</label>
											  	</div>
												</div>
												<div class="col-lg-4">
													<div class="nptgrp lbld">
														<span class="lbldcntnt">
															<%= jpemp.position ? jpemp.position : '&nbsp;' %>
														</span>
											    	<label class="lbl">
											    		Position
											    	</label>
											  	</div>
												</div>
												<div class="col-lg-4">
													<div class="nptgrp lbld">
														<span class="lbldcntnt">
															<%= jpemp.currency ? getfltrvalue(currencies, jpemp.currency, 0) : '&nbsp;' %> <%= jpemp.salary | number %>
														</span>
											    	<label class="lbl">
											    		Salary
											    	</label>
											  	</div>
												</div>
												<div class="col-lg-4">
													<div class="nptgrp lbld">
														<span class="lbldcntnt">
															<%= jpemp.sdate ? jpemp.sdate : '&nbsp;' %>
														</span>
											    	<label class="lbl">
											    		Start Date
											    	</label>
											  	</div>
												</div>
												<div class="col-lg-4">
													<div class="nptgrp lbld">
														<span class="lbldcntnt">
															<%= jpemp.ispresent ? 'Present Employer' : (jpemp.edate ? jpemp.edate : '&nbsp;') %>
														</span>
											    	<label class="lbl">
											    		End Date
											    	</label>
											  	</div>
												</div>
												<div class="col-lg-6">
													<div class="nptgrp lbld">
														<span class="lbldcntnt">
															<div ng-bind-html="jpemp.jbdescription"></div>
														</span>
											    	<label class="lbl">
											    		Job Description
											    	</label>
											  	</div>
												</div>
												<div class="col-lg-6">
													<div class="nptgrp lbld">
														<span class="lbldcntnt">
															<div ng-bind-html="jpemp.reasonforleaving"></div>
														</span>
											    	<label class="lbl">
											    		Reason for Leaving
											    	</label>
											  	</div>
												</div>
											</div>
										</div>
									</div>
						    </div>
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <button class="card-header" ng-click="collapseTab(4)" type="button" ng-disabled="!proform['emphistory']">
			        <div class="glyph">
                <i class="fa fa-users"></i>
              </div>
			        Character Reference
			        <i class="fa fa-chevron-down"></i>
				    </button>
				    <div class="collapse">
				      <div class="card-body">
				        <div class="frmldr" ng-if="frm4_loader" ng-cloak>
	                <svg width="145px" height="145px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
						      	<rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="30" fill="#d6f1ff" stroke="#2b74ba" stroke-width="8px"></circle><line x1="50" y1="50" x2="50" y2="30" stroke="#000" stroke-width="5" stroke-linecap="round" transform="rotate(99.6 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="5s" repeatCount="indefinite"></animateTransform></line><line x1="50" y1="50" x2="50" y2="20" stroke="#f00" stroke-width="2px" stroke-linecap="round" opacity="1" transform="rotate(138 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="1s" repeatCount="indefinite"></animateTransform></line>
							    </svg>
						    </div>
						    <button ng-click="addChar(chr)" class="btn btn-primary btnwrkxprnc" type="button" ng-disabled="(chrs.length >= 3) && !jpchrs.length || chrbtndisable" style="margin: -10px 0 10px;">
                	Add Character Reference &nbsp;&nbsp; <i class="fa fa-plus"></i>
              	</button>
              	<form ng-submit="saveCharRef(chrs)" method="POST" novalidate>
	              	<div class="rwemp" ng-if="chrs.length" ng-cloak>
	              		<div class="row no-gutters" ng-repeat="chr in chrs | limitTo: 3 - jpchrs.length">
	              			<div class="col-lg-12" ng-if="chrs.length > 1 || jpchrs.length">
		              			<button ng-click="removeChr(chr)" class="cls" type="button">
		                    	<span class="fa fa-close"></span>
		                  	</button>
		                  	<input type="hidden" ng-model="chr.chrid">
		              		</div>
	              			<div class="col-lg-8">
		              			<div class="bx">
		              				<div class="nptgrp" ng-class="{'err': msg['error']['chr'][$index]['name'][0]}" ng-mouseover="cname = true" ng-mouseleave="cname = false">
								            <input type="text" ng-model="chr.name" required>
								            <label class="nptlbl">Name <span>*</span></label>
								            <div class="am-flip-x popcntnr" ng-if="msg['error']['chr'][$index]['name'] && cname === true" ng-cloak>
		                        	<div class="popover bs-popover-top">
											    			<div class="arrow"></div>
														    <div class="popover-body">
														      <%= msg['error']['chr'][$index]['name'][0] %>
														    </div>
															</div>
						                </div>
									        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-4">
		              			<div class="bx">
		              				<div class="nptgrp" ng-class="{'err': msg['error']['chr'][$index]['relation'][0]}" ng-mouseover="crelation = true" ng-mouseleave="crelation = false">
								            <input type="text" ng-model="chr.relation" required>
								            <label class="nptlbl">Relation <span>*</span></label>
								            <div class="am-flip-x popcntnr" ng-if="msg['error']['chr'][$index]['relation'] && crelation === true" ng-cloak>
		                        	<div class="popover bs-popover-top">
											    			<div class="arrow"></div>
														    <div class="popover-body">
														      <%= msg['error']['chr'][$index]['relation'][0] %>
														    </div>
															</div>
						                </div>
									        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-6">
		              			<div class="bx">
		              				<div class="nptgrp" ng-class="{'err': msg['error']['chr'][$index]['company'][0]}" ng-mouseover="ccompany = true" ng-mouseleave="ccompany = false">
								            <input type="text" ng-model="chr.company" required>
								            <label class="nptlbl">Company</label>
								            <div class="am-flip-x popcntnr" ng-if="msg['error']['chr'][$index]['company'] && ccompany === true" ng-cloak>
		                        	<div class="popover bs-popover-top">
											    			<div class="arrow"></div>
														    <div class="popover-body">
														      <%= msg['error']['chr'][$index]['company'][0] %>
														    </div>
															</div>
						                </div>
									        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-6">
		              			<div class="bx">
		              				<div class="nptgrp" ng-class="{'err': msg['error']['chr'][$index]['position'][0]}" ng-mouseover="cposition = true" ng-mouseleave="cposition = false">
								            <input type="text" ng-model="chr.position" required>
								            <label class="nptlbl">Position</label>
								            <div class="am-flip-x popcntnr" ng-if="msg['error']['chr'][$index]['position'] && cposition === true" ng-cloak>
		                        	<div class="popover bs-popover-top">
											    			<div class="arrow"></div>
														    <div class="popover-body">
														      <%= msg['error']['chr'][$index]['position'][0] %>
														    </div>
															</div>
						                </div>
									        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-6">
		              			<div class="bx">
		              				<div class="nptgrp" ng-class="{'err': msg['error']['chr'][$index]['email'][0]}" ng-mouseover="cemail = true" ng-mouseleave="cemail = false">
								            <input type="text" ng-model="chr.email" required>
								            <label class="nptlbl">Email <span>*</span></label>
								            <div class="am-flip-x popcntnr" ng-if="msg['error']['chr'][$index]['email'] && cemail === true" ng-cloak>
		                        	<div class="popover bs-popover-top">
											    			<div class="arrow"></div>
														    <div class="popover-body">
														      <%= msg['error']['chr'][$index]['email'][0] %>
														    </div>
															</div>
						                </div>
									        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-6">
		              			<div class="bx">
		              				<div class="nptgrp" ng-class="{'err': msg['error']['chr'][$index]['phone'][0]}" ng-mouseover="cphone = true" ng-mouseleave="cphone = false">
								            <input type="text" ng-model="chr.phone" required>
								            <label class="nptlbl">Phone No.</label>
								            <div class="am-flip-x popcntnr" ng-if="msg['error']['chr'][$index]['phone'] && cphone === true" ng-cloak>
		                        	<div class="popover bs-popover-top">
											    			<div class="arrow"></div>
														    <div class="popover-body">
														      <%= msg['error']['chr'][$index]['phone'][0] %>
														    </div>
															</div>
						                </div>
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
              	</form>
              	<div class="clearfix"></div>
		            <form ng-submit="updateChrRef(chredt_indx, chredt)" method="POST" novalidate ng-show="frmchrupdt" ng-cloak id="frmchrupdt">
              		<div class="row no-gutters">
              			<div class="col-lg-8">
	              			<div class="bx">
	              				<div class="nptgrp" ng-class="{'err': msg['error']['chr']['name'][0]}" ng-mouseover="cname = true" ng-mouseleave="cname = false">
							            <input type="text" ng-model="chredt.name" required>
							            <label class="nptlbl">Name <span>*</span></label>
							            <div class="am-flip-x popcntnr" ng-if="msg['error']['chr']['name'] && cname === true" ng-cloak>
	                        	<div class="popover bs-popover-top">
										    			<div class="arrow"></div>
													    <div class="popover-body">
													      <%= msg['error']['chr']['name'][0] %>
													    </div>
														</div>
					                </div>
								        </div>
	              			</div>
	              		</div>
	              		<div class="col-lg-4">
	              			<div class="bx">
	              				<div class="nptgrp" ng-class="{'err': msg['error']['chr']['relation'][0]}" ng-mouseover="crelation = true" ng-mouseleave="crelation = false">
							            <input type="text" ng-model="chredt.relation" required>
							            <label class="nptlbl">Relation <span>*</span></label>
							            <div class="am-flip-x popcntnr" ng-if="msg['error']['chr']['relation'] && crelation === true" ng-cloak>
	                        	<div class="popover bs-popover-top">
										    			<div class="arrow"></div>
													    <div class="popover-body">
													      <%= msg['error']['chr']['relation'][0] %>
													    </div>
														</div>
					                </div>
								        </div>
	              			</div>
	              		</div>
	              		<div class="col-lg-6">
	              			<div class="bx">
	              				<div class="nptgrp" ng-class="{'err': msg['error']['chr']['company'][0]}" ng-mouseover="ccompany = true" ng-mouseleave="ccompany = false">
							            <input type="text" ng-model="chredt.company" required>
							            <label class="nptlbl">Company</label>
							            <div class="am-flip-x popcntnr" ng-if="msg['error']['chr']['company'] && ccompany === true" ng-cloak>
	                        	<div class="popover bs-popover-top">
										    			<div class="arrow"></div>
													    <div class="popover-body">
													      <%= msg['error']['chr']['company'][0] %>
													    </div>
														</div>
					                </div>
								        </div>
	              			</div>
	              		</div>
	              		<div class="col-lg-6">
	              			<div class="bx">
	              				<div class="nptgrp" ng-class="{'err': msg['error']['chr']['position'][0]}" ng-mouseover="cposition = true" ng-mouseleave="cposition = false">
							            <input type="text" ng-model="chredt.position" required>
							            <label class="nptlbl">Position</label>
							            <div class="am-flip-x popcntnr" ng-if="msg['error']['chr']['position'] && cposition === true" ng-cloak>
	                        	<div class="popover bs-popover-top">
										    			<div class="arrow"></div>
													    <div class="popover-body">
													      <%= msg['error']['chr']['position'][0] %>
													    </div>
														</div>
					                </div>
								        </div>
	              			</div>
	              		</div>
	              		<div class="col-lg-6">
	              			<div class="bx">
	              				<div class="nptgrp" ng-class="{'err': msg['error']['chr']['email'][0]}" ng-mouseover="cemail = true" ng-mouseleave="cemail = false">
							            <input type="text" ng-model="chredt.email" required>
							            <label class="nptlbl">Email <span>*</span></label>
							            <div class="am-flip-x popcntnr" ng-if="msg['error']['chr']['email'] && cemail === true" ng-cloak>
	                        	<div class="popover bs-popover-top">
										    			<div class="arrow"></div>
													    <div class="popover-body">
													      <%= msg['error']['chr']['email'][0] %>
													    </div>
														</div>
					                </div>
								        </div>
	              			</div>
	              		</div>
	              		<div class="col-lg-6">
	              			<div class="bx">
	              				<div class="nptgrp" ng-class="{'err': msg['error']['chr']['phone'][0]}" ng-mouseover="cphone = true" ng-mouseleave="cphone = false">
							            <input type="text" ng-model="chredt.phone" required>
							            <label class="nptlbl">Phone No.</label>
							            <div class="am-flip-x popcntnr" ng-if="msg['error']['chr']['phone'] && cphone === true" ng-cloak>
	                        	<div class="popover bs-popover-top">
										    			<div class="arrow"></div>
													    <div class="popover-body">
													      <%= msg['error']['chr']['phone'][0] %>
													    </div>
														</div>
					                </div>
								        </div>
	              			</div>
	              		</div>
	              		<div class="col-lg-12 btnupdt">
	              			<button class="btn btn-success" type="submit">
			              		Save Changes
			              	</button>
	              		</div>
              		</div>
		            </form>
              	<div class="rwemp am-fade" ng-if="jpchrs.length" ng-cloak>
              		<div ng-repeat="jpchr in jpchrs | orderBy: '-id' | limitTo: 3" ng-class="'chrko'+$index" class="pcemp">
              			<button ng-click="showChrlbl($index)" class="cls" type="button" ng-if="chrhide[$index]" ng-cloak>
                    	<span class="fa fa-close"></span>
                  	</button>
                  	<div class="alert am-fade" ng-if="msg['success_chr']['indx'+$index]" ng-cloak>
											<i class="fa fa-check-circle"></i>
											<span>
												<%=msg['success_chr']['indx'+$index]%>
											</span>
										</div>
              			<div class="row no-gutters ptop20" ng-show="!chrhide[$index]" ng-cloak>
		              		<div class="col-lg-12">
		              			<div class="btnactns">
		              				<button class="btn btn-primary" type="button" ng-click="editChrForm(jpchr, $index)">
			              				<i class="fa fa-pencil"></i>
			              			</button>
			              			<div class="dltbtn">
			              				<div class="nptgrp am-flip-x" ng-if="dltchr[$index]" ng-cloak>
															<div class="popcntnr">
								                <div class="popover bs-popover-top">
															    <div class="arrow"></div>
															    <div class="popover-body">
															    	<div>
																    	<p>
																    		Are you sure you want to delete this record?
																    	</p>
																    	<div class="btns">
																    		<button type="button" class="btn btn-primary" ng-click="deleteChr(jpchr, $index)">
																    			Yes
																    		</button>
																    		<button type="button" class="btn btn-danger" ng-click="clsbbl('dltchr', $index)">
																    			No
																    		</button>
																    	</div>
																    </div>
															    </div>
																</div>
								              </div>
								            </div>
			              				<button class="btn btn-danger" ng-click="dltchr[$index] = !dltchr[$index]">
				              				<i class="fa fa-trash"></i>
				              			</button>
			              			</div>
		              			</div>
		              		</div>
		              		<div class="col-lg-8">
		              			<div class="nptgrp lbld">
													<span class="lbldcntnt">
														<%= jpchr.name ? jpchr.name : '&nbsp;' %>
													</span>
										    	<label class="lbl">
										    		Name
										    	</label>
										  	</div>
		              		</div>
		              		<div class="col-lg-4">
		              			<div class="nptgrp lbld">
													<span class="lbldcntnt">
														<%= jpchr.relation ? jpchr.relation : '&nbsp;' %>
													</span>
										    	<label class="lbl">
										    		Relation
										    	</label>
										  	</div>
		              		</div>
		              		<div class="col-lg-6">
		              			<div class="nptgrp lbld">
													<span class="lbldcntnt">
														<%= jpchr.company ? jpchr.company : '&nbsp;' %>
													</span>
										    	<label class="lbl">
										    		Company
										    	</label>
										  	</div>
		              		</div>
		              		<div class="col-lg-6">
		              			<div class="nptgrp lbld">
													<span class="lbldcntnt">
														<%= jpchr.position ? jpchr.position : '&nbsp;' %>
													</span>
										    	<label class="lbl">
										    		Position
										    	</label>
										  	</div>
		              		</div>
		              		<div class="col-lg-6">
		              			<div class="nptgrp lbld">
													<span class="lbldcntnt">
														<%= jpchr.email ? jpchr.email : '&nbsp;' %>
													</span>
										    	<label class="lbl">
										    		Email
										    	</label>
										  	</div>
		              		</div>
		              		<div class="col-lg-6">
		              			<div class="nptgrp lbld">
													<span class="lbldcntnt">
														<%= jpchr.phone ? jpchr.phone : '&nbsp;' %>
													</span>
										    	<label class="lbl">
										    		Phone
										    	</label>
										  	</div>
		              		</div>
		              	</div>
              		</div>
              	</div>
              	<div class="clearfix"></div><br>
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
	<div class="modal" id="resume_tpl">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	    	<div ng-include src="'/user/resume'"></div>
		</div>
	  </div>
	</div>
</div>
@endsection