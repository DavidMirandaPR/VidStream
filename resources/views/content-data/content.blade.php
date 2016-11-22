@extends('layouts.layout')
@section('title', 'Content')
@section('content')

<main>
	<h4 class="carousel-title">My History</h4>
	<div class="movies-grid">
			<span class="col s6">
				<img src="http://placehold.it/200x150" alt="Placeholder"/>
			</span>
			<span class="col s6">
				<img src="http://placehold.it/200x150" alt="Placeholder"/>
			</span>
			<span class="col s6">
				<img src="http://placehold.it/200x150" alt="Placeholder"/>
			</span>
			<span class="col s6">
				<img src="http://placehold.it/200x150" alt="Placeholder"/>
			</span>
			<span class="col s6">
				<img src="http://placehold.it/200x150" alt="Placeholder"/>
			</span>
			<span class="col s6">
				<img src="http://placehold.it/200x150" alt="Placeholder"/>
			</span>
	</div>
	<h4 class="carousel-title">My List</h4>
	<div class="movies-grid">
			<span class="col s6">
				<img src="http://placehold.it/200x150" alt="Placeholder"/>
			</span>
			<span class="col s6">
				<img src="http://placehold.it/200x150" alt="Placeholder"/>
			</span>
			<span class="col s6">
				<img src="http://placehold.it/200x150" alt="Placeholder"/>
			</span>
			<span class="col s6">
				<img src="http://placehold.it/200x150" alt="Placeholder"/>
			</span>
			<span class="col s6">
				<img src="http://placehold.it/200x150" alt="Placeholder"/>
			</span>
			<span class="col s6">
				<img src="http://placehold.it/200x150" alt="Placeholder"/>
			</span>
	</div>
	<h4 class="carousel-title">Action</h4>
	<div class="movies-grid">
		@foreach($Action as $a)
				<span class="col s6">
					<img src="{{$a->poster}}" width="200px" height="150px" alt="{{$a->title}}"/>
				</span>
		@endforeach
	</div>

	<h4 class="carousel-title">Comedy</h4>
	<div class="movies-grid">
		@foreach($Comedy as $c)
				<span class="col s6">
					<img src="{{$c->poster}}" width="200px" height="150px" alt="{{$c->title}}"/>
				</span>
		@endforeach
	</div>

	<h4 class="carousel-title">Horror</h4>
	<div class="movies-grid">
		@foreach($Horror as $h)
				<span class="col s6">
					<img src="{{$h->poster}}" width="200px" height="150px" alt="{{$h->title}}"/>
				</span>
		@endforeach
	</div>
</main>

@endsection
