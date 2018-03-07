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
<div id="wrapper" ng-controller="ctrlApp">
  <div class="hdr">
    <a href="/" class="logo">
      <div class="cmpnylogo">
        <img src="{{ URL::asset('img/mmilogo.png') }}" alt="">
      </div>
    </a>
  </div>
  <div class="content" ng-app="usrContent">
    @yield('content')
  </div>
  <div class="footer">
    <div class="row no-gutters">
      <div class="col-lg-4">
        <div class="ftrbx">
          <h3>Multinational Maritime, Inc.</h3>
          <ul>
            <li>
              <i class="fa fa-envelope" style="font-size: 16px;"></i>
              <a href="mailto:support@247globalnursingsolution.com">support@mmimaritime.com</a>
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
               Metro Manila
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
      <div class="col-lg-4">
        <div class="ftrbx tp">
          <h3>PARTNERS</h3>
          <ul>
            <li>
              <a href="#">Partner1</a>
            </li>
            <li>
              <a href="#">Partner2</a>
            </li>
            <li>
              <a href="#">Partner3</a>
            </li>
            <li>
              <a href="#">Partner4</a>
            </li>
            <li>
              <a href="#">Partner5</a>
            </li>
            <li></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="ftrbx tp">
          <h3>SPONSORS</h3>
          <ul>
            <li>
              <a href="#">Sponsor1</a>
            </li>
            <li>
              <a href="#">Sponsor2</a>
            </li>
            <li>
              <a href="#">Sponsor3</a>
            </li>
            <li>
              <a href="#">Sponsor4</a>
            </li>
            <li>
              <a href="#">Sponsor5</a>
            </li>
            <li></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="ftr">
    <p>Multinational Maritime, Inc. © 2018. All Rights Reserved</p>
  </div>
</div>
<div class="modal msgmdl" id="new_activated_user">
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
            You're first login in this website.
          </p>
        </div>
      </div>
    </div>
  </div>
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