@extends('layouts.app')
@extends('layouts.isAdmin')

@section('content')
	@section('subcontent')
		<center>
			<h2>Actividad: {{ $Activitie->name }}</h2>
			@foreach($User as $Users)
				@if($Users->type == 0)<!--si el tipo es 0, es alumno, este if lo necesito porque sino muestra tambien los profesores-->
					{{ $Users->name }}<br>
				@endif
			@endforeach
		</center>
	@endsection
@endsection