@extends('layouts.admin')

@section('title', 'Editar Informacion')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('chosen/chosen.css') }}">
@endsection

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="text-center">Editar informacion del Usuario {{ $usuario->name }}</h4>
		</div>
		<div class="panel-body">
			{!! Form::open(['route' => ['usuarios.update', $usuario], 'method' => 'PUT']) !!}
				<div class="form-group">
					<label>Usuario:</label>
					<input type="text" name="name" value="{{ $usuario->name }}" required class="form-control" placeholder="Ingrese su Usuario">
				</div>
				<div class="form-group">
					<label>Seleccione una persona:</label>
					<select name="persona_id" class="chosen-select" required>
						@foreach ($personas as $persona)
							@if ($persona->id == $usuario->persona->id)
								<option value="{{ $persona->id }}" selected>{{$persona->cedula.' '.$persona->primer_apellido.' '.$persona->segundo_apellido.' '.$persona->primer_nombre.' '.$persona->segundo_nombre }}</option>
							@else
								<option value="{{ $persona->id }}">{{$persona->cedula.' '.$persona->primer_apellido.' '.$persona->segundo_apellido.' '.$persona->primer_nombre.' '.$persona->segundo_nombre }}</option>
							@endif
						@endforeach
					</select>
				</div>
				<button type="submit" class="btn btn-primary btn-sm" name="editUsuario" title="Editar"><i class="glyphicon glyphicon-save"></i></button>
				<a href="{{ route('usuarios.index') }}" class="btn btn-warning btn-sm" title="Cancelar"><i class="glyphicon glyphicon-remove"></i></a>
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('scripts')
	<script src="{{ asset('chosen/chosen.jquery.js') }}"></script>
	<script src="{{ asset('js/funciones.js') }}"></script>
	<script type="text/javascript">
		$('#usuarios').addClass('active');

		$(".chosen-select").chosen(
			{
				no_results_text: "¡No se encontraros resultados!",
				width: "100%"
			}
		);
	</script>
@endsection