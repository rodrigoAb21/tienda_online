@extends ('layouts.admin')
@section ('contenido')
    <div class="card" >
    <div class="header">
        <h3>Proveedores <a href="{{URL::action('ProveedorController@create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
        @include('admin.proveedores.search')
    </div>
    <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Opciones</th>
            </thead>
            <tbody>
            @foreach ($proveedores as $proveedor)
                <tr>
                    <td>{{ $proveedor->id}}</td>
                    <td>{{ $proveedor->nombre}}</td>
                    <td>{{ $proveedor->direccion}}</td>
                    <td>{{ $proveedor->telefono}}</td>
                    <td>
                        <a href="{{URL::action('ProveedorController@edit',$proveedor->id)}}"><button class="btn btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$proveedor->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                    </td>
                </tr>
                @include('admin.proveedores.modal')
            @endforeach
            </tbody>
        </table>
    </div>
    </div>




@endsection