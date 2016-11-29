<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<!--Import Google Icon Font-->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- jQuery-->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" charset="utf-8"></script>
		<!--MaterializeCSS CSS-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <!--MaterializeCSS Script-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <!-- AnimateCSS animations-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.0/animate.min.css">

		@section('header')
		@show
    <!--Local CSS-->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <!--Local Script-->
    <script src="/js/index.js"></script>
    <title> @yield('title')</title>
  </head>
  <body class="body-color">

		<!-- Page specific script -->
		@section('script')
		@show
		<!-- Dropdown Structure -->
		@section('dropdown-structure')
		@show
		<!-- Navigation Bar -->
		<header class="z-depth-3">
	    <nav>
	      <div class="nav-wrapper">
					<!-- Logo -->
					<a href="/content" class="brand-logo"> VidStream</a>
					<!-- Collapsible Menu Icon -->
					<a href="#" data-activates="mobile-collapse" class="button-collapse">
						<i class="material-icons">menu</i>
					</a>
			
					<!-- Nav bar Links non collapsed-->
					@if(Request::is('content') || Request::is('profile'))
						@section('usertab')
						@show
					@else


					@if(Request::is('login') || Request::is('register'))

		        <ul id="nav-mobile" class="right hide-on-med-and-down">
		          <li>
								<a href="{{ url('/content') }}">Content</a>
							</li>
		          <li class="{{ Request::is('login') ? 'active' : '' }}">
								<a href="{{ url('/login') }}">Login</a>
							</li>
		          <li class="{{ Request::is('register') ? 'active' : '' }}">
								<a href="{{ url('/register') }}">Registration</a>
		          </li>
		        </ul>
						<!-- Collapesed Menu Links -->
						<ul class="side-nav" id="mobile-collapse">
							<li><a href="/content">Content</a></li>
							<li><a href="/login">Login</a></li>
							<li><a href="/register">Register</a></li>
						</ul>
					@else
						@section('usertab')
						@show
					@endif
	      </div>

	    </nav>

		</header>
			@section('content')
			@show

  </body>
</html>
