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
{{dd($genrePref)}}
	<main>
		<form action="/search" method="POST">
			<div>
				<input type="text" name="movieTitle">
			</div>	
			<input type="submit" name="action" value="Search">
			<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
		</form>
		@foreach($data['genres'] as $genre)
			<h4 class="carousel-title">{{ $genre }}</h4>
			<div class="movies-grid">
				@foreach($data[$genre] as $item)
						<span class="col s6">
							<a href="http://vidstream.tv/content/movie?imdbID={{$item->imdbID}}"><img src="{{ $item->poster }}" width="200px" height="150px" alt="{{ $item->title }}"></a>
						</span>
				@endforeach
			</div>
		@endforeach
	</main>
@endsection
