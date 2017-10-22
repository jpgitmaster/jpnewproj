@extends('users.index')
@section('title', 'Dashboard')

@section('content')
<div id="edit_profile" ng-controller="ctrlEditProfile">
	<div class="grdprofile">
		<div class="content_left">
			<div class="cntnbx">
				<div class="ttl">
				    <h3>User Profile</h3>
				    <div class="btmbrdr"><hr></div>
				</div>
				<div id="edtprof_accrdn">
				  <div class="card">
				    <div class="card-header" data-toggle="collapse" href="#collapseOne">
				        Collapsible Group Item #1
				    </div>

				    <div id="collapseOne" class="collapse show">
				      <div class="card-body">
				        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header collapsed" data-toggle="collapse" href="#collapseTwo">
				        Collapsible Group Item #2
				    </div>
				    <div id="collapseTwo" class="collapse">
				      <div class="card-body">
				        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header collapsed" data-toggle="collapse" href="#collapseThree">
				        Collapsible Group Item #3
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
		<div class="avatar">
			<div class="cntnbx">
				<div class="ttl">
				    <h3>Display Picture</h3>
				    <div class="btmbrdr"><hr></div>
				</div>
				<div class="dsplaypc">
					<span ng-if="!imgtarget" ng-cloak>
						<i class="fa fa-user-circle-o"></i>
					</span>
					<span ng-if="imgtarget" ng-cloak>
						<div class="prvw">
				            <div class="preview-pane">
				                <div class="preview-container">
				                  <span ng-if="imgtarget" ng-cloak>
				                    <img ng-src="<%=imgtarget%>" alt="Avatar" class="imglnk" />
				                  </span>
				                </div>
				            </div>
				        </div>
				    </span>
				</div>
				<div class="alert" ng-if="msg['file']" ng-cloak>
					<ul>
						<li ng-repeat="test in msg['file']"><%=test%></li>
					</ul>
				</div>
				<div class="clearfix"></div>
				<div class="fileUpload btn btn-primary">
	                Browse <input type="file" class="upload" file-input="files">
	            </div>
			</div>
		</div>
		<div class="preview_resume">
			<div class="cntnbx">
				<div class="ttl">
				    <h3>Resume</h3>
				    <div class="btmbrdr"><hr></div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- Modal -->

	<div class="modal fade" id="cropModal">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      	<button type="button" class="close" data-dismiss="modal">
	          <span>&times;</span>
	        </button>
	      	<div class="ttl">
			    <h3>Change Display Picture</h3>
			    <div class="btmbrdr"><hr></div>
			</div>
	      <div class="modal-body">
	        <div class="prvw">
	            <div class="preview-pane">
	                <div class="preview-container">
	                  <span ng-if="imgtarget" ng-cloak>
	                    <img ng-src="<%=imgtarget%>" alt="Avatar" class="imglnk" />
	                  </span>
	                </div>
	            </div>
	        </div>
            <div class="imgcropper" jp-custom-crop>
              <img ng-src="<%=imgtarget%>" alt="Cropping Image" id="target" />
            </div> 
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
</div>
@endsection