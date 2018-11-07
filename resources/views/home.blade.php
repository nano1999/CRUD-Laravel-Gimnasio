@extends('layouts.app')

@section('content')
    @if(Auth::user()->hasRole('admin'))
        <a href="crearProfesor">Profesores</a><br>
        <a href="crearActividad">Actividades</a>

    @elseif(Auth::user()->hasRole('user'))
    <h2><a href="asistoActividad/{{ Auth::user()->id }}">Mis Pagos Realizados</a></h2>
    <h2><a href="altaActividad/{{ Auth::user()->id }}">Ver Clases</a></h2>

    @elseif(Auth::user()->hasRole('profesor') && Auth::user()->visibility == 1)
    	<a href="profesors/{{ Auth::user()->id }}"><h2>Mi Informacion</h2></a>	
    	<a href="dictoActividad/{{ Auth::user()->id }}"><h2>Ver las Actividades que dicto</h2></a>
    @else
        <h1>Esperamos Que Vuelvas Pronto</h1>
    @endif
@endsection
