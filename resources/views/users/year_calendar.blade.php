@extends('users.index')
@section('title', 'Year Calendar')

@section('content')
<style>
	.tbl{
		width: 100%;
	}
	.tbl td{
		text-align: center;
	}
	.tbl td h5{
		margin: 6px 0;
	}
	.fllclndr_lft{
		width: 250px;
		float: left;
		background-color: #F9F9F9;
		padding: 6px 15px 15px;
		border: 1px solid #000;
		position: relative;
    right: -1px;
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
		background-color: #0077c0;
	}

</style>
<div class="cntnbx">
	<h3>Crew Rotation Program</h3>
	<div class="clearfix"></div>
	<div class="fllclndr_lft">
		<h5>Masters</h5>
	</div>
	<div class="fllclndr_rght">
		<table class="tbl" style="border-collapse: collapse;" border="1">
			<tbody>
				<tr>
					<td style="width: 12%;" colspan="12">
						<h5>2018</h5>
					</td>
					<td style="width: 12%;" colspan="12">
						<h5>2019</h5>
					</td>
					<td style="width: 1%;" colspan="12">
						<h5>2020</h5>
					</td>
				</tr>
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
		</table>
	</div>
	<div class="clearfix"></div>

</div>
@endsection