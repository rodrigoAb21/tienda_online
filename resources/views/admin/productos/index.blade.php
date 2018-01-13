@extends ('layouts.admin')
@section ('contenido')
    <div class="card" >
        <div class="header">
            <h3>Productos <a href="{{URL::action('ProductoController@create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
            @include('admin.productos.search')
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Imagen</th>
                <th>stock</th>
                <th>Opciones</th>
                </thead>
                <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->id}}</td>
                        <td>{{ $producto->nombre}}</td>
                        <td>{{ $producto->categoria}}</td>
                        <td>
                            <img src="{{asset('img/productos/'.$producto -> imagen)}}" alt="{{$producto -> nombre}}" height="100px" width="100px" class="img-thumbnail">
                        </td>
                        <td>{{ $producto->stock}}</td>
                        <td>
                            <a href="{{URL::action('ProductoController@edit',$producto->id)}}"><button class="btn btn-info">Editar</button></a>
                            <a href="" data-target="#modal-delete-{{$producto->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('admin.productos.modal')
                @endforeach
                </tbody>
            </table>
        </div>
    </div>




@endsection