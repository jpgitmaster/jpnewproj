<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app/user/resumes/resume1.css') }}">

<div id="resume_wrpr">
	<div id="rsm_hdr">
		<div class="rsmrght">
			<span ng-if="usr[0]['imgname']" ng-cloak>
        <img ng-src="{{URL::asset('avatars')}}/<%=usr[0]['imgname']%><%=currentime%>" alt="Display Picture" class="rounded-circle" ng-cloak />
      </span>
      <span ng-if="!usr[0]['imgname']" ng-cloak>
        <i class="fa fa-user-circle-o"></i>
      </span>
		</div>
    <div class="rsmlft">
			<div class="center">
				<h2 class="whlname" ng-if="usr[0].fname && usr[0].mname && usr[0].lname">
					<%=usr[0].fname%> <%=usr[0].mname%> <%=usr[0].lname%>
				</h2>
				<div class="bglghtblu sml" ng-if="!usr[0].fname || !usr[0].mname || !usr[0].lname"></div>
				
				<span class="desc" ng-if="usr[0].objectives">
					<div ng-bind-html="usr[0].objectives"></div>
				</span>
				<div class="bglghtblu lrg" ng-if="!usr[0].objectives"></div>
			</div>
		</div>
	</div>
	<div id="rsm_cntnt">
    <div class="rsmlft">

    	<h3 class="rsmttl">Contact</h3>
    	<ul class="infos frst">
    		<li class="info">
    			<div class="bglghtblu sml" ng-if="!usr[0].email"></div>
    			<span ng-if="usr[0].email">
    				<i class="fa fa-envelope"></i>
    				<div class="txt">
    					<a href="mailto:<%=usr[0].email%>" class="hrflnk">
    						<%=usr[0].email%>
    					</a>
    				</div>
    			</span>
    		</li>
    		<li class="info">
    			<div class="bglghtblu sml" ng-if="!usr[0].phone"></div>
    			<span ng-if="usr[0].phone">
    				<i class="fa fa-phone"></i>
    				<div class="txt">
    					<%=usr[0].phone%>
    				</div>
    			</span>
    		</li>
    		<li class="info">
    			<div class="bglghtblu sml" ng-if="!usr[0].mobile"></div>
    			<span ng-if="usr[0].mobile">
    				<i class="fa fa-mobile"></i>
    				<div class="txt">
    					<%=usr[0].mobile%>
    				</div>
    			</span>
    		</li>
    		<li class="info">
    			<div class="bglghtblu lrg" ng-if="!usr[0].present_address"></div>
    			<span ng-if="usr[0].present_address">
    				<i class="fa fa-home"></i>
    				<div class="txt" style="padding-top: 0;">
    					<span ng-if="usr[0].present_address">
    						<label>Present Address</label>
    						<p>
    							<%=usr[0].present_address%>
    						</p>
    					</span>
    					<br>
    					<span ng-if="usr[0].permanent_address && usr[0].present_address">
    						<label>Permanent Address</label>
    						<p>
    							<%=usr[0].permanent_address%>
    						</p>
    					</span>
    				</div>
    			</span>
    		</li>
    	</ul>

    	<h3 class="rsmttl bgbl clrwht">Work Details</h3>
    	<ul class="infos">
    		<li class="info">
    			<div class="bglghtblu sml" ng-if="!usr[0].avlforwrk"></div>
    		</li>
    		<li class="info">
    			<div class="bglghtblu sml" ng-if="!usr[0].typofwork"></div>
    		</li>
    		<li class="info">
    			<div class="bglghtblu sml" ng-if="!usr[0].wrkexperience"></div>
    			<span ng-if="usr[0].wrkexperience">
						<label>Years of Experience:</label>
						<div class="clearfix"></div>
						<p>
							<%=getfltrvalue(yrsxprncs, usr[0].wrkexperience, 0)%>
						</p>
					</span>
    		</li>
    	</ul>

    	<h3 class="rsmttl bgbl clrwht">Personal Info</h3>
			<ul class="infos">
    		<li class="info">
    			<div class="bglghtblu sml" ng-if="!usr[0].age"></div>
    			<span ng-if="usr[0].age">
						<label>Age:</label>
						<div class="txt">
							<%=usr[0].age%>
						</div>
					</span>
    		</li>
    		<li class="info">
    			<div class="bglghtblu sml" ng-if="!usr[0].bday"></div>
    			<span ng-if="usr[0].bday">
						<label>Birthday:</label>
						<div class="txt">
							<%=usr[0].bday%>
						</div>
					</span>
    		</li>
    		<li class="info">
    			<div class="bglghtblu sml" ng-if="!usr[0].bplace"></div>
    			<span ng-if="usr[0].bplace">
						<label>Birthplace:</label>
						<div class="txt">
							<%=usr[0].bplace%>
						</div>
					</span>
    		</li>
    		<li class="info">
    			<div class="bglghtblu sml" ng-if="!usr[0].cstatus"></div>
    			<span ng-if="usr[0].cstatus">
						<label>Civil Status:</label>
						<div class="txt">
							<%=getfltrvalue(cstatus, usr[0].cstatus, 0)%>
						</div>
					</span>
    		</li>
    		<li class="info">
    			<div class="bglghtblu sml" ng-if="!usr[0].gender"></div>
    			<span ng-if="usr[0].gender">
						<label>Gender:</label>
						<div class="txt">
							<%=getfltrvalue(gender, usr[0].gender, 0)%>
						</div>
					</span>
    		</li>
    	</ul>
		</div>
		<div class="rsmrght">
			<div class="dvdr">
				<h3 class="rsmttl">Educational Background</h3>
				<ul class="rsmrght_list">
		      <li class="rcrd nocntntli">
		        <div class="bglghtblu sml" ng-if="!edc.school"></div>
		      </li>
        </ul>
			</div>
			<div class="dvdr">
				<h3 class="rsmttl">Work Experience</h3>
				<ul class="rsmrght_list">
		      <li class="rcrd" ng-repeat="emp in usr[0]['emps'] | orderBy: 'edate' | customOrderBy">
		        <div ng-if="emp.company">
		        	<div class="tprcrd">
		        		<span class="date">
		        			<%=emp.sdate | date: 'MMMM d, yyyy'%> -
		        			<span ng-if="emp.ispresent != 1">
			        			<%=emp.edate | date: 'MMMM d, yyyy'%>
			        		</span>
			        		<span ng-if="emp.ispresent == 1">
			        			<strong>PRESENT</strong>
			        		</span>
		        		</span> 
		        		<h3 class="rghttl">
		        			<i class="sqr"></i> <%=emp.company%>
		        		</h3>
		        	</div>
		        	<h4 class="hline">
		        		<strong>Position:</strong>&nbsp; <%=emp.position%>&nbsp; / &nbsp;
		        		<strong>Salary:</strong>&nbsp; <%= emp.currency ? getfltrvalue(currencies, emp.currency, 0) : '&nbsp;' %> <%= emp.salary | number %>
		        	</h4>
		        </div>
		        <div class="clearfix"></div>
		        <div ng-if="emp.jbdescription" class="cntnt mb15">
		        	<label>Job Description</label>
		        	<div ng-bind-html="emp.jbdescription"></div>
		        </div>
		        <div class="clearfix"></div>
		        <div ng-if="emp.reasonforleaving" class="cntnt mb15">
		        	<label>Reason for Leaving</label>
		        	<div ng-bind-html="emp.reasonforleaving"></div>
		        </div>
		      </li>
          <li class="rcrd" ng-if="!usr[0]['emps']">
            <div class="bglghtblu sml"></div>
            <div class="bglghtblu lrg mb15"></div>
            <div class="bglghtblu lrg mb15"></div>
          </li>
		    </ul>
			</div>
					
			<div class="dvdr">
				<h3 class="rsmttl">Character Reference</h3>
				<ul class="rsmrght_list">
		      <li class="rcrd nocntntli">
		        <div class="bglghtblu sml" ng-if="!chr.chrname"></div>
		        <div class="bglghtblu xlrg" ng-if="!chr.chrrelation"></div>
		      </li>
		    </ul>
			</div>
			<div class="clearfix"></div><br>
    </div>
	</div>
</div>