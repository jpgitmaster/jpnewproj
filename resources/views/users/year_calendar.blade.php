@extends('users.mmi_index')
@section('title', 'Year Calendar')

@section('content')
<style>
#wrapper{
	display: block;
}
#wrapper .hdr{
	background-color: #29166f;
	width: 100%;
	float: left;
	margin-bottom: 60px;
	height: 110px;
}
#wrapper .content{
	padding: 0;
}
#wrapper .content .cntnbx {
    background-color: #FFF;
    padding: 20px;
    border: 1px solid #0077c0;
    margin: 0 20px 15px;
    font-size: 14px;
    clear: both;
    position: relative;
    top: -15px;
}
#wrapper .hdr .logo{
	width: 250px;
	display: inline-block;
	position: relative;
	left: 50px;
	top: 16px;
}
#wrapper .hdr .logo img{
	width: 100%;
}
</style>
<div class="cntnbx">
	<h4>Crew Rotation Program</h4>
	<br>
	<div class="clearfix"></div>
	<div class="row no-gutters">
		<div class="col-lg-4">
			<div class="bx">
				<div id="search_data" class="btn-group">
		      <div class="input-group">
		        <button type="button" class="input-group-addon">Search</button>
		        <input type="text" class="form-control" placeholder="Keyword...">
		        <button type="button" class="input-group-addon dropdown-toggle" data-toggle="dropdown">
		          All &nbsp;
		        </button>
		        <div class="dropdown-menu">
		        	<div class="arrow"></div>
		          <a class="dropdown-item" href="#">Vessel</a>
		          <a class="dropdown-item" href="#">Master</a>
		          <a class="dropdown-item" href="#">On-vacation</a>
		        </div>
		      </div>
		    </div>
			</div>
		</div>
		<div class="col-lg-2"></div>
		<div class="col-lg-3">
			<div class="bx">
				<div class="nptgrp">
					<select required>
	          <option>Master</option>
	        </select>
	        <label class="nptlbl">
	        	Rank <span>*</span>
	        </label>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="bx">
				<div class="nptgrp">
					<select required>
	          <option></option>
	          <option>Ten Jin Maru</option>
	          <option>King Barley</option>
	          <option>Ototachibana</option>
	          <option>Tenshu Maru</option>
	          <option>Emerald Horizon</option>
	          <option>Ultra Lion</option>
	        </select>
	        <label class="nptlbl">
	        	Vessels <span>*</span>
	        </label>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="fllclndr_lft">
		<div class="hdrlfttl">
		</div>
		<div class="clearfix"></div>
		<div class="row no-gutters">
			<div class="col-lg-12 vslhdr">
				Vessels
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="hdrbdy">
			<ul>
				<li>
					<i class="fa fa-ship" style="color: #0e99ac;"></i>
					Ten Jin Maru
				</li>
				<li>
					<i class="fa fa-ship" style="color: #f1a94e;"></i>
					King Barley
				</li>
				<li>
					<i class="fa fa-ship" style="color: #e45641;"></i>
					Ototachibana
				</li>
				<li>
					<i class="fa fa-ship" style="color: #646c70;"></i>
					Tenshu Maru
				</li>
				<li>
					<i class="fa fa-ship" style="color: #e16060;"></i>
					Emerald Horizon
				</li>
				<li>
					<i class="fa fa-ship" style="color: #60e1d1;"></i>
					Ultra Lion
				</li>
			</ul>
		</div>
	</div>
	<div class="fllclndr_rght">
		<table class="tbl">
			<tbody>
				<thead>
					<tr>
						<th class="thd" colspan="12">
							<h5>2018</h5>
						</th>
						<th class="thd" colspan="12">
							<h5>2019</h5>
						</th>
						<th class="thd" colspan="12">
							<h5>2020</h5>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="width: 1%;"><strong>1</strong></td>
						<td style="width: 1%;"><strong>2</strong></td>
						<td style="width: 1%;"><strong>3</strong></td>
						<td style="width: 1%;"><strong>4</strong></td>
						<td style="width: 1%;"><strong>5</strong></td>
						<td style="width: 1%;"><strong>6</strong></td>
						<td style="width: 1%;"><strong>7</strong></td>
						<td style="width: 1%;"><strong>8</strong></td>
						<td style="width: 1%;"><strong>9</strong></td>
						<td style="width: 1%;"><strong>10</strong></td>
						<td style="width: 1%;"><strong>11</strong></td>
						<td style="width: 1%;"><strong>12</strong></td>
						<td style="width: 1%;"><strong>1</strong></td>
						<td style="width: 1%;"><strong>2</strong></td>
						<td style="width: 1%;"><strong>3</strong></td>
						<td style="width: 1%;"><strong>4</strong></td>
						<td style="width: 1%;"><strong>5</strong></td>
						<td style="width: 1%;"><strong>6</strong></td>
						<td style="width: 1%;"><strong>7</strong></td>
						<td style="width: 1%;"><strong>8</strong></td>
						<td style="width: 1%;"><strong>9</strong></td>
						<td style="width: 1%;"><strong>10</strong></td>
						<td style="width: 1%;"><strong>11</strong></td>
						<td style="width: 1%;"><strong>12</strong></td>
						<td style="width: 1%;"><strong>1</strong></td>
						<td style="width: 1%;"><strong>2</strong></td>
						<td style="width: 1%;"><strong>3</strong></td>
						<td style="width: 1%;"><strong>4</strong></td>
						<td style="width: 1%;"><strong>5</strong></td>
						<td style="width: 1%;"><strong>6</strong></td>
						<td style="width: 1%;"><strong>7</strong></td>
						<td style="width: 1%;"><strong>8</strong></td>
						<td style="width: 1%;"><strong>9</strong></td>
						<td style="width: 1%;"><strong>10</strong></td>
						<td style="width: 1%;"><strong>11</strong></td>
						<td style="width: 1%;"><strong>12</strong></td>
					</tr>
					<tr>
						<td style="width: 1%;" colspan="8">
							<div class="am-flip-x popcntnr">
              	<div class="popover bs-popover-top" style="display: none;">
							    <div class="arrow"></div>
							    <div class="popover-body">
							    	<i class="fa fa-times-circle"></i>
							      <i class="fa fa-user-circle"></i>
							      <h4>Suyko, Rafael T.</h4>
							      <span><strong>Started:</strong> January 15, 2018</span>
							      <span><strong>Ended:</strong> August 20, 2018</span>
							      <div class="clearfix"></div>
							      <div class="row no-gutters btns">
							      	<div class="col-lg-6">
							      		<div class="bx">
							      			<button class="btn btn-primary" style="" data-toggle="modal" data-target="#addCrewModal">
										      	Add Crew
										      	<i class="fa fa-user-plus"></i>
										      </button>
							      		</div>
							      	</div>
							      	<div class="col-lg-6">
							      		<div class="bx">
								      		<button class="btn btn-success" data-toggle="modal" data-target="#viewCrewModal">
										      	View All Crews
										      	<i class="fa fa-users"></i>
										      </button>
									      </div>
							      	</div>
							      </div>
							      <div class="clearfix"></div>
							      
							    </div>
								</div>
              </div>
							<strong class="tbdy td2018">Suyko, Rafael T. (43)</strong>
						</td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
					</tr>
					<tr>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;" colspan="10">
							<strong class="tbdy td2019">Manuza, Mario A. (46)</strong>
						</td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
					</tr>
					<tr>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;" colspan="8"><strong class="tbdy td2020">Rosal, Wendel H. (39)</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
					</tr>
					<tr>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;" colspan="8"><strong class="tbdy td2021">Causing, Loren P. (41)</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
					</tr>
					<tr>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;" colspan="9"><strong class="tbdy td2022">Ramos, Rowell L. (42)</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
					</tr>
					<tr>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;"><strong>&nbsp;</strong></td>
						<td style="width: 1%;" colspan="12"><strong class="tbdy td2023">Dela Cruz, Leo D. (46)</strong></td>
					</tr>
				</tbody>
			</tbody>
		</table>
	</div>
	<div class="clearfix"></div>
	<div class="row no-gutters">
		<div class="col-lg-6">
			<strong>Vessels Legend:</strong>
			<ul class="row no-gutters lgnd">
				<li class="col-lg-4">
					<i class="fa fa-ship"></i>
					Ten Jin Maru
				</li>
				<li class="col-lg-4">
					<i class="fa fa-ship"></i>
					King Barley
				</li>
				<li class="col-lg-4">
					<i class="fa fa-ship"></i>
					Ototachibana
				</li>
				<li class="col-lg-4">
					<i class="fa fa-ship"></i>
					Tenshu Maru
				</li>
				<li class="col-lg-4">
					<i class="fa fa-ship"></i>
					Emerald Horizon
				</li>
				<li class="col-lg-4">
					<i class="fa fa-ship"></i>
					Ultra Lion
				</li>
			</ul>
		</div>
		<div class="col-lg-6">
			<nav>
			  <ul class="pgnt pagination">
			    <li class="page-item">
			      <a class="page-link" href="#" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			        <span class="sr-only">Previous</span>
			      </a>
			    </li>
			    <li class="page-item"><a class="page-link" href="#">1</a></li>
			    <li class="page-item"><a class="page-link active" href="#">2</a></li>
			    <li class="page-item"><a class="page-link" href="#">3</a></li>
			    <li class="page-item"><a class="page-link" href="#">4</a></li>
			    <li class="page-item"><a class="page-link" href="#">5</a></li>
			    <li class="page-item"><a class="page-link" href="#">6</a></li>
			    <li class="page-item">
			      <a class="page-link" href="#" aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			        <span class="sr-only">Next</span>
			      </a>
			    </li>
			  </ul>
			</nav>
		</div>
	</div>
	<div class="clearfix"></div><br><br>
