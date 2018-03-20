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
  <div class="hdr_right" ng-app="usrHeader" ng-controller="ctrlHeader">
    <div class="picture">
      <div class="pctrname">
        <div class="ttl">
            <h3 ng-if="usr[0]['email']" ng-cloak>
              <%=usr[0]['email']%>
            </h3>
            <div class="btmbrdr"><hr></div>
        </div>
      </div>
      <div class="dp">
        <div data-toggle="dropdown" class="drpdwn">
          <span ng-if="usr[0]['imgname']" ng-cloak>
            <img ng-src="{{URL::asset('avatars')}}/<%=usr[0]['imgname']%><%=currentime%>" alt="Display Picture" class="rounded-circle" ng-cloak />
          </span>
          <span ng-if="!usr[0]['imgname']" ng-cloak>
            <i class="fa fa-user-circle-o"></i>
          </span>
        </div>
        <div class="dropdown-menu">
          <div class="arrow"></div>
          <div class="popover-body">
            <ul>
              <li>
                <a href="{{route('usr_acctsttngs')}}">Account Settings</a>
              </li>
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
    <div class="row no-gutters">
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
{{-- <div class="modal fade" id="pjnModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button data-dismiss="modal" class="close btn-danger">
          <i class="fa fa-times"></i>
        </button>
        <div class="jnnw">
          <button type="button" class="btn btn-success" onclick="showSteps()">
            Join Now!
          </button>
        </div>
        <div class="imgjbfr">
          <img src="{{ URL::asset('img/jobfair.jpg') }}" alt="">
        </div>
      </div>
    </div>
  </div>
</div>
<style>
  #pjnModal .modal-dialog{
    max-width: 600px;
  }
  #pjnModal .modal-body .btn-danger{
    background-color: #f00;
    color: #FFF;
    border-radius: 50%;
    height: 30px;
    width: 30px;
    position: absolute;
    left: 20px;
    top: 10px;
    opacity: .8;
    outline: none;
    cursor: pointer;
  }
  #pjnModal .modal-body .btn-danger:hover{
    opacity: 1;
  }
  #pjnModal .modal-body .btn-danger .fa{
    top: -2px;
    position: relative;
    display: inline-block;
  }
  #pjnModal .modal-body{
    padding: 0;
    position: relative;
  }
  #pjnModal .modal-body .jnnw{
    width: 100%;
    text-align: center;
    padding: 0;
  }
  #pjnModal .modal-body .jnnw .btn-success{
    position: absolute;
    top: 80px;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 10px;
    font-size: 30px;
    padding: 10px 30px 12px;
    font-weight: bold;
    opacity: 1;
    animation: blinking 1s linear 3;
  }
  @keyframes blinking {
    from,
    49.9% {
      opacity: 0;
    }
    50%,
    to {
      opacity: 1;
    }
  }
  #pjnModal .modal-body img{
    width: 100%;
  }
</style>
<script>
  $(function(){
    $('#pjnModal').modal('show');
  });
  function showSteps(){
    $('.imgjbfr').html('<a href="{{ URL::asset('img/steps.jpg') }}" target="_blank"><img src="{{ URL::asset('img/steps.jpg') }}" alt=""></a>');
    $('#pjnModal .modal-dialog').css('max-width', '700px');
    $('#pjnModal .modal-body .jnnw .btn-success').hide();
  }
</script> --}}
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