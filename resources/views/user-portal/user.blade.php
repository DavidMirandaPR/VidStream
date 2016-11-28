@extends('layouts.layout')
@section('title', 'Usernames')
@section('header')
<!--Vegas CSS-->
<link rel="stylesheet" href="/js/vegas/vegas.min.css">
<!--Vegas Script-->
<script src="/js/vegas/vegas.min.js"></script>
<!--Background Script-->
<script src="/js/background.js"></script>
<!-- Local Style CSS -->
<script src="/css/style.css"></script>

@endsection
@section('content')

<main>
	<div class="portal-page z-depth-2">
		<div class="container">
			<div class="row">
				<form class="col s12" action="/username" method="GET">
					<div id="squares">
					@foreach($usernames as $user)
						<div>
							<a href="http://vidstream.tv/switchUser?un={{$user->username}}"><input type="button" value="{{$user->username}}"/></a>
						</div>
					@endforeach
					<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
				</form>
			</div>
		</div>
	</div>
</main>
@endsection
