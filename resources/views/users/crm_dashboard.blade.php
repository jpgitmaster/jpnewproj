@extends('users.mmi_index')
@section('title', 'CRM Dashboard')

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
#wrapper .content .cntnbx{
	border: 0;
	padding: 0;
	margin: 0;
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
.dshbx{
	padding: 20px;
	background-color: #0077c0;
	margin: 10px;
	color: #FFF;
	border-radius: 10px;
	opacity: .8;
	cursor: pointer;
}
.dshbx:hover{
	opacity: 1;
}
.dshbx .fa{
	font-size: 50px;
	float: left;
	margin-right: 15px;
}
.dshbx h4{
	margin: 0;
	font-size: 20px;
}
.dshbx p{
	font-style: italic;
}
</style>
<div class="cntnbx">
	<br>
	<div class="row no-gutters" style="width: 900px; margin: 0 auto;">
		<div class="col-lg-6">
			<div class="dshbx" style="background-color: #0e99ac;">
				<i class="fa fa-address-card"></i>
				<h4>Master Files</h4>
				<p>Commodi nulla, quia deserunt, impedit voluptatibus qua.</p>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="dshbx" style="background-color: #f1a94e;">
				<i class="fa fa-file-text"></i>
				<h4>DOCS Alert</h4>
				<p>Perferendis minus consequuntur amet unde adipisci dolore laudantium.</p>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="dshbx" style="background-color: #e45641;">
				<i class="fa fa-ship"></i>
				<h4>CCP / CRP</h4>
				<p>Est et aliquid exercitationem, harum impedit nesciunt porro ut quo.</p>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="dshbx" style="background-color: #646c70;">
				<i class="fa fa-calendar"></i>
				<h4>Automated Forms & KPI Reports</h4>
				<p>Fugiat quod commodi totam qui officiis iste, aspernatur!</p>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div><br><br>
</div>
@endsection