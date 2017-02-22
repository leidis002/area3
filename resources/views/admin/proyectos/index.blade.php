@extends('layouts.admin')

@section('title', 'Proyectos')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('dataTables/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="text-center">Listado de Proyectos</h4>
		</div>
		<div class="panel-body">
			<a href="#" data-toggle="modal" data-target="#nuevoVotante" class="btn btn-success btn-sm pull-right" title="Nuevo Votante"><i class="glyphicon glyphicon-pencil"></i></a>
			<br>
			<hr>
			<table class="table table-hover" id="tabla-votantes">
				<thead>
					<th>Nombres</th>
					<th>Fecha Inicio</th>
					<th>Fecha Finalización</th>
					<th>Estatus</th>
					<th>Tipo</th>
					<th>Acciones</th>
				</thead>
				<tbody>
					@foreach($proyects as $proyect)
						<tr>
							<td>{{ $proyect->name }}</td>
							<td>{{ $proyect->start }}</td>
							<td>{{ $proyect->ending }}</td>
							<td>{{ $proyect->status }}</td>
							<td>{{ $proyect->type }}</td>
							<td>
								<a href="{{ route('proyectos.pdf') }}" class='btn btn-primary btn-sm' title='Ver Informacion' target="_blank"><i class='glyphicon glyphicon-eye-open'></i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="modal fade" id="nuevoVotante" tabindex="-1" role="dialog" aria-labelledby="RegistroVotante">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="RegistroVotante">Registro de nuevo Proyecto</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['route' => 'proyects.store', 'method' => 'POST']) !!}
						<div class="form-group">
							<label>Nombre:</label>
							<input type="text" name="name" required class="form-control" placeholder="Ingrese el nombre del proyecto">
						</div>
						<div class="form-group">
							<label>Descripcion:</label>
							<input type="text" name="description" required class="form-control" placeholder="Ingrese Descripcion">
						</div>
						<div class="form-group">
							<label>Fecha de Inicio:</label>
							<input type="text" name="start" required class="form-control" placeholder="Ingrese Fecha de Inicio AAAA-MM-DD">
						</div>
						<div class="form-group">
							<label>Fecha de Finalización:</label>
							<input type="text" name="ending" required class="form-control" placeholder="Ingrese Fecha de Finalización AAAA-MM-DD">
						</div>
						<div class="form-group">
							<label>Costo:</label>
							<input type="number" name="cost" class="form-control" required placeholder="Ingrese el costo">
						</div>
						<div class="form-group">
							<label>Moneda:</label>
							<select name="coin" required class="form-control">
								<option value="USD">Dolar</option>
								<option value="EUR">Euro</option>
								<option value="VEF">Bolivar</option>
							</select>
						</div>
						<div class="form-group">
							<label>Tipo:</label>
							<select name="type" required class="form-control">
								<option value="web">Web</option>
								<option value="system">Sistema</option>
							</select>
						</div>
						<div class="form-group">
							<label>Programador: </label>
							{!! Form::select('user_id', $users, null, ['class' => 'form-control', 'required']) !!}
						</div>
						<div class="form-group">
							<label>Cliente: </label>
							{!! Form::select('client_id', $clients, null, ['class' => 'form-control', 'required']) !!}
						</div>
						<button type="button" class="btn btn-danger btn-sm" title="Cerrar" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i></button>
						<button type="submit" class="btn btn-success btn-sm" title="Registrar" name="nuevoVotante"><i class="glyphicon glyphicon-save"></i></button>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script src="{{ asset('dataTables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('dataTables/js/dataTables.bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/funciones.js') }}"></script>
	<script type="text/javascript">
		$('#proyectos').addClass('active');

		$(function() {
		    $('#tabla-votantes').DataTable({
		        "language": {
		            "lengthMenu": "Ver _MENU_ entradas por pagina",
		            "zeroRecords": "No se encontraron resultados",
		            "info": "Viendo la pagina _PAGE_ de _PAGES_",
		            "infoEmpty": "No hay informacion",
		            "search": "Buscar: ",
		            "paginate": {
				        "previous": "Anterior ",
				        "next": " Proximo",
				    }
		        }
		    });
		});
	</script>
@endsection