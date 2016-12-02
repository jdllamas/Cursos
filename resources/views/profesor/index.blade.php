@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
				<div class="panel-heading">
					Listado de Profesores
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover table-bordered" style="font-size:83%;overflow-x:scroll">
						<tr style="text-align:center">
							<th style="vertical-align:middle; text-align:center">
								Código
							</th>
							<th style="vertical-align:middle; text-align:center">
								Nombres
							</th>
							<th style="vertical-align:middle; text-align:center">
								Apellidos
							</th>
							<th style="vertical-align:middle; text-align:center">
								E-Mail
							</th>        
							<th style="vertical-align:middle; text-align:center">
								Detalles
							</th>
						</tr>
						@foreach($profesores as $profesor)
							<tr style="text-align:center">
								<td style="vertical-align:middle; text-align:center">
									{{ $profesor->codigo }}
								</td>
								<td style="vertical-align:middle; text-align:center">
									{{ $profesor->nombre }}
								</td>
								<td style="vertical-align:middle; text-align:center">
									{{ $profesor->apellido }}
								</td>
								<td style="vertical-align:middle; text-align:center">
									{{ $profesor->email }}
								</td>        
								<td style="vertical-align:middle; text-align:center">
									<a href="{{ url('/profesor/'.$profesor->id) }}">Ver</a>
									<br/>
									<a href="{{ url('/profesor/'.$profesor->id.'/edit') }}">Editar</a>
								</td>
							</tr>
						@endforeach
					</table>
				</div>
			</div>
        </div>
    </div>
</div>
@stop