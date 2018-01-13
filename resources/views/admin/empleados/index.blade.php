@extends ('layouts.admin')
@section ('contenido')
    <div class="card" >
        <div class="header">
            <h3>Empleados <a href="{{URL::action('EmpleadoController@create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
            @include('admin.empleados.search')
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                    <th>Id</th>
                    <th>CI</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Tipo</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                @foreach ($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado -> id}}</td>
                        <td>{{ $empleado -> ci}}</td>
                        <td>{{ $empleado -> nombre}}</td>
                        <td>{{ $empleado -> email}}</td>
                        <td>{{ $empleado -> tipo}}</td>
                        <td>
                            <a href="{{URL::action('EmpleadoController@edit',$empleado->id)}}"><button class="btn btn-info">Editar</button></a>
                            <a href="" data-target="#modal-delete-{{$empleado->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('admin.empleados.modal')
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection