@extends('layouts.app')
@extends('layouts.isAdmin')

@section('content')
	@section('subcontent')
		<center>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Datos de Profesores</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h2>Consultar datos</h2>
						@foreach($User as $Users)
							@if($Users->visibility != 0)
								<a href="profesors/{{ $Users->id }}">
									<button class="btn btn-info">{{ $Users->name }}</button>
								</a>
							@endif
						@endforeach
					</div>
					<div class="col-md-6">
						<h2>Registrar un nuevo Profesor</h2>
						<form action="/profesors" method="POST">
							@csrf
							Email <br>
							<input type="text" name="email"><br>
							Nombre<br>
							<input type="text" name="name"><br>
							Apellido<br>
							<input type="text" name="lastName"><br>
							Contraseña<br>
							<input type="password" name="password"><br>
							Documento<br>
							<input type="text" name="document"><br>
							Telefono <br>
							<input type="text" name="phone"><br>
							<!--<input type="hidden" name="visibility" value="1">-->
							<input type="submit">
						</form>
					</div>
				</div>
			</div>
			
		</center>
	@endsection
@endsection