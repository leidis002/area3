@extends('layouts.admin')

@section('title', 'Editar informacion del Votante')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="text-center">Editar informacion del votante {{ $votante->primer_apellido.' '.$votante->segundo_apellido.' '.$votante->primer_nombre.' '.$votante->segundo_nombre }}</h4>
	</div>
	<div class="panel-body">
		{!! Form::open(['route' => ['votantes.update', $votante->id], 'method' => 'PUT', 'class' => 'col-xs-8 col-xs-offset-2']) !!}
			<div class="form-group">
				<label>Primer Nombre:</label>
				<input type="text" name="primer_nombre" value="{{ $votante->primer_nombre }}" required class="form-control" placeholder="Ingrese el primer nombre">
			</div>
			<div class="form-group">
				<label>Segundo Nombre:</label>
				<input type="text" name="segundo_nombre" value="{{ $votante->segundo_nombre }}" class="form-control" placeholder="Ingrese el segundo nombre">
			</div>
			<div class="form-group">
				<label>Primer Apellido:</label>
				<input type="text" name="nombres" value="{{ $votante->primer_apellido }}" required class="form-control" placeholder="Ingrese el primer apellido">
			</div>
			<div class="form-group">
				<label>Segundo Apellido:</label>
				<input type="text" name="nombres" value="{{ $votante->segundo_apellido }}" class="form-control" placeholder="Ingrese el segundo apellido">
			</div>
			<div class="form-group">
				<label>Cedula:</label>
				<input type="text" name="cedula" value="{{ $votante->cedula }}" required class="form-control" pattern="[0-9]{4,15}" placeholder="Ingrese el N° de cedula">
			</div>
			<div class="form-group">
				<label>*Ciudad:</label>
				<select name="ciudad" class="form-control" onchange="mostrarsele(this.value);">
					<option value="">Seleccione una ciudad</option>
					@foreach ($ciudades as $ciudad)
						@if ($ciudad->id == $votante->mesa->centro->ciudad->id)
							<option value="{{ $ciudad->id }}" selected>{{ $ciudad->ciudad }}</option>
						@else
							<option value="{{ $ciudad->id }}">{{ $ciudad->ciudad }}</option>
						@endif
					@endforeach
				</select>
				<p class="text-justyfi small">
					<strong>*Nota:</strong> Dependiendo de la ciudad seleccionada los datos (<strong> Centro de Votacion, Mesa de Votacion</strong>) 
					podrian llenarse de manera automatica.
				</p>
			</div>
			<div class="form-group">
				<label>*Centro de Votacion:</label>
				@foreach ($ciudades as $ciudad)
					@if (count($ciudad->centros) > 1)
						<select id="{{ $ciudad->ciudad }}" name="centro" class="form-control hidden" onchange="mostrarsele2(this.value);" disabled>
							<option value="">Seleccione un centro de votacion</option>
							@foreach ($ciudad->centros as $centro)
								<option value="{{ $centro->id }}">{{ $centro->centro }}</option>
							@endforeach
						</select>
					@else
						<select id="{{ $ciudad->ciudad }}" name="centro" class="form-control hidden" disabled>
							@foreach ($ciudad->centros as $centro)
								<option value="{{ $centro->id }}">{{ $centro->centro }}</option>
							@endforeach
						</select>
					@endif
				@endforeach
				<p class="text-justyfi small">
					<strong>*Nota:</strong> Dependiendo del centro de votacion seleccionado el dato <strong>Mesa de
					 Votacion</strong> podrian llenarse de manera automatica.
				</p>
			</div>
			<div class="form-group">
				<label>Mesa de Votacion:</label>
				@foreach ($ciudades as $ciudad)
					@foreach ($ciudad->centros as $centro)
						@if (count($centro->mesas) > 1)
							<select id="{{ $centro->centro }}" name="mesa" class="form-control hidden" disabled>
								<option value="">Seleccione una mesa de votacion</option>
								@foreach ($centro->mesas as $mesa)
									<option value="{{ $mesa->id }}">{{ $mesa->mesa }}</option>
								@endforeach
							</select>
						@else
							<select id="{{ $centro->centro }}" name="mesa" class="form-control hidden" disabled>
								@foreach ($centro->mesas as $mesa)
									<option value="{{ $mesa->id }}">{{ $mesa->mesa }}</option>
								@endforeach
							</select>
						@endif
					@endforeach
				@endforeach
			</div>
			<button type="submit" class="btn btn-success btn-sm" title="Editar" name="editarVotante"><i class="glyphicon glyphicon-save"></i></button>
			<a href="{{ route('votantes.index') }}" class="btn btn-warning btn-sm" title="Cancelar"><i class="glyphicon glyphicon-remove"></i></a>
		</form>
	</div>
</div>
@endsection

@section('scripts')
	<script src="{{ asset('js/funciones.js') }}"></script>
	<script type="text/javascript">
		$('#votantes').addClass('active');
	</script>
@endsection