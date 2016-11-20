<!DOCTYPE html>
<html>
<head>
	<title>Movies Search</title>
</head>
<body>

<form method="POST"	action="/api/v1/getinfo">
<div>
	Search for a title
</div>
<div>
	<input type="Title" name="Title" value="">
</div>
<div>
	<input type="Submit" name="submit" value="Submit">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

</div>
</form>
</body>
</html>


