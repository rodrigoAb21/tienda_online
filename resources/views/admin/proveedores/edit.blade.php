@extends ('layouts.admin')
@section ('contenido')
    <div class="card" >
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="header">
                <h3>Editar Proveedor: {{$proveedor -> nombre}}</h3>
            </div>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
            <div class="content">
                {!!Form::model($proveedor,['method'=>'PATCH','autocomplete'=>'off','route'=>['proveedores.update',$proveedor -> id]])!!}
                {{Form::token()}}

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="nit">NIT</label>
                            <input type="number" name="nit" class="form-control" value="{{$proveedor -> nit}}" required autofocus >
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="{{$proveedor -> nombre}}"  required >
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="direccion">Direccion</label>
                            <input type="text" name="direccion" class="form-control" value="{{$proveedor -> direccion}}"   required>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="number" name="telefono" class="form-control" value="{{$proveedor -> telefono}}"   required>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            <button class="btn btn-danger" type="reset">Cancelar</button>
                        </div>
                    </div>

                {!!Form::close()!!}
            </div>

		</div>
	</div>
	</div>
@endsection