</div>
<div class="modal fade" id="addCrewModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<div class="modal-header">
        <h5 class="modal-title">Add Crew</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    	<div class="modal-body">
      	<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item">
				    <a class="nav-link active" data-toggle="tab" href="#vacation">On-vacation</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="tab" href="#board">On-Board</a>
				  </li>
				</ul>
				<div class="tab-content">
				  <div class="tab-pane fade show active" id="vacation">
				  	<p style="font-size: 13px; margin: 0 0 5px; float: right;">You have total of <strong style="color: #0077c0;">9 crews</strong> on-vacation</p>
				  	<div class="clearfix"></div>
				  	<div class="lstcrews row no-gutters">
				  		<div class="col-lg-4">
		        		<div class="crws">
			        		<div class="icn">
			        			<i class="fa fa-user"></i>
			        		</div>
			        		<div class="dtls">
			        			<h4>Name</h4>
			        			<p><strong>Position:</strong> Crew Position</p>
			        			<div class="btns">
				        			<button class="btn btn-primary">
				        				Add Crew <i class="fa fa-user-plus"></i>
				        			</button>
				        		</div>
			        		</div>
			        	</div>
		        	</div>
		        	<div class="col-lg-4">
		        		<div class="crws">
			        		<div class="icn">
			        			<i class="fa fa-user"></i>
			        		</div>
			        		<div class="dtls">
			        			<h4>Name</h4>
			        			<p><strong>Position:</strong> Crew Position</p>
			        			<div class="btns">
			        				<div class="am-flip-x popcntnr">
				              	<div class="popover bs-popover-top">
											    <div class="arrow"></div>
											    <div class="popover-body" style="padding: 10px 10px 5px;">
											    	Are you sure you want to add this in your crew?
											      <div class="clearfix"></div>
											      <div class="row no-gutters" style="width: 160px; margin: 5px auto 0; text-align: center;">
											      	<div class="col-lg-6">
											      		<div class="bx">
											      			<button class="btn btn-success" style="width: 100%;">Yes</button>
											      		</div>
											      	</div>
											      	<div class="col-lg-6">
											      		<div class="bx">
											      			<button class="btn btn-danger" style="width: 100%;">No</button>
											      		</div>
											      	</div>
											      </div>
											    </div>
												</div>
				              </div>
				        			<button class="btn btn-primary">
				        				Add Crew <i class="fa fa-user-plus"></i>
				        			</button>
				        		</div>
			        		</div>
			        	</div>
		        	</div>
		        	<div class="col-lg-4">
		        		<div class="crws">
			        		<div class="icn">
			        			<i class="fa fa-user"></i>
			        		</div>
			        		<div class="dtls">
			        			<h4>Name</h4>
			        			<p><strong>Position:</strong> Crew Position</p>
			        			<div class="btns">
				        			<button class="btn btn-primary">
				        				Add Crew <i class="fa fa-user-plus"></i>
				        			</button>
				        		</div>
			        		</div>
			        	</div>
		        	</div>
		        	<div class="col-lg-4">
		        		<div class="crws">
			        		<div class="icn">
			        			<i class="fa fa-user"></i>
			        		</div>
			        		<div class="dtls">
			        			<h4>Name</h4>
			        			<p><strong>Position:</strong> Crew Position</p>
			        			<div class="btns">
				        			<button class="btn btn-primary">
				        				Add Crew <i class="fa fa-user-plus"></i>
				        			</button>
				        		</div>
			        		</div>
			        	</div>
		        	</div>
		        	<div class="col-lg-4">
		        		<div class="crws">
			        		<div class="icn">
			        			<i class="fa fa-user"></i>
			        		</div>
			        		<div class="dtls">
			        			<h4>Name</h4>
			        			<p><strong>Position:</strong> Crew Position</p>
			        			<div class="btns">
				        			<button class="btn btn-primary">
				        				Add Crew <i class="fa fa-user-plus"></i>
				        			</button>
				        		</div>
			        		</div>
			        	</div>
		        	</div>
		        	<div class="col-lg-4">
		        		<div class="crws">
			        		<div class="icn">
			        			<i class="fa fa-user"></i>
			        		</div>
			        		<div class="dtls">
			        			<h4>Name</h4>
			        			<p><strong>Position:</strong> Crew Position</p>
			        			<div class="btns">
				        			<button class="btn btn-primary">
				        				Add Crew <i class="fa fa-user-plus"></i>
				        			</button>
				        		</div>
			        		</div>
			        	</div>
		        	</div>
		        	<div class="col-lg-4">
		        		<div class="crws">
			        		<div class="icn">
			        			<i class="fa fa-user"></i>
			        		</div>
			        		<div class="dtls">
			        			<h4>Name</h4>
			        			<p><strong>Position:</strong> Crew Position</p>
			        			<div class="btns">
				        			<button class="btn btn-primary">
				        				Add Crew <i class="fa fa-user-plus"></i>
				        			</button>
				        		</div>
			        		</div>
			        	</div>
		        	</div>
		        	<div class="col-lg-4">
		        		<div class="crws">
			        		<div class="icn">
			        			<i class="fa fa-user"></i>
			        		</div>
			        		<div class="dtls">
			        			<h4>Name</h4>
			        			<p><strong>Position:</strong> Crew Position</p>
			        			<div class="btns">
				        			<button class="btn btn-primary">
				        				Add Crew <i class="fa fa-user-plus"></i>
				        			</button>
				        		</div>
			        		</div>
			        	</div>
		        	</div>
		        	<div class="col-lg-4">
		        		<div class="crws">
			        		<div class="icn">
			        			<i class="fa fa-user"></i>
			        		</div>
			        		<div class="dtls">
			        			<h4>Name</h4>
			        			<p><strong>Position:</strong> Crew Position</p>
			        			<div class="btns">
				        			<button class="btn btn-primary">
				        				Add Crew <i class="fa fa-user-plus"></i>
				        			</button>
				        		</div>
			        		</div>
			        	</div>
		        	</div>
		        </div>
				  </div>
				  <div class="tab-pane fade" id="board">
				  	<div class="lstcrews row no-gutters">
		        	<div class="col-lg-4">
		        		<div class="crws">
			        		<div class="icn">
			        			<i class="fa fa-user"></i>
			        		</div>
			        		<div class="dtls">
			        			<h4>Name</h4>
			        			<p><strong>Position:</strong> Crew Position</p>
			        			<div class="btns">
				        			<button class="btn btn-primary">
				        				Add Crew <i class="fa fa-user-plus"></i>
				        			</button>
				        		</div>
			        		</div>
			        	</div>
		        	</div>
		        	<div class="col-lg-4">
		        		<div class="crws">
			        		<div class="icn">
			        			<i class="fa fa-user"></i>
			        		</div>
			        		<div class="dtls">
			        			<h4>Name</h4>
			        			<p><strong>Position:</strong> Crew Position</p>
			        			<div class="btns">
				        			<button class="btn btn-primary">
				        				Add Crew <i class="fa fa-user-plus"></i>
				        			</button>
				        		</div>
			        		</div>
			        	</div>
		        	</div>
		        	<div class="col-lg-4">
		        		<div class="crws">
			        		<div class="icn">
			        			<i class="fa fa-user"></i>
			        		</div>
			        		<div class="dtls">
			        			<h4>Name</h4>
			        			<p><strong>Position:</strong> Crew Position</p>
			        			<div class="btns">
				        			<button class="btn btn-primary">
				        				Add Crew <i class="fa fa-user-plus"></i>
				        			</button>
				        		</div>
			        		</div>
			        	</div>
		        	</div>
		        </div>
				  </div>
				</div>
        
        <br><br>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="viewCrewModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">View All Crews</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<p style="font-size: 13px; margin: 0 0 5px; float: right;">You have total of <strong style="color: #0077c0;">9 crews</strong></p>
		  	<div class="clearfix"></div>
		  	<div class="lstcrews row no-gutters">
		  		<div class="col-lg-4">
        		<div class="crws">
        			<div class="btns rmv">
	              <i class="fa fa-times-circle"></i>
	        		</div>
	        		<div class="icn">
	        			<i class="fa fa-user"></i>
	        		</div>
	        		<div class="dtls">
	        			<h4>Name</h4>
	        			<p><strong>Position:</strong> Crew Position</p>
	        		</div>
	        	</div>
        	</div>
        	<div class="col-lg-4">
        		<div class="crws">
        			<div class="btns rmv">
        				<div class="am-flip-x popcntnr">
	              	<div class="popover bs-popover-top">
								    <div class="arrow"></div>
								    <div class="popover-body" style="padding: 5px 10px;">
								    	Are you sure you want to remove this in your crew?
								      <div class="clearfix"></div>
								      <div class="row no-gutters" style="width: 160px; margin: 5px auto 0; text-align: center;">
								      	<div class="col-lg-6">
								      		<div class="bx">
								      			<button class="btn btn-success" style="width: 100%;">Yes</button>
								      		</div>
								      	</div>
								      	<div class="col-lg-6">
								      		<div class="bx">
								      			<button class="btn btn-danger" style="width: 100%;">No</button>
								      		</div>
								      	</div>
								      </div>
								    </div>
									</div>
	              </div>
	              <i class="fa fa-times-circle"></i>
	        		</div>
	        		<div class="icn">
	        			<i class="fa fa-user"></i>
	        		</div>
	        		<div class="dtls">
	        			<h4>Name</h4>
	        			<p><strong>Position:</strong> Crew Position</p>
	        		</div>
	        	</div>
        	</div>
        	<div class="col-lg-4">
        		<div class="crws">
        			<div class="btns rmv">
	              <i class="fa fa-times-circle"></i>
	        		</div>
	        		<div class="icn">
	        			<i class="fa fa-user"></i>
	        		</div>
	        		<div class="dtls">
	        			<h4>Name</h4>
	        			<p><strong>Position:</strong> Crew Position</p>
	        		</div>
	        	</div>
        	</div>
        	<div class="col-lg-4">
        		<div class="crws">
        			<div class="btns rmv">
	              <i class="fa fa-times-circle"></i>
	        		</div>
	        		<div class="icn">
	        			<i class="fa fa-user"></i>
	        		</div>
	        		<div class="dtls">
	        			<h4>Name</h4>
	        			<p><strong>Position:</strong> Crew Position</p>
	        		</div>
	        	</div>
        	</div>
        	<div class="col-lg-4">
        		<div class="crws">
        			<div class="btns rmv">
	              <i class="fa fa-times-circle"></i>
	        		</div>
	        		<div class="icn">
	        			<i class="fa fa-user"></i>
	        		</div>
	        		<div class="dtls">
	        			<h4>Name</h4>
	        			<p><strong>Position:</strong> Crew Position</p>
	        		</div>
	        	</div>
        	</div>
        	<div class="col-lg-4">
        		<div class="crws">
        			<div class="btns rmv">
	              <i class="fa fa-times-circle"></i>
	        		</div>
	        		<div class="icn">
	        			<i class="fa fa-user"></i>
	        		</div>
	        		<div class="dtls">
	        			<h4>Name</h4>
	        			<p><strong>Position:</strong> Crew Position</p>
	        		</div>
	        	</div>
        	</div>
        	<div class="col-lg-4">
        		<div class="crws">
        			<div class="btns rmv">
	              <i class="fa fa-times-circle"></i>
	        		</div>
	        		<div class="icn">
	        			<i class="fa fa-user"></i>
	        		</div>
	        		<div class="dtls">
	        			<h4>Name</h4>
	        			<p><strong>Position:</strong> Crew Position</p>
	        		</div>
	        	</div>
        	</div>
        	<div class="col-lg-4">
        		<div class="crws">
        			<div class="btns rmv">
	              <i class="fa fa-times-circle"></i>
	        		</div>
	        		<div class="icn">
	        			<i class="fa fa-user"></i>
	        		</div>
	        		<div class="dtls">
	        			<h4>Name</h4>
	        			<p><strong>Position:</strong> Crew Position</p>
	        		</div>
	        	</div>
        	</div>
        	<div class="col-lg-4">
        		<div class="crws">
        			<div class="btns rmv">
	              <i class="fa fa-times-circle"></i>
	        		</div>
	        		<div class="icn">
	        			<i class="fa fa-user"></i>
	        		</div>
	        		<div class="dtls">
	        			<h4>Name</h4>
	        			<p><strong>Position:</strong> Crew Position</p>
	        		</div>
	        	</div>
        	</div>
        </div>
        <br><br>
      </div>
    </div>
  </div>
