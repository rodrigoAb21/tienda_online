@extends ('layouts.admin')
@section ('contenido')
    <div class="card" >
        <div class="header">
            <h3>Clientes <a href="{{URL::action('ClienteController@create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
            @include('admin.clientes.search')
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                <th>Id</th>
                <th>CI</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Opciones</th>
                </thead>
                <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente -> id}}</td>
                        <td>{{ $cliente -> ci}}</td>
                        <td>{{ $cliente -> nombre}}</td>
                        <td>{{ $cliente -> telefono}}</td>
                        <td>{{ $cliente -> email}}</td>
                        <td>
                            <a href="{{URL::action('ClienteController@edit',$cliente->id)}}"><button class="btn btn-info">Editar</button></a>
                            <a href="" data-target="#modal-delete-{{$cliente->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('admin.clientes.modal')
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection