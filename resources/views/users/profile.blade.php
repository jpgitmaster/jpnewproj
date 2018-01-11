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
				    <button class="card-header" ng-click="collapseTab(1)" type="button">
				    	<div class="glyph">
		                    <i class="fa fa-address-card"></i>
		                </div>
				        Personal Information
				        <i class="fa fa-chevron-down"></i>
				    </button>

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
						    	<button type="button" class="cls" ng-click="openForm(forms[0]['cardnum'], 0)">
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
										            <input type="text" ng-model="frm1.bday" ng-change="getAge(frm1.bday)" required>
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
					              		<!-- <div class="col-lg-12">
					              			<div class="bx">
					              				<div class="nptgrp txtarea">
										            <summernote ng-model="smmrnte" config="summernote_options"></summernote>
										            <label class="nptlbl">Career Objectives <span>*</span></label>
										        </div>
					              			</div>
					              		</div> -->
					              	</div>
									<div class="crdftr">
										<div class="btmctns">
											<!-- <div class="nptgrp am-flip-x" ng-if="frm1cnfrm" ng-cloak>
												<div class="popcntnr">
								                    <div class="popover bs-popover-top">
													    <div class="arrow"></div>
													    <div class="popover-body">
													    	<div ng-if="!msg['rsm']['dlt']['success']">
														    	<p>
														    		Are you sure you want save your changes?
														    	</p>
														    	<div class="btns">
														    		<button class="btn btn-primary" type="submit">
														    			Yes
														    		</button>
														    		<button class="btn btn-danger" type="button" ng-click="clsbbl(2)">
														    			No
														    		</button>
														    	</div>
													    	</div>
													    </div>
													</div>
								                </div>
							                </div>
							              	<button class="btn btn-success" ng-click="frm1cnfrm = !frm1cnfrm" type="button">
							              		Save Changes
							              	</button> -->
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
				        <span class="glyph">
		                    <i class="fa fa-phone"></i>
		                </span>
				        Contact Details
				        <i class="fa fa-chevron-down"></i>
				    </button>
				    <div class="collapse">
				      <div class="card-body">
				        <form ng-submit="saveContactDtls(frm2)" method="POST" novalidate>
					        <div class="row no-gutters">
			              		<div class="col-lg-4">
			              			<div class="bx">
			              				<div class="nptgrp">
								            <input type="text" ng-model="frm2.email" required>
								            <label class="nptlbl">Email <span>*</span></label>
								            <span class="btmlbl">
								            	<strong>e.g.</strong> yourname@gmail.com
								            </span>
								        </div>
			              			</div>
			              		</div>
			              		<div class="col-lg-4">
			              			<div class="bx">
			              				<div class="nptgrp">
								            <input type="text" ng-model="frm2.mobile" ng-pattern="/^\d+$/" required>
								            <label class="nptlbl">Mobile No. <span>*</span></label>
								            <span class="btmlbl">
								            	<strong>e.g.</strong> 0917-123-4567
								            </span>
								        </div>
			              			</div>
			              		</div>
			              		<div class="col-lg-4">
			              			<div class="bx">
			              				<div class="nptgrp">
								            <input type="text" ng-model="frm2.phone" required>
								            <label class="nptlbl">Phone No.</label>
								            <span class="btmlbl">
								            	<strong>e.g.</strong> (632) 765-4321
								            </span>
								        </div>
			              			</div>
			              		</div>
			              		<div class="col-lg-12">
			              			<div class="bx">
			              				<div class="nptgrp">
								            <input type="text" ng-model="frm2.prsnt_addrss" ng-change="makeSameAddress(check)" required>
								            <label class="nptlbl">Present Address <span>*</span></label>
								            <span class="btmlbl">
								            	Unit No., House/Bldg./St. No. + Street Name, Postal Code
								            </span>
								        </div>
			              			</div>
			              		</div>
			              		<div class="col-lg-12">
			              			<div class="bx">
			              				<div class="nptgrp">
								            <input type="text" ng-model="frm2.prmnnt_addrss" ng-change="makeSameAddress(check)" required>
								            <label class="nptlbl">Permanent Address </label>
								            <span class="btmlbl">
								            	Unit No., House/Bldg./St. No. + Street Name, Postal Code
								            </span>
								            <label class="ctrl">
										        Same as Present Address
										        <input type="checkbox" ng-model="check" ng-change="makeSameAddress(check)" />
										        <div class="ctrl_indicator"></div>
										    </label>
								        </div>
			              			</div>
			              		</div>
			              	</div>
			              	<div class="crdftr" style="margin-top: 0;">
				              	<button class="btn btn-success" type="submit">
				              		Save Changes
				              	</button>
			              	</div>
			            </form>
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <button class="card-header" ng-click="collapseTab(3)" type="button" ng-disabled="!proform['educationalbg']">
				        <div class="glyph">
		                    <i class="fa fa-graduation-cap"></i>
		                </div>
				        Educational Background

				        <i class="fa fa-chevron-down"></i>
				    </button>
				    <div class="collapse">
				      <div class="card-body">
				        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <button class="card-header" ng-click="collapseTab(4)" type="button" ng-disabled="!proform['emphistory']">
				        <div class="glyph">
		                    <i class="fa fa-stethoscope"></i>
		                </div>
				        Employment History

				        <i class="fa fa-chevron-down"></i>
				    </button>
				    <div class="collapse">
				      <div class="card-body">
				        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <button class="card-header" ng-click="collapseTab(5)" type="button" ng-disabled="!proform['charreference']">
				        <div class="glyph">
		                    <i class="fa fa-users"></i>
		                </div>
				        Character Reference

				        <i class="fa fa-chevron-down"></i>
				    </button>
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