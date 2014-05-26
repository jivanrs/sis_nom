<!-- app/views/login.blade.php -->

<!doctype html>
<html>
<head>
	<title>Login a Sistema de Nomina</title>
</head>
<body>

	{{ Form::open(array('url' => 'login')) }}
		<h1>Login</h1>

		<!-- if there are login errors, show them here -->
		<p>
			{{ $errors->first('usuario') }}
			{{ $errors->first('password') }}
		</p>

		<p>
			{{ Form::label('usuario', 'Usuario') }}
			{{ Form::text('usuario', Input::old('usuario'), array('placeholder' => 'Nombre de usuario')) }}
		</p>

		<p>
			{{ Form::label('password', 'Contraseña') }}
			{{ Form::password('password') }}
		</p>

		<p>{{ Form::submit('Abrir Sesion') }}</p>
	{{ Form::close() }}

</body>
</html>
