@extends('layouts.layout')
@section('title', 'Registration')
@section('content')

<!--Register Form -->

<div class="container">
	<div class="row">
		<form class="col s12" action="/register" method="POST">
				<div class="row">
					<div class="input-field col s6">
						<input type="text" name="firstName" value="">
						<label for="firstName">First name</label>
					</div>
					<div class="input-field col s6">
						<input type="text" name="lastName" value="">
						<label for="lastname">Last Name</label>
					</div>
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



@endsection
