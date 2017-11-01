<!DOCTYPE html>
<html lang="en" ng-app="ngApp">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:image" content="{{ URL::asset('public/img/logo.png') }}" />
  
    <link rel="shortcut icon" href="{{ URL::asset('img/logo.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('img/logo.png') }}">
    <title>24/7 Global Nursing Solution & Consulting Services LLC</title>

	@if (isset($stylesheet))
      @foreach($stylesheet as $css)
        <link rel="stylesheet" type="text/css" href="{{ URL::asset($css) }}">
      @endforeach
    @endif
</head>
<body>
<div id="wrapper" ng-controller="ctrlApp">
	<div class="hdrtop">
		<div class="hdr_left">
			<a href="/" class="logo">
				<div class="cmpnylogo">
					<img src="{{ URL::asset('img/logo.png') }}" alt="">
				</div>
				<div class="cmpnyname">
					<span class="drk">Global Nursing Solution &</span>
					<span class="lght">Consulting Services LLC</span>
				</div>
			</a>
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
					        	<label class="option">
					                <input type="checkbox" name="rememberme" class="fcs">
					                <span class="checkbox"></span>
				                </label>
					        	<label class="lbl">Remember Me</label>
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
					        <div class="rmmbr">
					        	<a href="" class="lbl">Forgot your password?</a>
					        </div>
					        <button type="submit" class="btn btnblu">
					            Login
					        </button>
				        </div>
		  			</div>
		  		</div>
		    </form>
		</div>
	</div>
	
	<div class="sldr">
		<div class="sldr_left">
			<img src="{{ URL::asset('img/ceo.png') }}" alt="">
			<div class="ceo_testi">
				<div class="popover bs-popover-right">
				    <div class="arrow"></div>
				    <div class="popover-body">
				      	Let 24/7 Global Nursing Solution and Consulting Services help you to become a skilled, experienced and competitive healthcare professional. Finding the right job and not just a job. We offer assistance in every way we can to all our recruits, not only professionally but also in handling the struggles of our profession. We maybe new in the business but not in Nursing. Let us be your partner and we can work together to build not only your career but your dreams as well.
				    </div>
				</div>
				<div class="ceoname">
					<h2>Andrea Jose, BSN, RN</h2>
					<h4>President / CEO / Founder</h4>
				</div>
			</div>
		</div>
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
	                    <span ng-if="loader" ng-cloak>
		                    <svg width="60px" height="60px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
						      <rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="30" fill="#d6f1ff" stroke="#2b74ba" stroke-width="8px"></circle><line x1="50" y1="50" x2="50" y2="30" stroke="#000" stroke-width="5" stroke-linecap="round" transform="rotate(99.6 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="5s" repeatCount="indefinite"></animateTransform></line><line x1="50" y1="50" x2="50" y2="20" stroke="#f00" stroke-width="2px" stroke-linecap="round" opacity="1" transform="rotate(138 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="1s" repeatCount="indefinite"></animateTransform></line>
						    </svg>
					    </span>
	                </div>
	            </div>
	        </form>
		</div>
	</div>
	<div class="services">
	  <div class="row no-gutters">
	    <div class="col-lg-3 blubx">
	      <div class="bx">
	        <h3>Professional Growth</h3>
	        <p>
	          We recruit efficient and competent professionals. We will help you every step of the way to build your career in healthcare. We offer permanent, part time and per-diem positions.
	        </p>
	      </div>
	    </div>
	    <div class="col-lg-3 blubx">
	      <div class="bx">
	        <h3>Perks &amp; Benefits</h3>
	        <p>
				In return for commitment, hard work and talent, we offer competitive salaries and benefits, high quality training and opportunities.
	        </p>
	      </div>
	    </div>
	    <div class="col-lg-3 blubx">
	      <div class="bx">
	        <h3>Client Services</h3>
	        <p>
	          We cater to the different Nursing Facilities in New York State. We live in our core value of Client Satisfaction giving a professional yet a personal service.
	        </p>
	      </div>
	    </div>
	    <div class="col-lg-3 blubx">
	      <div class="bx">
	        <h3>Staffing &amp; Solutions</h3>
	        <p>
	          We offer Staffing Assistance. We will help you find the right professional for the job. Matching skills with responsibilities that will work for your business. Working with you to give Quality Patient Care.
	        </p>
	      </div>
	    </div>
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
	
	<div class="modal msgmdl" id="sccssrgstrtn">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-body">
	      	<button type="button" class="close" data-dismiss="modal">
	          <span>&times;</span>
	        </button>
	        <i class="fa fa-check"></i>
	        <div class="msg">
	        	<h1>Congratulations!</h1>
	        	<p>
	        		You are now successfully registered. Please check your email to activate your account.
	        	</p>
	        </div>
	      </div>
	    </div>
	  </div>
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