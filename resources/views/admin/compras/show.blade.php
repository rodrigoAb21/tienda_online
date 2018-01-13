@extends ('layouts.admin')
@section ('contenido')
    <div class="card" >
 <div class="content" style="border-radius: 25px; border: 2px solid rgba(255,0,0,0.86);">
     <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <h3>Nota de Venta # {{$compra -> id}}</h3>
             <h4>Fecha: {{$compra -> fecha}}</h4>
         </div>
     </div>

     <div class="row">

         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
             <div class="form-group">
                 <label>Empleado</label>
                 <p>{{$compra -> empleado}}</p>
             </div>
         </div>

         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
             <div class="form-group">
                 <label>Proveedor</label>
                 <p>{{$compra -> proveedor}}</p>
             </div>
         </div>


     </div>
     <div class="row">
         <div class="table-responsive">
             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                 <table class="table table-bordered table-condensed table-hover">
                     <thead style="background-color:rgba(255,0,0,0.86);">
                         <th style="color: #ffffff"><b>Nombre</b></th>
                         <th style="color: #ffffff"><b>Cantidad</b></th>
                         <th style="color: #ffffff"><b>Costo Unitario</b></th>
                         <th style="color: #ffffff"><b>Precio</b></th>
                     </thead>
                     <tbody>
                     @foreach($detalles as $detalle)
                         <tr>
                             <td>{{$detalle -> nombre}}</td>
                             <td>{{$detalle -> cantidad}}</td>
                             <td>{{$detalle -> costo}}</td>
                             <td>{{$detalle -> subtotal}}</td>
                         </tr>
                     @endforeach
                     </tbody>
                     <tfoot>
                     <tr>
                         <th><h5><b>TOTAL</b></h5></th>
                         <th></th>
                         <th></th>
                         <th><h5><b>Bs. {{$compra -> costoTotal}}</b></h5></th>
                     </tr>
                     </tfoot>
                 </table>
             </div>
         </div>
     </div>
 </div>
 </div>
@endsection