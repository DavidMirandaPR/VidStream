@extends('layouts.layout')
@section('title', 'Login')
@section('header')

@endsection
@section('content')

<div>
	@foreach($supportTickets as $ST)
		<p>{{ $ST->message }}</p>
	@endforeach
</div>


@endsection