</div>
{{-- <div class="cntnbx">
	<h4>Crew Change Plan</h4>
	<div class="clearfix"></div>
	<div class="row no-gutters" style="margin-top: 10px;">
		<div class="col-lg-4">
			<div class="bx">
				<div id="search_data" class="btn-group">
		      <div class="input-group">
		        <button type="button" class="input-group-addon">Search</button>
		        <input type="text" class="form-control" placeholder="Keyword...">
		        <button type="button" class="input-group-addon dropdown-toggle" data-toggle="dropdown">
		          All &nbsp;
		        </button>
		        <div class="dropdown-menu">
		        	<div class="arrow"></div>
		          <a class="dropdown-item" href="#">Vessel</a>
		          <a class="dropdown-item" href="#">Master</a>
		          <a class="dropdown-item" href="#">On-vacation</a>
		        </div>
		      </div>
		    </div>
			</div>
		</div>
		<div class="col-lg-2"></div>
		<div class="col-lg-3">
			<div class="bx">

			</div>
		</div>
		<div class="col-lg-3">
			<div class="bx">
				<div class="nptgrp">
					<select required>
	          <option></option>
	          <option>Ten Jin Maru</option>
	          <option>King Barley</option>
	          <option>Ototachibana</option>
	          <option>Tenshu Maru</option>
	          <option>Emerald Horizon</option>
	          <option>Ultra Lion</option>
	        </select>
	        <label class="nptlbl">
	        	Vessels <span>*</span>
	        </label>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<table class="tbl ccp">
		<thead>
			<tr>
				<th class="thd">Fleet</th>
				<th class="thd">Vessel</th>
				<th class="thd">Owner</th>
				<th class="thd">Rank</th>
				<th class="thd">Name</th>
				<th class="thd">PIC</th>
				<th class="thd">Type</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>D</td>
				<td>
					<a href="#" data-toggle="modal" data-target="#viewCCPmodal">
						Lowlands Kamsar
					</a>
				</td>
				<td>MKCA</td>
				<td>CM</td>
				<td>Jun Petrasanta</td>
				<td>Loka/Roy</td>
				<td>HM</td>
			</tr>
			<tr>
				<td>D</td>
				<td>
					<a href="">
						Lowlands Kamsar
					</a>
				</td>
				<td>MKCA</td>
				<td>1AE</td>
				<td>Liberato Fuego stays in the Eng Cntrl Rm all the time</td>
				<td>Loka/Roy</td>
				<td>HM</td>
			</tr>
			<tr>
				<td>D</td>
				<td>
					<a href="">
						Lowlands Kamsar
					</a>
				</td>
				<td>MKCA</td>
				<td>3AE</td>
				<td>Antonio Juanir Jr</td>
				<td>Loka/Roy</td>
				<td>HM</td>
			</tr>
			<tr>
				<td>B</td>
				<td>
					<a href="">
						Lowlands Kamsar
					</a>
				</td>
				<td>MKCA</td>
				<td>AB</td>
				<td>Greg Jayectin</td>
				<td>Loka/Roy</td>
				<td>PM</td>
			</tr>
			<tr>
				<td>C</td>
				<td>
					<a href="">
						Safmarine Sanaga
					</a>
				</td>
				<td>MKCS</td>
				<td>2M</td>
				<td>Beda Pineda</td>
				<td>Loka/Roy</td>
				<td>CT</td>
			</tr>
			<tr>
				<td>B</td>
				<td>
					<a href="">
						Safmarine Sanaga
					</a>
				</td>
				<td>MKCS</td>
				<td>1AE</td>
				<td>Rodolfo Castromayor</td>
				<td>Loka/Roy</td>
				<td>CT</td>
			</tr>
			<tr>
				<td>B</td>
				<td>
					<a href="">
						Safmarine Sanaga
					</a>
				</td>
				<td>MKCS</td>
				<td>2AE</td>
				<td>Danilo Espanola</td>
				<td>Loka/Roy</td>
				<td>CT</td>
			</tr>
		</tbody>
	</table>
	<div class="clearfix"></div>
	<div class="row no-gutters">
		<div class="col-lg-6">

		</div>
		<div class="col-lg-6">
			<nav>
			  <ul class="pgnt pagination">
			    <li class="page-item">
			      <a class="page-link" href="#" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			        <span class="sr-only">Previous</span>
			      </a>
			    </li>
			    <li class="page-item"><a class="page-link" href="#">1</a></li>
			    <li class="page-item"><a class="page-link active" href="#">2</a></li>
			    <li class="page-item"><a class="page-link" href="#">3</a></li>
			    <li class="page-item"><a class="page-link" href="#">4</a></li>
			    <li class="page-item"><a class="page-link" href="#">5</a></li>
			    <li class="page-item"><a class="page-link" href="#">6</a></li>
			    <li class="page-item">
			      <a class="page-link" href="#" aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			        <span class="sr-only">Next</span>
			      </a>
			    </li>
			  </ul>
			</nav>
		</div>
	</div>
</div>
<div class="modal fade" id="viewCCPmodal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Lowlands Kamsar</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding: 10px;">
      	<ul class="ccpdtls">
      		<li style="width: 16.66%;">
      			<strong>Fleet</strong>
      			<span>D</span>
      		</li>
      		<li style="width: 16.66%;">
      			<strong>Owner</strong>
      			<span>MKCA</span>
      		</li>
      		<li style="width: 16.66%;">
      			<strong>PIC</strong>
      			<span>Lokal / Roy</span>
      		</li>
      		<li style="width: 16.66%;">
      			<strong>Type</strong>
      			<span>HM</span>
      		</li>
      		<li style="width: 16.66%;">
      			<strong>No.</strong>
      			<span>9</span>
      		</li>
      		<li style="width: 16.66%;">
      			<strong>Month</strong>
      			<span>8</span>
      		</li>
      		<li style="width: 25%;">
      			<strong>Name</strong>
      			<span>Jun Petrasanta</span>
      		</li>
      		<li style="width: 25%;">
      			<strong>Replacement Date</strong>
      			<span>3-Aug</span>
      		</li>
      		<li style="width: 25%;">
      			<strong>Port Replacement</strong>
      			<span>Vado Ligure</span>
      		</li>
      		<li style="width: 25%;">
      			<strong>No. of Contract</strong>
      			<span>9</span>
      		</li>
      		<li style="width: 25%;">
      			<strong>Embark Date</strong>
      			<span>20-Aug-10</span>
      		</li>
      		<li style="width: 25%;">
      			<strong>Disembark Date</strong>
      			<span>20-May-11</span>
      		</li>
      		<li style="width: 25%;">
      			<strong>Rank</strong>
      			<span>CM</span>
      		</li>
      		<li style="width: 25%;">
      			<strong>HIGH ER LIC.</strong>
      			<span>&nbsp;</span>
      		</li>
      		<li style="width: 100%;">
      			<strong>Reliever / On-Signer</strong>
      			<span>No candidate yet</span>
      		</li>
      		<li style="width: 50%;">
      			<strong>Remarks</strong>
      			<span>
      				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt sed, sapiente provident ea incidunt id error, eos! Reiciendis itaque repudiandae, sit, molestiae officiis aliquam eveniet fugit recusandae a fugiat sequi.
      			</span>
      		</li>
      		<li style="width: 50%;">
      			<strong>Comment</strong>
      			<span>
      				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum eaque neque mollitia temporibus ipsam! Minus veniam, dignissimos consequatur magnam unde labore, asperiores soluta aut dolore ipsa corporis beatae quisquam mollitia.
      			</span>
      		</li>
      	</ul>
        <br><br>
      </div>
    </div>
  </div>
</div> --}}
@endsection