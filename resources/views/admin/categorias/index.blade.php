@extends ('layouts.admin')
@section ('contenido')
    <div class="card" >
        <div class="header">
            <h3>Categorias <a href="{{URL::action('CategoriaController@create')}}"><button class="btn btn-success">Nueva</button></a></h3>
            @include('admin.categorias.search')
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Opciones</th>
                </thead>
                <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id}}</td>
                        <td>{{ $categoria->nombre}}</td>
                        <td>
                            <a href="{{URL::action('CategoriaController@edit',$categoria->id)}}"><button class="btn btn-info">Editar</button></a>
                            <a href="" data-target="#modal-delete-{{$categoria->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('admin.categorias.modal')
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection