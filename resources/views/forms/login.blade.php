<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		#frmLgn{
			width: 400px;
			margin: 40px auto;
		}
		#frmLgn .inptgrp{
			margin-bottom: 20px; clear: both;
		}
	</style>
</head>
<body>

	<form id="frmLgn" action="{ route('login') }" method="POST">
		{{ csrf_field() }}
		<div class="inptgrp">
			<label>Email</label>
			<input type="text">
		</div>
		<div class="inptgrp">
			<label>Password</label>
			<input type="password">
		</div>
		<button type="submit">Login</button>
	</form>
</body>
</html>