@extends ('layouts.admin')
@section ('contenido')
    <div class="card" >
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="header">
                <h3>Editar Producto: {{$producto -> nombre}}</h3>
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
                {!!Form::model($producto,['method'=>'PATCH','autocomplete'=>'off','route'=>['productos.update',$producto -> id], 'files'=>'true'])!!}
                {{Form::token()}}


                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{$producto -> nombre}}"  required >
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" name="descripcion" class="form-control" value="{{$producto -> descripcion}}" required>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" name="precio" class="form-control" value="{{$producto -> precio}}" required>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="stockMinimo">Stock Minimo</label>
                        <input type="number" name="stockMinimo" class="form-control" value="{{$producto -> stockMinimo}}" required>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label>Categoria</label>
                        <select name="idCategoria" class="form-control">
                            @foreach ($categorias as $catategoria)
                                @if ($catategoria -> id == $producto -> idCategoria)
                                    <option value="{{$catategoria -> id}}" selected>{{$catategoria -> nombre}}</option>
                                @else
                                    <option value="{{$catategoria -> id}}">{{$catategoria -> nombre}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" name="imagen" class="form-control-file"  value="{{$producto -> imagen}}">
                        @if (($producto -> imagen)!="")
                            <br>
                            <img src="{{asset('img/productos/'.$producto -> imagen)}}" height="150px" width="150px" class="img-thumbnail"  >
                        @endif
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