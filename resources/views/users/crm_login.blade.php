<!DOCTYPE html>
<html lang="en" ng-app="usrApp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:image" content="{{ URL::asset('public/img/logo.png') }}" />
  
  <link rel="shortcut icon" href="{{ URL::asset('img/logo.png') }}">
  <link rel="icon" type="image/x-icon" href="{{ URL::asset('img/logo.png') }}">
  <title>24/7 Global Nursing Solution & Consulting Services LLC - @yield('title')</title>

@if (isset($stylesheet))
  @foreach($stylesheet as $css)
<link rel="stylesheet" type="text/css" href="{{ URL::asset($css) }}">
  @endforeach
@endif
</head>
<body>
<style>
#frmlgin{
	width: 600px;
	margin: 80px auto;
	position: relative;
}
#frmlgin form{
	text-align: center;
	padding: 0;
	background-color: rgba(255, 255, 255, .5);
	position: relative;
	top: 0;
    right: -300px;
    width: 500px;
}
#frmlgin .contner{
	position: absolute;
	left: -200px;
	z-index: -1;
	top: 50px;
	width: 950px;
}
#frmlgin .nptlbl{
    color: #29166f;
    font-size: 12px;
    top: -18px;
}
#frmlgin input{
	border: 1px solid #29166f;
}
</style>
<div id="frmlgin">
	<img src="{{ URL::asset('img/containers.png') }}" alt="" class="contner">
	<form action="">
		<a href="/" class="logo">
		  <div class="cmpnylogo">
		    <img src="{{ URL::asset('img/loginmmi.png') }}" alt="">
		  </div>
		</a>
		<div style="padding: 20px; margin-top: 20px;">
			<h2 style="margin-top: -30px; margin-bottom: 40px; font-weight: bold; color: #29166f;">Crew Management System</h2>
			<div class="nptgrp">
            	<input type="text" required>
            	<label class="nptlbl">Username <span>*</span></label>
            </div>
            <div class="clearfix"></div><br>
            <div class="nptgrp">
            	<input type="password" required>
            	<label class="nptlbl">Password <span>*</span></label>
            </div>
            <div class="clearfix"></div>
            <div class="nptgrp">
            	<button class="btn btn-primary" style="width: 100%; border-radius: 0; font-weight: bold; font-size: 18px; box-shadow: none; background-color: #29166f; border: 1px solid #190c4b;">Login</button>
            </div>
		</div>
	</form>
</div>

  <!-- JS -->
@if (isset($scripts))
  @foreach($scripts as $js)
<script src="{{ URL::asset($js) }}"></script>
  @endforeach
@endif

@if (session('new_activated_user'))
  <script>
    $(function(){
      $('#new_activated_user').modal().velocity('transition.flipXIn');;
    });
  </script>
@endif
  <!-- App -->
@if (isset($ngular))
  @foreach($ngular as $ng)
<script src="{{ URL::asset($ng) }}"></script>
  @endforeach
@endif
</body>
</html>