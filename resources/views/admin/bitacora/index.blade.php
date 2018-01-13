@extends ('layouts.admin')
@section ('contenido')
    <div class="card" >
    <div class="header">
        <h3>Bitacoras</h3>
        @include('admin.bitacora.search')
    </div>
    <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>
            <th>Id</th>
            <th>Fecha de Entrada</th>
            <th>Usuario</th>
            <th>Opciones</th>
            </thead>
            <tbody>
            @foreach ($bitacora as $bit)
                <tr>
                    <td>{{ $bit->id}}</td>
                    <td>{{ $bit->fechaEntrada}}</td>
                    <td>{{ $bit->nombre}}</td>
                    <td>
                        <a href="{{asset("adm/bitacora/".$bit->id)}}"><button class="btn btn-danger">Acciones</button></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{$bitacora->render()}}
    </div>
@endsection