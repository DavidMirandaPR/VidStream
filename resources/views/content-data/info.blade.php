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
	<main>
	@if(Session::has('message'))
		<p class="alert {{ Session::get('alert-info') }}">{{ Session::get('message') }}</p>
		<a href="#"><input type="button" name="" value="Click Here to get Premium"></a>
	@endif
	<div>
	<ul style="background-color: white;">
	    <li>TITLE:		 {{ $movie->title 	   }}</li>
	    <li>YEAR: 		 {{ $movie->year 	   }}</li>
	    <li>RATED:       {{ $movie->rated      }}</li>
	    <li>RELEASED:    {{ $movie->released   }}</li>
	    <li>RUNTIME:     {{ $movie->runtime    }}</li>
	    <li>GENRE:       {{ $movie->genre 	   }}</li>
	    <li>DIRECTOR:    {{ $movie->director   }}</li>
	    <li>WRITER:      {{ $movie->writer     }}</li>
	    <li>ACTORS:      {{ $movie->actors     }}</li>
	    <li>PLOT:        {{ $movie->plot 	   }}</li>
	    <li>LANGUAGE:    {{ $movie->language   }}</li>
	    <li>AWARDS:      {{ $movie->awards     }}</li>
	    <li>IMDB RATING: {{ $movie->imdbRating }}</li>
	    <li>TYPE: 		 {{ $movie->type 	   }}</li>
	</ul>
	<img src="{{ $movie->poster }}" width="200px" height="150px" alt="{{ $movie->title }}"></a>
	</div>

	<form action="/viewMovie" method="POST">
		<input type="submit" name="viewMovie" value="VIEW {{$movie->title}}">
		<input type="hidden" name="imdbID" value="{{$movie->imdbID}}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
	</form>
	

	</main>
@endsection
