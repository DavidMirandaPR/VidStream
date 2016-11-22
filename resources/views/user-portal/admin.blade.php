@extends('layouts.layout')
@section('title', 'Login')
@section('header')

@endsection
@section('content')

<div>
	<table align="center" cellspacing="0" cellpadding="0" border="0" style="width:100%">

	<tr style='background-color: #FF424F';>
	    <th style='color: #ffffff';>User ID</th>
	    <th style='color: #ffffff';>Firstname</th>
	    <th style='color: #ffffff';>Lastname</th>
	    <th style='color: #ffffff';>email</th>
	    <th style='color: #ffffff';>password</th>
	    <th style='color: #ffffff';>level</th>
	    <th style='color: #ffffff';>Payment ID</th>
	</tr>
		<!--/////////////////////////////////////////////////////////////////////////
				USERS TABLE
			/////////////////////////////////////////////////////////////////////////-->
		@foreach ($users as $u)
		<tr style="background-color: white" align="center">
			<td style="border-bottom: 10px">{{$u->id}}</td>
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
