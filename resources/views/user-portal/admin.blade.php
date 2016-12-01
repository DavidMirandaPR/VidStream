@extends('layouts.layout')
@section('title', 'Admin')
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
<div class="container">
	<table id="users">

	<tr id="usr_T">
	    <th>User ID</th>
	    <th>Firstname</th>
	    <th>Lastname</th>
	    <th>email</th>
	    <th>password</th>
	    <th>level</th>
	    <th>Payment ID</th>
			<th>Delete Account</th>
	</tr>
		<!--////////////////////////////////////////////////////////////////////////
				ACCOUNTS table 	I CAN MANAGE THE WHOLE ACCOUNTS TABLE
		/////////////////////////////////////////////////////////////////////////-->
	@foreach ($accounts as $acc)
	<tr id="users_rows">
		<td>{{$acc->id}}</td>
		<td>{{$acc->firstName}}</td>
		<td>{{$acc->lastName}}</td>
		<td>{{$acc->email}}</td>
		<td>{{$acc->password}}</td>
		<td>{{$acc->level}}</td>
		<td>{{$acc->Payment_ID}}</td>
		<td>
			<a href="#" class="">
				<i onClick="deleteAcc('{{ $acc->id }}')" class="material-icons">close</i>
			</a>
		</td>
	</tr>
	@endforeach
	</table>
</div>


@endsection
