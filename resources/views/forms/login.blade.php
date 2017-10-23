<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
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