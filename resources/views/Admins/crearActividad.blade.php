@extends('layouts.app')
@extends('layouts.isAdmin')

@section('content')
	@section('subcontent')
		<center>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						@if(session('success'))
					        <h3>{{session('success')}}</h3>
					    @endif
						<h2>Registrar una nueva Actividad</h2>
							<form action="/activities" method="POST">
								@csrf
								Nombre <br>
								<input type="text" name="name"><br>
								Maximo de Alumnos<br>
								<input type="text" name="maxAl"><br>
								<!--<input type="hidden" name="visibility" value="1">-->
								<input type="submit">
							</form>
					</div>
					<div class="col-md-4">
						@if(session('success'))
					        <h3>{{session('success')}}</h3>
					    @endif
						<h2>Asignar una actividad a un profesor</h2>
						<form action="/activities_users" method="POST">
							@csrf
							Documento del profesor <br>
							<input type="text" name="document"><br>
							Nombre de la actividad<br>
							<input type="text" name="name"><br>
							<!--<input type="hidden" name="visibility" value="1">-->
							<input type="submit">
						</form>
					</div>
					<div class="col-md-4">
						<h2>Ver Los clientes que asisten a una Actividad</h2>
						@foreach($Activities as $Activitie)
						<a href="activities/{{ $Activitie->id }}">
							<button class="btn btn-info">{{ $Activitie->name }}</button>
						</a>
						@endforeach

					</div>
				</div>
			</div>
		</center>
	@endsection
@endsection