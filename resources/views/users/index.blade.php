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
<div id="wrapper">
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
    <div class="picture">
      <div class="pctrname">
        <div class="ttl">
            <h3>
              @if (Auth::user())
                {{ Auth::user()->email }}
              @endif
            </h3>
            <div class="btmbrdr"><hr></div>
        </div>
      </div>
      <div class="dp">
        <div data-toggle="dropdown">
          <i class="fa fa-user-circle-o"></i>
        </div>
        <div class="dropdown-menu">
          <div class="arrow"></div>
          <div class="popover-body">
            <ul>
              <li>
                <a href="{{route('usr_profile')}}">Edit Profile</a>
              </li>
              <li>
                <a href="{{route('usr_logout')}}">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="content" ng-app="usrContent">
    @yield('content')
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