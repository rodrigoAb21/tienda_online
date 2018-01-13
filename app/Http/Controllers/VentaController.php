<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\DetalleV;
use App\Producto;
use App\Venta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    public function index(Request $request){

        if($request){
            $searchText = trim($request->get('searchText'));
            $ventas = Venta::getVentas($searchText);
            return view('admin.ventas.index',["ventas" => $ventas,"searchText" => $searchText]);
        }
    }

    public function create(){
        $clientes = Cliente::getClientes();
        $productos = Producto::getProductos();
        return view('admin.ventas.create',["clientes"=> $clientes, "productos" => $productos]);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $ventas = new Venta();
            $ventas -> nit = $request -> get('nit');
            $ventas -> nombre = $request -> get('nombre');
            $ventas -> precioTotal = $request -> get('montoTotal');
            $ventas -> idCliente = $request -> get('idCliente');
            $ventas -> idEmpleado = Auth::user() -> idEmpleado;
            $ventas -> estado = 'Activa';
            $my_time = Carbon::now('America/La_Paz');
            $ventas -> fecha = $my_time -> toDateTimeString();
            $ventas -> save();

            $idProd = $request ->get('idProductoT');
            $cant = $request -> get('cantidadTabla');
            $subTotal = $request -> get('subTotal');
            $cont = 0;

            while ($cont < count($idProd)) {
                $detalle = new DetalleV();
                $detalle -> idVenta = $ventas -> id;
                $detalle -> idProducto = $idProd[$cont];
                $detalle -> cantidad = $cant[$cont];
                $detalle -> subtotal = $subTotal[$cont];
                if ($detalle -> save()){
                    $producto = Producto::findOrFail($detalle -> idProducto);
                    $producto -> stock = $producto -> stock - $detalle -> cantidad;
                    $producto -> update();
                }
                $cont = $cont + 1;
            }

            DB::commit();
            
        } catch (Exception $e) {

            DB::rollback();

        }


        return  redirect('adm/ventas');
    }


    public function show($id)
    {
        $venta = DB::table('venta')
            -> join('cliente', 'cliente.id', '=', 'venta.idCliente')
            -> join('users', 'users.idEmpleado', '=', 'venta.idEmpleado')
            -> select('venta.id', 'venta.fecha', 'users.nombre as empleado', 'venta.precioTotal', 'venta.nit', 'venta.nombre', 'cliente.nombre as cliente')
            -> where('venta.id', $id)
            -> first();

        $detalles = DetalleV::getDetalle($id);
        return view('admin.ventas.show',["venta" => $venta,"detalles" => $detalles]);
    }

    public function destroy($id){
        $ventas = Venta::findOrFail($id);
        $ventas -> estado = 'Anulada';
        $ventas ->update();
        
        return redirect('adm/ventas');
    }
}
