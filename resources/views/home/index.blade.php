<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Movie Review</title>
		<base href="{{asset('')}}">
		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="page/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="page/style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>


	<body>
		

		<div id="site-content">
			<header class="site-header">
				<div class="container">
					<a href="{{ route('home') }}" id="branding">
						<img src="page/images/logo.png" alt="" class="logo">
						<div class="logo-copy">
							<h1 class="site-title">meli cine</h1>
							<small class="site-description"></small>
						</div>
					</a> <!-- #branding -->

					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item current-menu-item"><a href="{{ route('home') }}">Home</a></li>
							<li class="menu-item"><a href="{{ route('join') }}">Join us</a></li>
							<li class="menu-item"><a href="{{route('contact')}}">Contact</a></li>
							<li class="menu-item"><a href="{{route('listticket')}}">New</a></li>
							@auth
							<li class="menu-item"><a href="{{ route('checkout') }}">Check out</a></li>
							<li class="menu-item"><a href="{{ route('logout') }}">Logout</a></li>
							@else
							<li class="menu-item"><a href="{{ route('register') }}">Register</a></li>
							<li class="menu-item"><a href="{{ route('login') }}">Login</a></li>
							@endauth
						</ul> <!-- .menu -->

						<form action="{{ route('search') }}" method="get" class="search-form">
							@csrf
							<input name="key" type="text" placeholder="Search...">
							<button type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>
				</div>
			</header>
			@yield('a')
			<footer class="site-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-2">
							<div class="widget">
								<h3 class="widget-title">About Us</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia tempore vitae mollitia nesciunt saepe cupiditate</p>
							</div>
						</div>
						
					</div> <!-- .row -->

				</div> <!-- .container -->

			</footer>
		</div>
		<!-- Default snippet for navigation -->
		


		<script src="page/js/jquery-1.11.1.min.js"></script>
		<script src="page/js/plugins.js"></script>
		<script src="page/js/app.js"></script>
		
	</body>

</html>