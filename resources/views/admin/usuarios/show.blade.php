@extends('layouts.admin')

@section('title', 'Informacion del Usuario')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="text-center">Informacion del Usuario {{ $usuario->name }}</h4>
		</div>
		<div class="panel-body">
			<p class="text-right">
				<a href="{{ route('usuarios.index') }}" class="btn btn-primary btn-sm" title="Regresar"><i class="glyphicon glyphicon-arrow-left"></i></a>
				<a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-warning btn-sm" title="Editar informacion"><i class="glyphicon glyphicon-edit"></i></a>
			</p>
			<hr>
			<div class="col-md-6">
				<h5><strong>Usuario:</strong></h5>
				<p>
					{{ $usuario->name }}
				</p>
				<h5><strong>Persona Asignada:</strong></h5>
				<p>
					{{ number_format($usuario->persona->cedula, 0, ',', '.').' '.$usuario->persona->primer_apellido.' '.$usuario->persona->segundo_apellido.' '.$usuario->persona->primer_nombre.' '.$usuario->persona->segundo_nombre }}
				</p>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		$('#usuarios').addClass('active');
	</script>
@endsection