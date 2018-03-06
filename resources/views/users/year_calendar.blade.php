@extends('users.index')
@section('title', 'Year Calendar')

@section('content')
<style>
	.tbl{
		width: 100%;
	}
	.tbl th, .tbl td{
		text-align: center;
		border: 1px solid #ccc;
	}
	.tbl th h5{
		margin: 0;
	}
	.fllclndr_lft{
		width: 250px;
		float: left;
		padding: 0;
		border: 1px solid #CCC;
		position: relative;
    right: -1px;
	}
	.fllclndr_lft .hdrlfttl{
		height: 36px;
		padding: 5px 10px;
		background-color: #F9F9F9;
		border-bottom: 1px solid #CCC;
	}
	.fllclndr_lft .hdrbdy{
		padding: 15px;
	}
	.fllclndr_lft ul{
		margin: 0;
		padding: 0;
	}
	.fllclndr_lft ul li{
		list-style: none;
	}
	.fllclndr_lft .hdrlfttl h5{
		margin: 0;
	}
	.fllclndr_rght{
		margin-left: 250px;
		overflow-x: auto;
		padding-bottom: 5px;
	}
	.fllclndr_rght table{
		width: 1200px;
	}
	.fllclndr_rght::-webkit-scrollbar-track
	{
		-webkit-box-shadow: inset 0 0 4px rgba(0,0,0,0.3);
		border-radius: 10px;
		background-color: #F5F5F5;
	}

	.fllclndr_rght::-webkit-scrollbar
	{
		height: 8px;
		background-color: #F5F5F5;
	}

	.fllclndr_rght::-webkit-scrollbar-thumb
	{
		border-radius: 10px;
		-webkit-box-shadow: inset 0 0 4px rgba(0,0,0,.3);
		background-color: #333;
	}
	.tbl{
		border: 1px solid #CCC;
		border-collapse: collapse;
	}
	.tbl .thd{
		background-color: #F9F9F9;
		color: #000;
		width: 33.33%;
		height: 36px;
		padding: 5px 10px;
	}
	.tbdy{
		color: #FFF;
		cursor: pointer;
	}
	.td2018{
		background-color: #049c07;
	}
	.td2019{
		background-color: #0077c0;
	}
	.td2020{
		background-color: #b7b013;
	}
	#search_data{
		width: 100%;
	}
	#search_data button{
		border: 1px solid #0077c0;
    border-radius: 0;
    background-color: #0077c0;
    color: #FFF;
    height: 34px;
    padding: 5px 15px;
    outline: none;
    box-shadow: none;
    cursor: pointer;
	}
	#search_data input[type=text]{
    border: 1px solid #0077c0;
    border-right: 0;
    height: 34px;
    font-size: 14px;
	}
	#search_data .dropdown-toggle{
		background-color: #FFF;
		border-right: 1px solid #0077c0;
		border-top-right-radius: 0;
		border-bottom-right-radius: 0;
		border-left: 0;
		color: #0077c0;
		font-size: 14px;
	}
	#search_data .dropdown-menu{
		border: 1px solid #0077c0;
		color: #0077c0;
	}
	#search_data .dropdown-menu a{
		color: #0077c0;
	}
</style>
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
	<div class="clearfix"></div>
	<div class="fllclndr_lft">
		<div class="hdrlfttl">
			<h5>CRP</h5>
		</div>
		<div class="clearfix"></div>
		<div class="row no-gutters">
			<div class="col-lg-6">
				Vessels
			</div>
			<div class="col-lg-6">
				Masters
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="hdrbdy">
			<ul>
				<li>
					Ten Jin Maru
				</li>
				<li>
					King Barley
				</li>
				<li>
					Ototachibana
				</li>
				<li>
					Tenshu Maru
				</li>
				<li>
					Emerald Horizon
				</li>
				<li>
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
						<td style="width: 1%;" class="tbdy td2018" colspan="14"><strong>Vessel 1</strong></td>
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
						<td style="width: 1%;" class="tbdy td2019" colspan="10"><strong>Vessel 2</strong></td>
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
						<td style="width: 1%;" class="tbdy td2020" colspan="8"><strong>Vessel 3</strong></td>
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
				</tbody>
			</tbody>
		</table>
	</div>
	<div class="clearfix"></div>

</div>
@endsection