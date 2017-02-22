<div id="flash-overlay-modal" class="modal fade {{ $modalClass or '' }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title">{{ $title }}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5><strong>Cedula:</strong></h5>
                        <p>
                            {{ number_format($body->cedula, 0, ',', '.') }}
                        </p>
                        <h5><strong>Apellidos y Nombres:</strong></h5>
                        <p>
                            {{ $body->primer_apellido.' '.$body->segundo_apellido.' '.$body->primer_nombre.' '.$body->segundo_nombre }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h5><strong>Ciudad:</strong></h5>
                        <p>
                            {{ $body->mesa->centro->ciudad->ciudad }}
                        </p>
                        <h5><strong>Centro de votacion:</strong></h5>
                        <p>
                            {{ $body->mesa->centro->centro }}
                        </p>
                        <h5><strong>Mesa de Votacion:</strong></h5>
                        <p>
                            {{ $body->mesa->mesa }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('votante.guardar', $body) }}" target="_blank" class="btn btn-warning btn-sm" title="Guardar"><i class="glyphicon glyphicon-floppy-disk"></i></a>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" title="Cerrar"><i class="glyphicon glyphicon-remove"></i></button>
            </div>
        </div>
    </div>
</div>
