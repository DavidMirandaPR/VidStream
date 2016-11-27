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

<main>
	<div class="portal-page z-depth-2">
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
							<button class="btn submit-btn" type="submit" name="action">Login</button>
						</div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
				</form>
			</div>
		</div>
	</div>
</main>
@endsection
