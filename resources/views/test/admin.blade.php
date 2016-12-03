@extends('layouts.layout')
@section('title', 'Admin')
@section('header')
TEST WEBSITE
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
	<div class="container">
		<ul class="collection with-header">
			<li class="collection-header"><h4>Support Tickets</h4></li>
			@foreach($supportTickets as $TK)
				<li class="collection-item">
					<div>{{ $TK->message }}<a href="#!" class="secondary-content">
						<i onClick="ticketHandler('{{ $TK->id }}')" class="material-icons">send</i></a>
						@if($TK->handled == 0)
							<div class="red-circle"></div></a>
						@else
							<div class="green-circle"></div></a>
						@endif
					</div>
				</li>
			@endforeach
		</ul>
	</div>
<div class="display">
	<table id="accTable">

		<thead>
			<tr>
			    <th>ID</th>
			    <th>Title</th>
			    <th>Rating</th>
			    <th>Actors</th>
			    <th>Year</th>
			    <th>Rated</th>
			    <th>Genre</th>
				<th>Delete</th>
			</tr>
		</thead>
		<!--////////////////////////////////////////////////////////////////////////
				ACCOUNTS table 	I CAN MANAGE THE WHOLE ACCOUNTS TABLE
		/////////////////////////////////////////////////////////////////////////-->
	@foreach ($movies as $movie)
	<tbody>
		<td id="mID">{{$movie->imdbID}}</td>
		<td>{{$movie->title}}</td>
		<td>{{$movie->imdbRating}}</td>
		<td>{{$movie->actors}}</td>
		<td>{{$movie->year}}</td>
		<td>{{$movie->rated}}</td>
		<td>{{$movie->genre}}</td>
		<td>
			<a href="#" class="">
				<i onClick="" class="material-icons">close</i>
			</a>
		</td>
	</tbody>
	@endforeach
	</table>
</div>


@endsection
