@extends('layouts.layout')
@section('title', 'Registration')
@section('header')
<!--Vegas CSS-->
<link rel="stylesheet" href="/js/vegas/vegas.min.css">
<!--Vegas Script-->
<script src="/js/vegas/vegas.min.js"></script>
<!--Background Script-->
<script src="js/background.js"></script>
@endsection
@section('content')

<main>
	<!--Register Form -->
	<div class="portal-page z-depth-2">
		<div class="container">
			<div class="row">
				<form class="col s12" action="/register" method="POST">
						<div class="row">
							<div class="input-field col s6">
								<input type="text" name="firstName" value="">
								<label for="firstName">First Name</label>
							</div>
							<div class="input-field col s6">
								<input type="text" name="lastName" value="">
								<label for="lastName">Last Name</label>
							</div>
							<div class="input-field col s12">
								<input type="email" name="email" value="">
								<label for="email">Email</label>
							</div>
							<div class="input-field col s12">
								<input type="text" name="username" value="">
								<label for="username">Username</label>
							</div>
							<div class="input-field col s12">
								<input type="password" name="password" value="">
								<label for="password">Password</label>
							</div>
							<div class="input-field col s12">
								<select name="level">
									<option value="" disabled selected>Choose Level</option>
									<option value="1">Free</option>
									<option value="2">Subscription</option>
								</select>
								<label>User Level</label>
							</div>
							<button class="btn submit-btn" type="submit" name="action">Register</button>
						</div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
				</form>
			</div>
		</div>
	</div>
</main>

@endsection
