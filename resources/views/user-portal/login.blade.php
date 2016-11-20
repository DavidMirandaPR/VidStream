@extends('layouts.layout')
@section('title', 'Login')
@section('header')
<!--Vegas CSS-->
<link rel="stylesheet" href="/js/vegas/vegas.min.css">
<!--Vegas Script-->
<script src="/js/vegas/vegas.min.js"></script>
<!--Background Script-->
<script src="js/background.js"></script>
@endsection
@section('content')

<div class="container">
	<div class="row">
		<form class="col s12" action="/login" method="POST">
				<div class="row">
					<div class="input-field col s12">
						<input type="email" name="email" value="">
						<label for="email">Email</label>
					</div>
					<div class="input-field col s12">
						<input type="password" name="password" value="">
						<label for="password">Password</label>
					</div>
					<button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
				</div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
			</form>
		</div>
</div>
<div class="container">
	<form class="regForm" action="/login" method="post">

	  <div class="email">
	    E-Mail
	  </div>

	  <input type="email" name="email" value="david.mirandapr@gmail.com">
	  <div class="password">
	    Password
	  </div>
	  <input type="password" name="password" value="randompassword">
	  <div class="submit">
	    <input type="submit" name="submitBtn" value="submit">
	  </div>
	  <input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
</div>

@endsection
