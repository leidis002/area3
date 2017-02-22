@extends('layouts.admin')

@section('title', 'Informacion del Votante')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="text-center">Informacion del Votante {{ $votante->primer_apellido.' '.$votante->segundo_apellido.' '.$votante->primer_nombre.' '.$votante->segundo_nombre }}</h4>
		</div>
		<div class="panel-body">
			<p class="text-right">
				<a href="{{ route('votantes.edit', $votante->id) }}" class="btn btn-warning btn-sm" title="Editar informacion"><i class="glyphicon glyphicon-edit"></i></a>
			</p>
			<hr>
			<div class="col-md-6">
				<h5><strong>Cedula:</strong></h5>
				<p>
					{{ number_format($votante->cedula, 0, ',', '.') }}
				</p>
				<h5><strong>Apellidos y Nombres:</strong></h5>
				<p>
					{{ $votante->primer_apellido.' '.$votante->segundo_apellido.' '.$votante->primer_nombre.' '.$votante->segundo_nombre }}
				</p>
			</div>
			<div class="col-md-6">
				<h5><strong>Ciudad:</strong></h5>
				<p>
					{{ $votante->mesa->centro->ciudad->ciudad }}
				</p>
				<h5><strong>Centro de votacion:</strong></h5>
				<p>
					{{ $votante->mesa->centro->centro }}
				</p>
				<h5><strong>Mesa de Votacion:</strong></h5>
				<p>
					{{ $votante->mesa->mesa }}
				</p>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		$('#votantes').addClass('active');
	</script>
@endsection