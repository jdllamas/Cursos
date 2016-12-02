@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
				@if (Auth::guest())
					<div class="panel-body">
						No has iniciado sesión, ingresa o registrate.
					</div>
				@else
					<div class="panel-heading">Tablero General</div>
						<div class="panel-body">
							<a href="{{ url('/curso') }}">Cursos</a>
						</div>
						<div class="panel-body">
							<a href="{{ url('/profesor') }}">Profesores</a>
						</div>
					</div>
				@endif
        </div>
    </div>
</div>
@endsection
