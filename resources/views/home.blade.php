@extends('layouts.admin')

@section('title', 'Bienvenido')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('dataTables/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="text-center">Listado de Usuarios</h4>
		</div>
		<div class="panel-body">
			<p class="text-right">
				<a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#nuevoUsuario" title="Nuevo Usuario"><i class="glyphicon glyphicon-pencil"></i></a>
			</p>
			<hr>
			<table id="tabla-usuarios" class="table table-hover">
				<thead>
					<tr>
						<th>Usuario</th>
						<th>Nombre</th>
						<th>Cedula</th>
						<th>Proyectos</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($usuarios as $usuario)
						<tr>
							<td>{{ $usuario->name }}</td>
							<td>{{ $usuario->persona->razon }}</td>
							<td>{{ $usuario->persona->rif }}</td>
							<td>{{ count($usuario->proyects) }}</td>
							<td>
								<a href="{{ route('programadores.pdf') }}" class='btn btn-primary btn-sm' title='Ver Informacion'><i class='glyphicon glyphicon-eye-open'></i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="modal fade" id="nuevoUsuario" tabindex="-1" role="dialog" aria-labelledby="NuevoUsuarioLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="NuevoUsuarioLabel">Nuevo Programador</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['route' => 'usuarios.store', 'method' => 'POST']) !!}
						<div class="form-group">
							<label>Usuario:</label>
							<input type="text" name="name" required class="form-control" placeholder="Ingrese su Usuario">
						</div>
						<div class="form-group">
							<label>Contraseña:</label>
							<input type="password" id="password" name="password" required class="form-control" placeholder="Ingrese su Contraseña">
						</div>
						<div class="form-group">
							<label>Confirme su Contraseña:</label>
							<input type="password" id="repassword" name="repassword" required class="form-control" placeholder="Confirme su Contraseña" onchange="verificarpass();">
						</div>
						<div id="alert" class="alert alert-warning hidden" role="alert">
							<strong>¡Advertencia!</strong> Las contraseñas no coinciden.
						</div>
						<div class="form-group">
							<label>Cedula:</label>
							<input type="text" name="rif" required class="form-control" placeholder="Ingrese su Cedula">
						</div>
						<div class="form-group">
							<label>Nombre:</label>
							<input type="text" name="razon" required class="form-control" placeholder="Ingrese su nombre">
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
						<button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary" name="nuevoUsuario">Registrar</button>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script src="{{ asset('dataTables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('dataTables/js/dataTables.bootstrap.min.js') }}"></script>
	<script src="{{ asset('chosen/chosen.jquery.js') }}"></script>
	<script src="{{ asset('js/funciones.js') }}"></script>
	<script type="text/javascript">
		$('#programadores').addClass('active');

		$(function() {
		    $('#tabla-usuarios').DataTable({
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

		$(".chosen-select").chosen(
			{
				no_results_text: "¡No se encontraros resultados!",
				width: "100%"
			}
		);
	</script>
@endsection