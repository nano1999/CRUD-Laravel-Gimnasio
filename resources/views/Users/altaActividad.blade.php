@extends('layouts.app')
@extends('layouts.isUser')
@section('content')
	@if(Auth::user()->id == $User->id)
		@section('subcontent')
		@if(session('success'))
	        <h3>{{session('success')}}</h3>
	    @endif
			@foreach($Activities as $Activitie)
				<form action="/activities_users" method="POST">
					<input type="hidden" value="{{ $Activitie->id }}" name="activitie">
					<input type="hidden" value="{{ $User->id }}" name="user">
					@csrf
					<button class="btn btn-primary">{{ $Activitie->name }}</button>
				</form>
			@endforeach
		@endsection
	@else
		<script>window.location = "/login";</script>
	@endif
@endsection