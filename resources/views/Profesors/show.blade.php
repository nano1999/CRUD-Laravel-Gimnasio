@extends('layouts.app')
@extends('layouts.isProfesor')

@section('content')
	@section('subcontent')
		<center>
			Nombre: <h2>{{ $User->name }}</h2>
			Apellido: <h4>{{ $User->lastName }}</h4>
			Documento: <h4>{{ $User->document }}</h4>
			Email: <h4>{{ $User->email }}</h4>
			Telefono: <h4>{{ $User->phone }}</h4>
		</center>
		<h3>Si desea Modificar datos de este profesor <a href="{{ $User->id }}/edit"><button class="btn btn-danger">Clickee Aqui</button></h3></a>
		<h3>Si desea Eliminar este profesor</h3>
		{!! Form::open([ 'route' => ['profesors.destroy', $User->id  ], 'method' =>'DELETE']) !!}
		    {!!  Form::submit('Clickee Aqui') !!}
		{!! Form::close() !!}
	@endsection
@endsection