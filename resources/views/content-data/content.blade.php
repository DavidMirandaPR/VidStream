@extends('layouts.layout')
@section('title', 'Content')
@section('content')

<main>

	<div class="">
		<div>
			@foreach ($genres as $g)
				<h1>{{ $g }}</h1>
				@foreach ($data as $d)
					@for ($i=0; $i < 4; $i++)
						<img src="{{$d[$i]->poster}}" width="100px" height="100px" alt="{{$d[$i]->title}}"/>
					@endfor

				@endforeach

		  @endforeach
		</div>

	</div>
</main>



@endsection
