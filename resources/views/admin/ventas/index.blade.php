@extends('layouts.admin')
@section('contenido')
    <div class="card" >
        <div class="header">
            <h3>Notas de Venta <a href="{{URL::action('VentaController@create')}}"><button class="btn btn-success">Nueva</button></a></h3>
            @include('admin.ventas.search')
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                <th>Id</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Monto (Bs)</th>
                <th>Estado</th>
                <th>Opciones</th>
                </thead>
                <tbody>
                @foreach ($ventas as $venta)
                    <tr>
                        <td>{{ $venta->id}}</td>
                        <td>{{ $venta->fecha}}</td>
                        <td>{{ $venta->nombre}}</td>
                        <td>{{ $venta->precioTotal}}</td>
                        <td>{{ $venta->estado}}</td>
                        <td>
                            <a href="{{URL::action('VentaController@show',$venta -> id)}}"><button class="btn btn-primary"><i class="fa fa-eye"></i></button></a>
                            <a href="" data-target="#modal-delete-{{$venta->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('admin.ventas.modal')
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection