<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form action="{{ route('user.update',[$data_users->id]) }}" method="post">
		{{csrf_field()}}
		{{method_field('PUT')}}
		<label>Name</label>
		<input type="text" name="name" value="{{ $data_users->name }}">
		<label>Email</label>
		<input type="email" name="email" value="{{ $data_users->email }}">

		<button type="submit">Update User</button>
	</form>
</body>
</html>