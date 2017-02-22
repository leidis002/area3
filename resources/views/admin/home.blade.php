@extends('layouts.admin')

@section('title', 'Panel Administrativo')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="text-center">Bienvenido al Panel Administrativo</h3>	
		</div>
		<div class="panel-body">
			<p class="text-justify">
				Desde aqui podra manupilar su sistema web.<br>
				Ademas encontrara un pequeño manual de ayuda.
			</p>
		</div>
		<div class="panel-footer">
			<p class="small">Web en su version Beta 2.0 Por: Emmanuel Prin</p>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		$('#home').addClass('active');
	</script>
@endsection