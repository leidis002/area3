<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>@yield('title')</title>
		<link rel="shortcut icon" href="{{ asset('img/logo.png') }}" />
    	<link rel="apple-touch-icon" href="{{ asset('img/logo.png') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/icon.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
		@yield('css')
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1">
					<div class="row">
						<div class="col-sm-3">
							<img src="{{ asset('img/logo.png') }}" class="logo pull-left" alt="Logo Votaciones">
						</div>
						<div class="col-sm-6">
							<h1 class="titulo text-center">Sistema de Gestión de Proyectos</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<hr>
		</div>
		<div class="container">
			@include('flash::message')
		</div>
		@if(count($errors) > 0)
			<br>
			<div class="container">
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			</div>
			<br>
		@endif
		<div class="container">
			<div class="row">
				<div class="col-xs-2">
					@include('layouts.partials.navAdmin')
				</div>
				<div class="col-xs-10">
					@yield('content')
				</div>
			</div>
		</div>
		@include('layouts.partials.footer')
		<script src="{{ asset('js/jquery-2.2.3.js') }}"></script>
		<script src="{{ asset('js/bootstrap.js') }}"></script>
		<script>
		    $('#flash-overlay-modal').modal();
		</script>
		@yield('scripts')
	</body>
</html>