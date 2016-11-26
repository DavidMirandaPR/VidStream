@extends('layouts.layout')
@section('title', 'Login')
@section('header')

@endsection
@section('content')

<div>
	<table class="usr_table">

	<tr class="table_heading">
	    <th>User ID</th>
	    <th>Firstname</th>
	    <th>Lastname</th>
	    <th>email</th>
	    <th>password</th>
	    <th>level</th>
	    <th>Payment ID</th>
	</tr>
		<!--/////////////////////////////////////////////////////////////////////////
				USERS table 	I CAN MANAGE THE WHOLE ACCOUNTS TABLE
			/////////////////////////////////////////////////////////////////////////-->
	@foreach ($users as $u)
	<tr class="users_rows">
		<td>{{$u->id}}</td>
		<td>{{$u->firstName}}</td>
		<td>{{$u->lastName}}</td>
		<td>{{$u->email}}</td>
		<td>{{$u->password}}</td>
		<td>{{$u->level}}</td>
		<td>{{$u->Payment_ID}}</td>		
	</tr>
	@endforeach
	</table>
</div>


@endsection
