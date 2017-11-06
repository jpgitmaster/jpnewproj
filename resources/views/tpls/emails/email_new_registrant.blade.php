<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Test Email</title>
        <style>
        	body{
        		position: relative;
        	}
        	.jpwrpr{
        		font-family: "Open Sans","Helvetica Neue",Arial,Helvetica,Verdana,sans-serif;
        		padding: 30px;
        		background-color: #f6f6f6;
        		border: 1px solid #34b2ff;
        		width: 80%;
        		margin: 30px auto 100px;
        		border-radius: 10px;
        		text-align: center;
        	}
        	.jpwrpr .jpmsg{
        		float: left;
        		width: 100%;
        		margin: 0 0 20px;
        		text-align: left;
        		font-size: 16px;
        		line-height: 22px;
        		color: #0077c0;
        	}
        	.jpwrpr .jpmsg h2{
        		font-size: 30px;
        		margin: 0 0 25px;
        	}
        	.jpwrpr .jpmsg strong{
        		font-size: 18px;
			    margin: 6px 0 15px;
			    float: left;
        	}
        	.jpwrpr .actvt{
				background-color: #0077c0;
			    color: #FFF;
			    text-decoration: none;
			    padding: 15px 60px;
			    display: inline-block;
			    font-size: 20px;
			    text-transform: uppercase;
			    font-weight: bold;
			    border-radius: 5px;
        	}
        	.imgcntnr{
        		text-align: center;
        		margin: 50px 0 30px;
        	}
        	.imgcntnr a{
        		text-decoration: none;
        	}
        	.imgcntnr a img{
        		display: inline-block;
        	}
        	.bgbtm{
        		background-color: #6cc5e5;
        		min-height: 300px;
        		position: absolute;
        		bottom: 0;
        		left: 0;
        		right: 0;
        	}
        </style>
    </head>
    <body>
    	<div class="bgbtm"></div>
    	<div class="imgcntnr">
    		<a href="http://247globalnursingsolution.com" target="_blank">
    			<img src="http://247globalnursingsolution.com/img/email_logo.jpg" alt="">
    		</a>
    	</div>
		<div class="jpwrpr">
			<div class="jpmsg">
				<h2>Congratulations!</h2>
				Thank you for your interest in joining 24/7 Global Nursing Solution & Consulting Services LLC. We appreciate the time you've taken to apply for the position of.
				<br><br>
				After reviewing your profile, we would like to extend an interview invitation so that we can further discuss the job opportunity you applied.
				<br><br>
				We look forward to hearing from you.
				<br><br>
				Sincerely Yours,
				<br>
				<strong>24/7 Global Nursing Solution & Consulting Services LLC</strong>
			</div>
			<a href="{{route('activation', $user['token'])}}" class="actvt">Activate your account</a>
		</div>
    </body>
</html>