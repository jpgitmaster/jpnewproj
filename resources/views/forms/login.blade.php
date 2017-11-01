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