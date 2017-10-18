<!DOCTYPE html>
<html lang="en" ng-app="ngApp">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	@if (isset($stylesheet))
      @foreach($stylesheet as $css)
        <link rel="stylesheet" type="text/css" href="{{ URL::asset($css) }}">
      @endforeach
    @endif
</head>
<body>
<div id="wrapper" ng-controller="ctrlApp">
	<div class="hdr_left">
		{{-- <a href="/" class="logo">
			<div class="cmpnylogo">
				<img src="{{ URL::asset('img/logo.png') }}" alt="">
			</div>
			<div class="cmpnyname">
				<span class="drk">Global Nursing Solution &</span>
				<span class="lght">Consulting Services LLC</span>
			</div>
		</a> --}}
	</div>
	<div class="hdr_right">
		<form id="frmlgn" action="login" method="POST" novalidate>
	  		{{ csrf_field() }}
	  		<div class="row no-gutters">
	  			<div class="col-lg-6">
	  				<div class="bx">
		  				<div class="nptgrp {{$errors->login->has('email') ? 'err' : ''}}">
				            <input type="text" name="email" value="{{ old('email') }}" ng-focus="l_email = true" ng-blur="l_email = false" required>
				            <label>Email</label>
				            @if ($errors->login->has('email'))
				                <div class="am-flip-x popcntnr" ng-if="l_email === true" ng-cloak>
				                    <div class="popover bs-popover-top">
									    <div class="arrow"></div>
									    <div class="popover-body">
									      {{ $errors->login->first('email') }}
									    </div>
									</div>
				                </div>
				            @endif
				        </div>
				        <div class="rmmbr">
				        	<input type="checkbox">
				        	<label>Remember Me</label>
				        </div>
			        </div>
	  			</div>
	  			<div class="col-lg-6">
	  				<div class="bx">
		  				<div class="nptgrp {{$errors->login->has('pword') ? 'err' : ''}}">
				            <input type="password" name="pword" ng-focus="l_pword = true" ng-blur="l_pword = false" required>
				            <label>Password</label>
				            @if ($errors->login->has('pword'))
				                <div class="am-flip-x popcntnr" ng-if="l_pword === true" ng-cloak>
				                    <div class="popover bs-popover-top">
									    <div class="arrow"></div>
									    <div class="popover-body">
									      {{ $errors->login->first('pword') }}
									    </div>
									</div>
				                </div>
				            @endif
				        </div>
				        <button type="submit" class="btn btnblu">
				            Login
				        </button>
			        </div>
	  			</div>
	  		</div>
	    </form>
	</div>
	<div class="sldr">
		<div id="rgstrtn">
			<div class="ttls">
				<h1>Registration</h1>
				<h2>Lorem Ipsum Dolor</h2>	
			</div>
			
			<form ng-submit="usrRegister(rgstr)" method="POST" novalidate>
	            <input type="hidden" ng-model="rgstr.token" ng-init="rgstr.token='{{csrf_token()}}'">
	            <div class="no-gutter">
	                <div class="col-lg-12">
	                    <div class="nptgrp" ng-class="{'err': msg['error']['email']}">
	                        <input type="text" ng-model="rgstr.email" ng-focus="fcs_email = true" ng-blur="fcs_email = false" required>
	                        <label>Email</label>
	                        <div class="am-flip-x popcntnr" ng-if="msg['error']['email'] && fcs_email === true" ng-cloak>
	                        	<div class="popover bs-popover-top">
								    <div class="arrow"></div>
								    <div class="popover-body">
								      <%= msg['error']['email'][0] %>
								    </div>
								</div>
			                </div>
	                    </div>
	                </div>
	                <div class="col-lg-12">
	                    <div class="nptgrp" ng-class="{'err': msg['error']['pword']}">
	                        <input type="password" ng-model="rgstr.pword" ng-focus="fcs_pword = true" ng-blur="fcs_pword = false" required>
	                        <label>Password</label>
	                        <div class="am-flip-x popcntnr" ng-if="msg['error']['pword'] && fcs_pword === true" ng-cloak>
	                        	<div class="popover bs-popover-top">
								    <div class="arrow"></div>
								    <div class="popover-body">
								      <%= msg['error']['pword'][0] %>
								    </div>
								</div>
			                </div>
	                    </div>
	                </div>
	                <div class="col-lg-12">
	                    <div class="nptgrp" ng-class="{'err': msg['error']['pword_confirmation']}">
	                        <input type="password" ng-model="rgstr.pword_confirmation" ng-focus="fcs_pword_confirmation = true" ng-blur="fcs_pword_confirmation = false" required>
	                        <label>Confirm Password</label>

	                        <div class="am-flip-x popcntnr" ng-if="msg['error']['pword_confirmation'] && fcs_pword_confirmation === true" ng-cloak>
	                        	<div class="popover bs-popover-top">
								    <div class="arrow"></div>
								    <div class="popover-body">
								      <%= msg['error']['pword_confirmation'][0] %>
								    </div>
								</div>
			                </div>
	                    </div>
	                    <button type="submit" class="btn btnblu">
	                        Register
	                    </button>
	                </div>
	            </div>
	        </form>
		</div>
	</div>
	<div class="footer">
    <div class="no-gutter">
      <div class="col-lg-4">
        <div class="ftrbx">
          <h3>24/7 Global Nursing Solution &amp; Consulting Services LLC</h3>
          <ul>
            <li>
              <i class="fa fa-envelope" style="font-size: 16px;"></i>
              <a href="mailto:support@247globalnursingsolution.com">support@247globalnursingsolution.com</a>
            </li>
            <li>
              <i class="fa fa-phone"></i>
              <span>(212) 244-0247</span>
            </li>
            <li>
              <i class="fa fa-fax" style="font-size: 16px;"></i>
              <span>Fax No: (212) 244-0248</span>
            </li>
            <li>
              <i class="fa fa-map-marker"></i>
              <span>
                330 West 38th Street, Suite 808, New York, NY, 10018
              </span>
            </li>
            <li></li>
          </ul>
          <ul class="sclmedia">
            <li>
            	<a href="https://www.facebook.com/247-Global-Nursing-Solution-and-Consulting-Services-LLC-177514276040094/?fref=ts" target="_blank">
            		<i class="fa fa-facebook"></i>
            	</a>
            </li>
            <li>
            	<a href="https://twitter.com/247GNSCS" target="_blank">
            		<i class="fa fa-twitter"></i>
            	</a>
            </li>
            <li>
            	<a href="https://www.instagram.com/247gnscs/" target="_blank">
            		<i class="fa fa-instagram"></i>
            	</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
	<div class="ftr">
      <p>24/7 Global Nursing Solution &amp; Consulting Services LLC © 2016. All Rights Reserved</p>
  	</div>
</div>
@if (isset($scripts))
  @foreach($scripts as $js)
    <script src="{{ URL::asset($js) }}"></script>
  @endforeach
@endif


<!-- App -->
@if (isset($ngular))
  @foreach($ngular as $ng)
    <script src="{{ URL::asset($ng) }}"></script>
  @endforeach
@endif
</body>
</html>