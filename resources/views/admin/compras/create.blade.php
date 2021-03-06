@extends ('layouts.admin')
@section ('contenido')
    <div class="card" >
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <div class="header">
                <h3>Nueva Nota de Compra</h3>
            </div>
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="content">


                {!!Form::open(array('url'=>'adm/compras','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}
                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Proveedor</label>
                            <select id="idProveedor"  name="idProveedor"  class="form-control selectpicker"  data-size="6" data-live-search="true">
                                @foreach ($proveedores as $proveedor)
                                    <option value="{{$proveedor -> id}}">{{$proveedor -> nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <input id="montoTotal" type="hidden" name="montoTotal" class="form-control" >


                </div>
                <div class="row">
                    <div class="panel" style="border-radius: 25px; border: 2px solid rgba(255,0,0,0.86);">
                        <div class="panel-body">

                            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                <div class="form-group">
                                    <label>Productos</label>
                                    <select name="idProducto" class="form-control" id="idProducto" data-size="6">
                                        @foreach($productos as $producto)
                                            <option value="{{$producto -> id}}">{{$producto -> nombre}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="cant">Cantidad</label>
                                    <input type="number" min="1" name="cant" id="cant" class="form-control" >

                                </div>
                            </div>

                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="costo">Costo Unitario</label>
                                    <input type="text" name="costo" id="costo" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                                </div>
                            </div>

                            <div class="table-responsive col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <table id="detalle2" class="table table-responsive table-bordered table-hover">
                                    <thead style="background-color:rgba(255,0,0,0.86);">
                                    <th style="color: #ffffff">Opciones</th>
                                    <th style="color: #ffffff">Nombre</th>
                                    <th style="color: #ffffff">Cantidad</th>
                                    <th style="color: #ffffff">Costo</th>
                                    <th style="color: #ffffff">Sub Total</th>
                                    </thead>
                                    <tbody id="detalle">

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th><h3>TOTAL</h3></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th><h3 id="total_costo">Bs. 0.00</h3><input type="hidden" name="total_costo" id="total_costo"></th>
                                    </tr>

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="guardar">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            <button class="btn btn-danger" type="reset">Cancelar</button>
                        </div>
                    </div>

                </div>

                {!!Form::close()!!}

            </div>

        </div>
    </div>
    </div>


    @push('scripts')
        <script>
            $(document).ready(
                function () {
                    mostrarTotal();
                    evaluar();
                    $("#montoTotal").val(total);
                    $('#bt_add').click(
                        function () {
                            agregar();
                            evaluar();
                        }
                    );
                }
            );

            var cont = 0;
            total = 0;
            subTotal = [];


            function mostrarTotal() {

                $("#stotal").html("Bs." + total);
                $("#total_costo").html("Bs." + total);//  html porq es un h4
                $("#montoTotal").val(total);// val porq es un input

            }

            function agregar() {
                idProductoT = $('#idProducto').val();
                nombreProducto = $('#idProducto option:selected').text();
                cantidad = $('#cant').val();
                costo = $('#costo').val();

                if (idProductoT != "" && cantidad != "" && cantidad > 0) {
                    subTotal[cont] = (cantidad * costo);
                    total = total + subTotal[cont];


                    var fila='<tr id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-remove" aria-hidden="true"></i></button></td><td><input type="hidden" name="idProductoT[]" value="'+idProductoT+'">'+nombreProducto+'</td><td><input type="hidden" name="cantidadTabla[]" value="'+cantidad+'">'+cantidad+'</td><td><input type="hidden" name="costoTabla[]" value="'+costo+'">'+costo+'</td><td><input type = "hidden" name = "subTotal[]" value = "'+subTotal[cont]+'" >'+subTotal[cont]+'</td> </tr>';

                    cont++;

                    limpiar();
                    $("#stotal").html("Bs." + total);
                    $("#total_costo").html("Bs." + total);//  html porq es un h4
                    $("#montoTotal").val(total);// val porq es un input
                    $("#detalle").append(fila); // sirve para anhadir una fila a los detalles
                }

            }

            function limpiar(){
                $("#cant").val("");
            }

            function eliminar(index){
                total = total - subTotal[index];
                $("#stotal").html("Bs. "+total);
                $("#total_costo").html("Bs. "+total);
                $("#montoTotal").val(total);

                cont--;

                $("#fila" + index).remove();
                evaluar();
            }

            function evaluar(){
                if (cont > 0) {
                    $("#guardar").show();
                }else{
                    $("#guardar").hide();
                }
            }

        </script>
    @endpush




@endsection




























