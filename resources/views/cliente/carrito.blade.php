@extends ('layouts.principalCliente')
@section ('contenido')
    <div class="container" >

        <h2 align="middle">Carrito de Compras</h2>
        <p align="middle">
            <a href="{{url('carrito/destroy')}}" class="btn btn-danger"><i class="fa fa-trash"></i> Vaciar Carrito</a>
        </p>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover ">
                <thead>
                <th>Nro</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Opciones</th>
                </thead>
                <tbody>
                @foreach ($carrito as $producto)
                    <tr>
                        <td>{{ $loop -> index + 1}}</td>
                        <td>{{ $producto -> nombre}}</td>
                        <td>
                            <img src="{{asset('img/productos/'.$producto -> imagen)}}" alt="{{$producto -> nombre}}" height="100px" width="100px" class="img-thumbnail">
                        </td>
                        <td>{{ $producto -> precio}}</td>
                        <td>
                            {!!Form::open(array('url'=>'carrito/update/'.$producto -> id,'method'=>'PATCH','autocomplete'=>'off'))!!}
                            {{Form::token()}}
                            <div class="input-group mb-3">
                                <input type="number" min="1" class="form-control" value="{{$producto -> cantidad}}" name="cantidad">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit"><i class="fa fa-refresh"></i></button>
                                </div>
                            </div>
                            {!!Form::close()!!}

                        </td>
                        <td>{{ number_format($producto -> precio * $producto -> cantidad,2)}}</td>
                        <td>
                            <a href="{{url('carrito/delete/'.$producto -> id)}}"><button class="btn btn-danger"><i class="fa fa-times-rectangle"></i></button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th><h5><b>TOTAL</b></h5></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><h5><b>Bs. {{number_format($total,2)}}</b></h5></th>
                </tr>
                </tfoot>
            </table>
        </div>
        <p align="middle">
            <a href="{{url('productos')}}" class="btn btn-success">Seguir Comprando</a>
            <a href="{{url('/detalleFactura')}}" class="btn btn-success">Continuar</a>
        </p>
    </div>
@endsection