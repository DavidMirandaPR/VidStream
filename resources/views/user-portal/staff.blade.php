@extends('layouts.layout')
@section('title', 'Staff')
@section('header')
<meta name="csrf-token" content="{!! Session::token() !!}">
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
@endsection
