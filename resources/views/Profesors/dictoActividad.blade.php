@extends('layouts.app')
@extends('layouts.isProfesor')

@section('content')
	@section('subcontent')
		@foreach($Activitie as $Activities)
			<h2>{{ $Activities->name }}</h2><br>
		@endforeach
	@endsection
@endsection