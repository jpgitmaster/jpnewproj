@extends('users.index')
@section('title', 'Year Calendar')

@section('content')
<div class="cntnbx">
	<h4>Crew Rotation Program</h4>
	<br>
	<div class="clearfix"></div>
	<div class="row no-gutters">
		<div class="col-lg-4">
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
		<div class="col-lg-5">
			
		</div>
		<div class="col-lg-3">
			<div class="nptgrp">
				<select required>
          <option></option>
          <option><i class="fa fa-ship"></i> Ten Jin Maru</option>
          <option><i class="fa fa-ship"></i> King Barley</option>
          <option><i class="fa fa-ship"></i> Ototachibana</option>
          <option><i class="fa fa-ship"></i> Tenshu Maru</option>
          <option><i class="fa fa-ship"></i> Emerald Horizon</option>
          <option><i class="fa fa-ship"></i> Ultra Lion</option>
        </select>
        <label class="nptlbl">
        	Vessels <span>*</span>
        </label>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="fllclndr_lft">
		<div class="hdrlfttl">
			<h5>CRP</h5>
		</div>
		<div class="clearfix"></div>
		<div class="row no-gutters">
			<div class="col-lg-12 vslhdr">
				Masters
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="hdrbdy">
			<ul>
				<li>
					Suyko, Rafael T. (43)
				</li>
				<li>
					Manuza, Mario A. (46)
				</li>
				<li>
					Rosal, Wendel H. (39)
				</li>
				<li>
					Causing, Loren P. (41)
				</li>
				<li>
					Ramos, Rowell L. (42)
				</li>
				<li>
					Dela Cruz, Leo D. (46)
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
              	<div class="popover bs-popover-top" style="display: block;">
							    <div class="arrow"></div>
							    <div class="popover-body">
							    	<i class="fa fa-times-circle"></i>
							      <i class="fa fa-user-circle"></i>
							      <h4>Suyko, Rafael T.</h4>
							      <span><strong>Started:</strong> January 15, 2018</span>
							      <span><strong>Ended:</strong> August 20, 2018</span>
							      <div class="clearfix"></div>
							    </div>
								</div>
              </div>
							<strong class="tbdy td2018">Ten Jin Maru</strong>
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
							<strong class="tbdy td2019">King Barley</strong>
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
						<td style="width: 1%;" colspan="8"><strong class="tbdy td2020">Ototachibana</strong></td>
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
						<td style="width: 1%;" colspan="8"><strong class="tbdy td2021">Tenshu Maru</strong></td>
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
						<td style="width: 1%;" colspan="9"><strong class="tbdy td2022">Emerald Horizon</strong></td>
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
						<td style="width: 1%;" colspan="12"><strong class="tbdy td2023">Ultra Lion</strong></td>
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
@endsection