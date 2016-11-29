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

		@foreach($movies as $m)
			<span class="col s6">
				<a href="http://vidstream.tv/content/movie?imdbID={{$m->imdbID}}"><img src="{{ $m->poster }}" width="200px" height="150px" alt="{{ $m->title }}"></a>
			</span>
		@endforeach

	</main>
@endsection
