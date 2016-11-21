<!DOCTYPE html>
<html>
<head>
	<title>Movies Search</title>
</head>
<body>

<form method="POST"	action="/api/v1/getinfo">
	<div>
		First : Get the imdbID's then Get the Data
	</div>
	<div>
		<input type="text" name="Title" value="">
	</div>
	<div>
		<input type="Submit" name="getid" value="Get imbdID's">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</div>
</form>
<form method=""	action="/api/v1/getinfo/create">
	<div>
		<input type="Submit" name="getdata" value="Get the imdbID movies INFO">
	</div>
</form>
	@foreach ($movies as $movie)
			<!-- {{$movie->imdbID}} -->
            <img src="{{$movie->poster}}" width="250px" height="250px" alt="{{$movie->title}}"/>     
    @endforeach	

</body>
</html>


