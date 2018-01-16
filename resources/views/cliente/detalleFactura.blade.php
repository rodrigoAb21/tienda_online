@extends ('layouts.principalCliente')
@section ('contenido')
    <div class="container" >

        <h2 align="middle">Detalle de Factura</h2>
        <div class="content">
            <div class="row">
                {!! Form::open() !!}
                {{ Form::token() }}
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label for="nit">NIT/CI</label>
                        <input type="number" min="0" name="nit" class="form-control" required>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>

            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label>Cliente</label>
                        <p>{{$cliente -> nombre}}</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label>Carnet</label>
                        <p>{{$cliente -> ci}}</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label>Telefono</label>
                        <p>{{$cliente -> telefono}}</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group">
                        <label>Direccion</label>
                        <p>{{$cliente -> direccion}}</p>
                    </div>
                </div>


            </div>

        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover ">
                <thead>
                <th>Nro</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                </thead>
                <tbody>
                @foreach ($carrito as $producto)
                    <tr>
                        <td>{{ $loop -> index + 1 }}</td>
                        <td>{{ $producto -> nombre }}</td>
                        <td>{{ $producto -> precio }}</td>
                        <td>{{ $producto -> cantidad }}</td>
                        <td>{{ number_format($producto -> precio * $producto -> cantidad,2)}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th><h5><b>TOTAL</b></h5></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><h5><b>Bs. {{number_format($total,2)}}</b></h5></th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection