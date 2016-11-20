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
		<input type="hidden" name="Title" value="">
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
</body>
</html>


