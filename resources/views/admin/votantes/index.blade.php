@extends('layouts.admin')

@section('title', 'Votantes')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('dataTables/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="text-center">Listado de Clientes</h4>
		</div>
		<div class="panel-body">
			<a href="#" data-toggle="modal" data-target="#nuevoVotante" class="btn btn-success btn-sm pull-right" title="Nuevo Votante"><i class="glyphicon glyphicon-pencil"></i></a>
			<br>
			<hr>
			<table class="table table-hover" id="tabla-votantes">
				<thead>
					<th>Nombres</th>
					<th>Cedula</th>
					<th>Telefono</th>
					<th>Fecha de Registro</th>
					<th>Proyectos</th>
					<th>Acciones</th>
				</thead>
				<tbody>
					@foreach($clients as $client)
						<tr>
							<td>{{ $client->persona->razon }}</td>
							<td>{{ $client->persona->rif }}</td>
							<td>{{ $client->persona->telefono }}</td>
							<td>{{ $client->created_at }}</td>
							<td>{{ count($client->proyects) }}</td>
							<td>
								<a href="{{ route('clientes.pdf') }}" class='btn btn-primary btn-sm' title='Ver Informacion'><i class='glyphicon glyphicon-eye-open'></i></a>
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
					<h4 class="modal-title" id="RegistroVotante">Registro de nuevo Cliente</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['route' => 'clients.store', 'method' => 'POST']) !!}
						<div class="form-group">
							<label>Cedula/Rif:</label>
							<input type="text" name="rif" required class="form-control" pattern="[0-9]{4,15}" placeholder="Ingrese el N° de cedula">
						</div>
						<div class="form-group">
							<label>Nombre/Razon:</label>
							<input type="text" name="razon" required class="form-control" placeholder="Ingrese el primer nombre">
						</div>
						<div class="form-group">
							<label>Dirección:</label>
							<input type="text" name="direccion" required class="form-control" placeholder="Ingrese su Dirección">
						</div>
						<div class="form-group">
							<label>Telefono:</label>
							<input type="text" name="telefono" required class="form-control" placeholder="Ingrese su Telefono">
						</div>
						<div class="form-group">
							<label>E-mail:</label>
							<input type="email" name="email" required class="form-control" placeholder="Ingrese su E-mail">
						</div>
						<div class="form-group">
							<label>Contacto:</label>
							<input type="text" name="contact" required class="form-control" placeholder="Ingrese un Contacto">
						</div>
						<div class="form-group">
							<label>Telefono del Contacto:</label>
							<input type="text" name="phone" required class="form-control" placeholder="Ingrese el telefono del contacto">
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
		$('#clientes').addClass('active');

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