@extends('layouts.layout')
@section('title', 'Content')
@section('dropdown-structure')
	<ul id="dropdown" class="dropdown-content">
		<li><a href="{{ url('profile') }}">Profile</a></li>
		<li class="divider"></li>
		<li><a href="#">Switch User</a></li>
		<li class="divider"></li>
		<li><a href="{{ url('logout') }}">Logout</a></li>
	</ul>
@endsection
@section('usertab')
	<ul id="nav-mobile" class="right hide-on-med-and-down">
		<li>
			<a class="dropdown-button" href="#!" data-activates="dropdown">{{Session::get('session_username')}}<i class="material-icons right">arrow_drop_down</i></a>
		</li>
	</ul>
@endsection
@section('content')



	@if(array_key_exists("available", $data))
		<h1>There isn't genres in your account, please go to profile and add a genre.</h1>
	@else
		<form action="/search" method="POST">
			<div>
				<input type="text" name="movieTitle">
			</div>
			<input type="submit" name="action" value="Search">
			<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
		</form>
		<?php
			$genre_titles = array_keys($data);
		?>

		@foreach($genre_titles as $genre)
			<div class="">

			</div>
			<div class="section">
				<h4 class="flow-text white-text">{{ $genre }}</h4>
				<div class="divider"></div>
				<div class="movies-grid">
					@foreach($data[$genre] as $item)
						<span>
							<a href="http://vidstream.tv/content/movie?imdbID={{$item->imdbID}}"><img width="200px" height="150px" src="{{ $item->poster }}"></a>
						</span>
					@endforeach
			</div>
			</div>

		@endforeach
	@endif
@endsection
