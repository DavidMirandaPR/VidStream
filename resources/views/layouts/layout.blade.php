<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- External Scripts-->
    <!-- jQuery-->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" charset="utf-8"></script>
    <!--MaterializeCSS Script-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <!--Font Awesome CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!--MaterializeCSS CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <!-- AnimateCSS animations-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.0/animate.min.css">
    <!-- Fontawesome for icons-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!--Local CSS-->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <!--Local Script-->
    <script src="js/index.js"></script>
    <title>@yield('title')</title>
  </head>
  <body>
    <nav>
      <div class="nav-wrapper"><a href="#" class="brand-logo">VidStream</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="#">Content</a></li>
          <li><a href="#">Login</a></li>
          <li>
            a(href="#") Registration
            
          </li>
        </ul>
      </div>
    </nav>@section('content')
    @show
  </body>
</html>