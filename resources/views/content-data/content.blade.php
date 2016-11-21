@extends('layouts.layout')
@section('title', 'Content')
@section('content')

<main>

	<div class="">
		ACTION

		<div>
			@foreach($Action as $a)
					<img src="{{$a->poster}}" width="100px" height="100px" alt="{{$a->title}}"/>	
			@endforeach			
		</div>
		COMEDY

		<div>
			@foreach($Comedy as $c)
					<img src="{{$c->poster}}" width="100px" height="100px" alt="{{$c->title}}"/>	
			@endforeach	
		</div>
		HORROR
		<div>

			@foreach($Horror as $h)
					<img src="{{$h->poster}}" width="100px" height="100px" alt="{{$h->title}}"/>	
			@endforeach	
		</div>
	</div>
</main>



@endsection
