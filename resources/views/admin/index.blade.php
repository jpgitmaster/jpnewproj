<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

@if (isset($stylesheet))
  @foreach($stylesheet as $css)
<link rel="stylesheet" type="text/css" href="{{ URL::asset($css) }}">
  @endforeach
@endif
</head>
<body>
<div id="wrapper">
  <div class="admnbx logo">
    <!-- <h1>Logo</h1> -->
  </div>
  <div class="admnbx search">
    <div id="search_data" class="btn-group">
      <div class="input-group">
        <button type="button" class="input-group-addon">Search</button>
        <input type="text" class="form-control" placeholder="Keyword...">
        <button type="button" class="input-group-addon dropdown-toggle" data-toggle="dropdown">
          All &nbsp;
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Users</a>
          <a class="dropdown-item" href="#">Jobs</a>
        </div>
      </div>
    </div>
  </div>
  <div class="admnbx picture">
    {{ Auth::user()->email }}
    <div class="dp">
      <div data-toggle="dropdown">
        <i class="fa fa-user-circle-o"></i>
      </div>
      <div class="dropdown-menu">
        <div class="arrow"></div>
        <div class="popover-body">
          <a href="{{route('admn_logout')}}">
            LOGOUT
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="admnbx navi">
    <ul>
      <li></li>
      <li>
        <a href="{{route('admn_dashboard')}}">
          <span class="lbl">Dashboard</span>
          <span class="icn"><i class="fa fa-desktop"></i></span>
        </a>
      </li>
      <li>
        <a href="{{route('admn_users')}}">
          <span class="lbl">Users</span>
          <span class="icn"><i class="fa fa-users"></i></span>
        </a>
      </li>
      <li>
        <a href="{{route('admn_jobs')}}">
          <span class="lbl">Jobs</span>
          <span class="icn"><i class="fa fa-briefcase"></i></span>
        </a>
      </li>
      <li></li>
    </ul>
  </div>
  <div class="admnbx content">
    @yield('content')
  </div>
</div>

  <!-- JS -->
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