@extends('layouts.app')
@extends('layouts.isAdmin')
@extends('layouts.isProfesor')
@section('content')
	@section('subcontent')
		<center>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Datos de : {{ $User->name }}</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h2>Actualizar</h2>
						<form action="/profesors/{{ $User->id }}" method="POST">
							@method('PUT')
							@csrf
							Email <br>
							<input type="text" name="email" value="{{ $User->email }}"><br>
							Nombre<br>
							<input type="text" name="name" value="{{ $User->name }}"><br>
							Apellido<br>
							<input type="text" name="lastName" value="{{ $User->lastName }}"><br>
							Contraseña(obligatorio)<br>
							<input type="password" name="password"><br>
							Documento<br>
							<input type="text" name="document" value="{{ $User->document }}"><br>
							Telefono <br>
							<input type="text" name="phone"value="{{ $User->phone }}"><br>
							<!--<input type="hidden" name="visibility" value="1">-->
							<input type="submit">
						</form>
					</div>
				</div>
			</div>
			<form action="profesors.destroy/{{ $User->id }}">
			@method('DELETE')
			
		</form>
		</center>
	@endsection
@endsection