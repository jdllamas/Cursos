@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profesor</div>
                <div class="panel-body">
					<div class="row form-group">
						<label for="codigo" class="col-md-4 control-label">Codigo</label>
						<div class="col-md-6">
							<input id="codigo" type="text" class="form-control" name="codigo" value="{{ $profesor->codigo }}" disabled="disabled" required>
						</div>
					</div>
					<div class="row form-group">
                        <label for="nombre" class="col-md-4 control-label">Nombres</label>
                        <div class="col-md-6">
                            <input id="nombre" type="text" class="form-control" name="nombre" value="{{ $profesor->nombre }}" disabled="disabled" required autofocus>
                        </div>
                    </div>
					<div class="row form-group">
                        <label for="name" class="col-md-4 control-label">Apellidos</label>
                        <div class="col-md-6">
                            <input id="apellido" type="text" class="form-control" name="apellido" value="{{ $profesor->apellido }}" disabled="disabled" required autofocus>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="email" class="col-md-4 control-label">E-Mail</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $profesor->email }}" disabled="disabled" required>
                        </div>
                    </div>
				</div>
				@if(!$cursos->isEmpty())
					<div class="panel-heading">Cursos Asociados</div>
					<div class="panel-body">
						<table class="table table-striped table-hover table-bordered" style="font-size:83%;overflow-x:scroll">
							<tr style="text-align:center">
								<th style="vertical-align:middle; text-align:center">
									Nombre
								</th>
								<th style="vertical-align:middle; text-align:center">
									Descripcion
								</th>
								<th style="vertical-align:middle; text-align:center">
									Anio
								</th>
								<th style="vertical-align:middle; text-align:center">
									Periodo
								</th>        
								<th style="vertical-align:middle; text-align:center">
									Fecha Inicio
								</th>
							</tr>
							@foreach($cursos as $curso)
								<tr style="text-align:center">
									<td style="vertical-align:middle; text-align:center">
										{{ $curso->nombre }}
									</td>
									<td style="vertical-align:middle; text-align:center">
										{{ $curso->descripcion }}
									</td>
									<td style="vertical-align:middle; text-align:center">
										{{ $curso->anio }}
									</td>
									<td style="vertical-align:middle; text-align:center">
										{{ $curso->periodo }}
									</td>        
									<td style="vertical-align:middle; text-align:center">
										{{ $curso->fecha_inicio }}
									</td>
								</tr>
							@endforeach
						</table>
					</div>
				@endif
            </div>
        </div>
    </div>
</div>
@endsection
