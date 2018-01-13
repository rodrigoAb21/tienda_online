@extends('layouts.principalCliente')
@section('contenido')

    <ul class="nav justify-content-center p-3">

        @foreach($categorias as $categoria)
            <li class="nav-item">
                <a class="nav-link btn-light" href="{{url('/productos/'.$categoria -> id)}}">{{$categoria -> nombre}}</a>
            </li>
        @endforeach

    </ul>
    <div class="container ">
        <div class="row">
            @foreach($productos as $producto)
                <div class="col-xl-4 col-lg-4  col-md-4 col-sm-6 col-xs-12">
                    <div class="card mb-4 text-center">
                        <img class="img-thumbnail card-img-top" src="{{asset('img/productos/'.$producto -> imagen)}}">
                        <div class="card-body">
                            <h6 class="card-title">{{$producto -> nombre}}</h6>
                            <p>Bs. {{$producto -> precio}}</p>
                            <a href="" data-target="#modal-ver-{{$producto->id}}" data-toggle="modal"><button class="btn btn-block btn-dark">Ver</button></a>
                            <hr>
                            <a href="{{url('/carrito/add/'.$producto -> id)}}"><button class="btn btn-block btn-primary">Agregar a carrito</button></a>
                        </div>
                    </div>
                </div>
                @include('cliente.modal')
            @endforeach
        </div>
    </div>

@endsection