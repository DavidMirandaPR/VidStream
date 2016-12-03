@extends('layouts.layout')
@section('title', 'Profile')
@section('header')
<meta name="csrf-token" content="{!! Session::token() !!}">
@endsection

@section('dropdown-structure')
	<ul id="dropdown" class="dropdown-content">
		<li><a href="{{ url('profile') }}">Profile</a></li>
		<li class="divider"></li>
		<li><a href="{{ url('usernames') }}">Switch User</a></li>
		<li class="divider"></li>
		<li><a href="{{ url('logout') }}">Logout</a></li>
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
<!-- Account Tab -->
			<div id="account" class="col s12">
				<h4 class="flow-text white-text">{{ Session::get('session_username') }}</h4>
				<div class="container">
					<div class="row">
						<form class="col s12" action="/edit" method="POST">
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
									<button class="btn submit-btn" type="submit" name="action">Update Info</button>
								</div>
							<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
						</form>
					</div>
				</div>
			</div>
<!-- Username Tab -->
			<div id="username" class="col s12">
<!-- Add User Container -->
				<div class="container">
				@if(Session::has('message'))
				<p class="alert {{ Session::get('alert-info') }}">{{ Session::get('message') }}</p>
				@endif
				<ul class="collection with-header">
					<li class="collection-header">
						<h4>Current Username: {{ Session::get('session_username') }}</h4>
						<p>Hint: To delete current username, switch user.</p>
						<p>Warning: Deleting a username will delete all of it's data.</p>
					</li>
					@foreach($usernames as $user)
						<li class="collection-item">
							<div>
<!-- EDIT USERNAME -->
								{{ $user->username }}
								<a href="#!" class="secondary-content">
									<i onClick="editUser('{{ $user->username }}', '{{ $user->id }}')" class="material-icons edit-btn">send</i>
<!-- DELETE USERNAME -->
									@if($user->username != Session::get('session_username'))
									<i onClick="deleteUser('{{ $user->id }}')" class="material-icons close-btn">close</i>
									@endif
								</a>
							</div>
						</li>
					@endforeach
				</ul>
<!-- ADD USER FORM -->
				<div class="container">
					<div class="row">
						<form class="col s12" action="/adduser" method="POST">
								<div class="row">
									<div class="input-field col s12">
										<input type="text" name="addUser" value="">
										<label for="addUser">Add User</label>
									</div>
									<button class="btn submit-btn" type="submit" name="action">Add User</button>
								</div>
							<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
						</form>
<!-- SUPPORT TICKET FORM -->
						<form class="col s12" action="/support" method="POST">
								<div class="row">
									<div class="input-field col s6">
										<input type="text" name="msg" value="">
										<label for="msg">Write your complain here!</label>
									</div>
								</div>
								<button class="btn submit-btn" type="submit" name="action">Submit Ticket</button>
							<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
						</form>
					</div>
				</div>
			</div>
		</div>
<!-- Movies Tab -->
			<div id="movies" class="col s12">
<!-- Movies Container -->
				<div class="container">
					@if(Session::has('message'))
					<p class="alert {{ Session::get('alert-info') }}">{{ Session::get('message') }}</p>
					@endif
					<ul class="collection with-header">
						<li class="collection-header">
							<h4>Genres for: {{ Session::get('session_username') }}</h4>
						</li>
						@foreach($genrePref as $gP)
							<li class="collection-item">
								<div>
									{{ $gP->genre }}<a href="#" class="secondary-content">
										<i onClick="deleteGenre('{{ $gP->genre }}')" class="material-icons close-btn">close</i>
									</a>
								</div>
							</li>
						@endforeach
					</ul>
<!-- Add Genres USER FORM -->
					<div class="container">
						<div class="row">
							<form class="col s12" action="/addGenre" method="POST">
									<div class="row">
										<div class="input-field col s12">
											<select name="addGenre">
										      <option value="" disabled selected>Choose genre to add</option>
										      @foreach($genres as $g)
										      <option value="{{ $g->type }}">{{ $g->type }}</option>
										      @endforeach
									    	</select>
									    <label>Genres</label>
										</div>
										<button class="btn submit-btn" type="submit" name="action">Add Genre</button>
									</div>
								<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
@endsection
