@extends ('layouts.admin')
@section ('contenido')
    <div class="card" >
    <div class="header">
        <h3>Acciones</h3>
    </div>
    <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>
            <th>Id</th>
            <th>Accion</th>
            <th>Tabla</th>
            <th>Tupla</th>
            <th>Fecha</th>
            </thead>
            <tbody>
            @foreach ($acciones as $accion)
                <tr>
                    <td>{{ $accion->id}}</td>
                    <td>{{ $accion->accion}}</td>
                    <td>{{ $accion->tabla}}</td>
                    <td>{{ $accion->tupla}}</td>
                    <td>{{ $accion->fecha}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>

@endsection