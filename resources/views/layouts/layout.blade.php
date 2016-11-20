<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- jQuery-->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" charset="utf-8"></script>
    <!--MaterializeCSS Script-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
		<!--MaterializeCSS CSS-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <!-- AnimateCSS animations-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.0/animate.min.css">

		@section('header')
		@show
    <!--Local CSS-->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <!--Local Script-->
    <script src="js/index.js"></script>
    <title> @yield('title')</title>
  </head>
  <body>

		<!-- Navigation Bar -->
		<header>
	    <nav>
	      <div class="nav-wrapper">
					<!-- Logo -->
					<a href="#" class="brand-logo"> VidStream</a>
					<!-- Nav bar Links -->
	        <ul id="nav-mobile" class="right hide-on-med-and-down">
	          <li class="{{ Request::is('content') ? 'active' : '' }}">
							<a href="{{ url('/content') }}">Content</a>
						</li>
	          <li class="{{ Request::is('login') ? 'active' : '' }}">
							<a href="{{ url('/login') }}">Login</a>
						</li>
	          <li class="{{ Request::is('register') ? 'active' : '' }}">
							<a href="{{ url('/register') }}">Registration</a>
	          </li>
	        </ul>
	      </div>

	    </nav>
		</header>
		<main>
			@section('content')
			@show
		</main>

		<footer class="page-footer">
			<div class="container">
				<div class="row">
					<div class="col l6 s12">
						<h5 class="white-text">Vidstream</h5>
						<p class="grey-text text-lighten-4">Say goodbye to cable tv, watch when you can, watch when you want.</p>
						<p class="grey-text text-lighten-4">
							Design idea taken from <a href="https://dribbble.com/shots/2786747-Shot">Ricardo Salazar</a>
						</p>
					</div>
					<div class="col l4 offset-l2 s12">
						<h5 class="white-text">Links</h5>
						<ul>
							<li><a class="grey-text text-lighten-3" href="#!">Content</a></li>
							<li><a class="grey-text text-lighten-3" href="#!">Login</a></li>
							<li><a class="grey-text text-lighten-3" href="/register">Registration</a></li>
							<li><a class="grey-text text-lighten-3" href="/pricing">Pricing</a></li>
							<li><a class="grey-text text-lighten-3" href="#!">About Us</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<div class="container">
				© 2014 Copyright Text
				<a class="grey-text text-lighten-4 right" href="#!">More Links</a>
				</div>
			</div>
		</footer>
  </body>
</html>
