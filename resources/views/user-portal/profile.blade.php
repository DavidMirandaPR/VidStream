@extends('layouts.layout')
@section('title', 'Profile')

@section('script')
	<script>
		$('.body-color').css("background-color", "#EEEEEE");
	</script>
@endsection
@section('dropdown-structure')
	<ul id="dropdown" class="dropdown-content">
		<li><a href="{{ url('profile') }}">Profile</a></li>
		<li class="divider"></li>
		<li><a href="#">Switch User</a></li>
		<li class="divider"></li>
		<li><a href="#">Logout</a></li>
	</ul>
@endsection
@section('usertab')
	<ul id="nav-mobile" class="right hide-on-med-and-down">
		<li>
			<a href="{{ url('content') }}">Content</a>
		</li>
		<li>
			<a class="dropdown-button" href="#!" data-activates="dropdown">{{Session::get('session_username')}}<i class="material-icons right">arrow_drop_down</i></a>
		</li>
	</ul>
@endsection

@section('content')
<main>
	<br/>
	<div class="row">
		<div class="col s12">
			<ul class="tabs">
				<li class="tab col s4"><a href="#account">Account</a></li>
				<li class="tab col s4"><a class="active" href="#username">Users</a></li>
				<li class="tab col s4"><a href="#movies">Movies</a></li>
			</ul>
		</div>
		<div id="account" class="col s12">
			Account Settings
		</div>
		<div id="username" class="col s12">
			User Settings
		</div>
		<div id="movies" class="col s12">
			Movie Settings
		</div>
	</div>
</main>
@endsection
