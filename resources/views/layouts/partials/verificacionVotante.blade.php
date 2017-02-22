<div class="row" id="votante">
	<div class="col-xs-10 col-xs-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Tus Datos Son:</h4>
			</div>
			<div class="panel-body">
				<div class="col-md-6">
					<h5><strong>Cedula:</strong></h5>
					<p>
						{{ number_format($votanteVR->cedula, 0, ',', '.') }}
					</p>
					<h5><strong>Apellidos y Nombres:</strong></h5>
					<p>
						{{ $votanteVR->primer_apellido.' '.$votanteVR->segundo_apellido.' '.$votanteVR->primer_nombre.' '.$votanteVR->segundo_nombre }}
					</p>
				</div>
				<div class="col-md-6">
					<h5><strong>Ciudad:</strong></h5>
					<p>
						{{ $votanteVR->mesa->centro->ciudad->ciudad }}
					</p>
					<h5><strong>Centro de votacion:</strong></h5>
					<p>
						{{ $votanteVR->mesa->centro->centro }}
					</p>
					<h5><strong>Mesa de Votacion:</strong></h5>
					<p>
						{{ $votanteVR->mesa->mesa }}
					</p>
				</div>
				<?php echo '<a href="#" target="_blank" class="btn btn-warning btn-sm" title="Guardar"><i class="glyphicon glyphicon-floppy-disk"></i></a>'; ?>
				<button type="button" class="btn btn-danger btn-sm" title="Cerrar" onclick="ocultar('votante');"><i class="glyphicon glyphicon-remove"></i></button>
			</div>
		</div>
	</div>
</div>