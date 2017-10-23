<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="{{ URL::asset('public/img/logo.png') }}" />
  
    <link rel="shortcut icon" href="{{ URL::asset('img/logo.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('img/logo.png') }}">
    <title>24/7 Global Nursing Solution & Consulting Services LLC</title>

    <!-- Bootstrap v4s -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    
    <!-- Global CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app/global.css') }}">
    <style>
    .nm_wrpr {
        width: 650px;
        margin: 40px auto 0;
    }
    .nm_wrpr .getlogo{width: 520px; padding: 20px 0 0; overflow: hidden; min-height: 110px; margin: 0 auto;}
    .nm_wrpr .getlogo .navbar-brand {
        padding: 18px 5px 0;
        color: #0077bf;
        font: 32px segobl;
        line-height: 16px;
        height: auto; position: relative;
    }
    .nm_wrpr .getlogo .navbar-brand img {
        width: 90px;
        float: left;
        margin: -20px 10px 0 0;
    }
    .nm_wrpr .getlogo .navbar-brand span {
        color: #6dc5e6;
        font: 32px segobl;
    }
    .nm_wrpr .gtmsg{text-align: center;  color: #dadada; margin-top: -80px;}
    .nm_wrpr .gtmsg h1{font: 300px segobl; margin: 0;}
    .nm_wrpr .gtmsg p{font: 80px segobl; margin-top: -60px;}
    </style>
</head>
<body>
<div id="wrapper">
  	<div class="nm_wrpr">
      <div class="getlogo">
        <a class="navbar-brand" href="/">
          <img src="{{ URL::asset('img/logo.png') }}" alt="Logo" class="logo">
          Global Nursing Solution &
          <br /><span>Consulting Services LLC</span>
        </a>
      </div>
      <div class="gtmsg">
        <h1>404</h1>
        <p>Page not found</p>
      </div>
    </div>
</div>

<!-- jQuery v3.2.0 -->
<script src="{{ URL::asset('plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ URL::asset('plugins/popperjs/popper.min.js') }}"></script>

<!-- Bootstrap v3.3.7 -->
<script src="{{ URL::asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>
</html>
