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
		@foreach($data['genres'] as $genre)
			<h4 class="carousel-title">{{ $genre }}</h4>
			<div class="movies-grid">
				@foreach($data[$genre] as $item)
					<span class="col s6">
						<img src="{{ $item->poster }}" width="200px" height="150px" alt="{{ $item->title }}">
					</span>
				@endforeach
			</div>
		@endforeach
	</main>
@endsection
