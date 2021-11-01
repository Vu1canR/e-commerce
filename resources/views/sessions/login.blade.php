<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		div{
			padding: 20px;
			width: 390px;
			box-sizing: border-box;
			margin:0 auto;
			border:1px solid slategrey;
			border-radius: 5px;
			margin-top: 20px;
		}

		input[type=text]{
			width: 100%;
			margin: 10px 0;
			box-sizing: border-box;
			
			border-radius: 5px;
			border: none;
			box-shadow: 2px 2px rgba(120, 120, 120, 1);
			outline: none;
			padding: 10px 10px;
			border:1px solid slategrey;
		}

		button {
			background-color: #009800a3;
			outline: none;
			border: none;
			padding: 8px;
			width: 100%;
			cursor: pointer;
			border-radius: 5px;
			box-shadow: 2px 2px rgba(120, 120, 120, 1);
		}

		button:hover{
			color: white;
			background-color: #009800;
		}

	</style>
</head>
<body>
	<div>
		<form method="POST" action="/login">
			{{csrf_field()}}
			
			<label for="email"><strong>Email</strong></label>
			<input type="text" name="email" id="email" autocomplete="on">
			<label for="password"><strong>Password</strong></label>
			<input type="text" name="password" id="password" placeholder="At least 6 characters" autocomplete="off">

			<button type="sumbit">Login</button>

		</form>	
		@if (count($errors))
			@foreach ($errors->all() as $error)
			<h1>{{ $error }}</h1>
			@endforeach
		@endif
	</div>	

</body>
</html>