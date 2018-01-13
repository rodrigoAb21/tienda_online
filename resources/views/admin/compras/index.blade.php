@extends('layouts.admin')
@section('contenido')
    <div class="card" >
        <div class="header">
            <h3>Notas de Compra <a href="{{URL::action('CompraController@create')}}"><button class="btn btn-success">Nueva</button></a></h3>
            @include('admin.compras.search')
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                <th>Id</th>
                <th>Fecha</th>
                <th>Proveedor</th>
                <th>Costo Total (Bs)</th>
                <th>Estado</th>
                <th>Opciones</th>
                </thead>
                <tbody>
                @foreach ($compras as $compra)
                    <tr>
                        <td>{{ $compra->id}}</td>
                        <td>{{ $compra->fecha}}</td>
                        <td>{{ $compra->nombre}}</td>
                        <td>{{ $compra->costoTotal}}</td>
                        <td>{{ $compra->estado}}</td>
                        <td>
                            <a href="{{URL::action('CompraController@show',$compra -> id)}}"><button class="btn btn-primary"><i class="fa fa-eye"></i></button></a>
                            <a href="" data-target="#modal-delete-{{$compra->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('admin.compras.modal')
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection