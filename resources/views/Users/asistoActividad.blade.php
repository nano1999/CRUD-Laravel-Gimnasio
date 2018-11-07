@extends('layouts.app')
@extends('layouts.isUser')
@section('content')
	@section('subcontent')
	 	@if(Auth::user()->id == $User->id)
			<h1>Usted Asiste A:</h1>
			<div class="container">
				<div class="row">
					<div class="col-md-1">
						Actividad:
					</div>
					<div class="col-md-1">
						Proximo Pago:
					</div>
				</div>
				<div class="row">
					<div class="col-md-1">
						@foreach($Activities as $Activitie)
							<h3>{{ $Activitie->name }}</h3>
						@endforeach
					</div>
					<div class="col-md-2">
						@foreach ($User->activities as $activitie)
				            <h3>{{ $activitie->pivot->future_pay }}</h3>
				        @endforeach
					</div>
				</div>
			</div>
		@else
			<script>window.location = "/login";</script>
		@endif

	@endsection
@endsection