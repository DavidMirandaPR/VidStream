@extends('layouts.layout')
@section('title', 'Movie Info')

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
				<a href="{{ url('/content') }}">Content</a>
		</li>
		<li>
			<a class="dropdown-button" href="#!" data-activates="dropdown">{{Session::get('session_username')}}<i class="material-icons right">arrow_drop_down</i></a>
		</li>
	</ul>
@endsection
@section('content')
	<main>
		@if(Session::has('message'))
			<p class="alert {{ Session::get('alert-info') }}">{{ Session::get('message') }}</p>
			<a href="#"><input type="button" name="" value="Click Here to get Premium"></a>
		@endif
		<div class="movie-info">
			<div class="movie-img">
				<img src="{{ $movie->poster }}" width="200px" height="250px" alt="{{ $movie->title }}">
			</div>

			<div class="movie-text">
				<h4>{{ $movie->title }} ({{ $movie->year }})</h4>
				<h6>Rated {{ $movie->rated }}</h6>
				<h6>Release date: {{ $movie->release }}</h6>
				<h6>Runtime: {{ $movie->runtime }}</h6>
				<h6>Genre: {{ $movie->genre }}</h6>
				<h6>Director: {{ $movie->director }}</h6>
				<h6>Writers: {{ $movie->writer }}</h6>
				<h6>Actors: {{ $movie->actors }}</h6>
				<h6>Plot: {{ $movie->plot }}</h6>
				<h6>Language: {{ $movie->language }}</h6>
				<h6>Awards: {{ $movie->awards }}</h6>
				<h6>IMDB Rating: {{ $movie->imdbRating }}</h6>
				<h6>Type: {{ $movie->type }}</h6>
			</div>

			<form action="/viewMovie" method="POST">
				<input type="submit" name="viewMovie" value="VIEW {{$movie->title}}">
				<input type="hidden" name="imdbID" value="{{$movie->imdbID}}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
			</form>
		</div>
	</main>
@endsection
