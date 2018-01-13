<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-ver-{{$producto->id}}">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
                <h4 class="modal-title">{{$producto -> nombre}}</h4>
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
			</div>
			<div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-5">
                            <img class="img-thumbnail card-img-top" src="{{asset('img/productos/'.$producto -> imagen)}}">
                        </div>
                        <div class="col-md-6">
                            <label><b>Descripcion:</b></label>
                            <p>{{$producto -> descripcion}}</p>
                            <label><b>Precio</b></label>
                            <p>Bs. {{$producto -> precio}}</p>
                        </div>
                    </div>
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>