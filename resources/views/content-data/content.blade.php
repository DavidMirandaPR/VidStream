@extends('layouts.layout')
@section('title', 'Content')
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
