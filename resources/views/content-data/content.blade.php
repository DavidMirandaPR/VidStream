@extends('layouts.layout')
@section('title', 'Content')
@section('content')


<h1>Test!</h1>
<div>
<h4>ACTION</h4>
	@foreach ($action as $a)
            <img src="{{$a->poster}}" width="100px" height="100px" alt="{{$a->title}}"/>     
    @endforeach	
</div>

<div>
<h4>COMEDY</h4>	
	@foreach ($comedy as $c)
            <img src="{{$c->poster}}" width="100px" height="100px" alt="{{$c->title}}"/>     
    @endforeach	
</div>

<div>
<h4>HORROR</h4>
	@foreach ($horror as $h)
            <img src="{{$h->poster}}" width="100px" height="100px" alt="{{$h->title}}"/>     
    @endforeach	
</div>

@endsection
