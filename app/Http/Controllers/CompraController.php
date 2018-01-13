<?php

namespace App\Http\Controllers;

use App\Compra;
use App\DetalleC;
use App\Producto;
use App\Proveedor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    public function index(Request $request){

        if($request){
            $searchText = trim($request-> searchText);
            $compras = Compra::getCompras($searchText);
            return view('admin.compras.index',["compras" => $compras, "searchText" => $searchText]);
        }
    }

    public function create(){
        $proveedores = Proveedor::getProveedores();
        $productos = Producto::getProductos();
        return view('admin.compras.create',["proveedores"=> $proveedores, "productos" => $productos]);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $compras = new Compra();
            $compras -> costoTotal = $request -> get('montoTotal');
            $compras -> idProveedor = $request -> get('idProveedor');
            $compras -> idEmpleado = Auth::user() -> idEmpleado;
            $compras -> estado = 'Activa';
            $my_time = Carbon::now('America/La_Paz');
            $compras -> fecha = $my_time -> toDateTimeString();
            $compras -> save();

            $idProd = $request ->get('idProductoT');
            $cant = $request -> get('cantidadTabla');
            $subTotal = $request -> get('subTotal');
            $costo = $request -> get('costoTabla');
            $cont = 0;

            while ($cont < count($idProd)) {
                $detalle = new DetalleC();
                $detalle -> idCompra = $compras -> id;
                $detalle -> idProducto = $idProd[$cont];
                $detalle -> cantidad = $cant[$cont];
                $detalle -> costo = $costo[$cont];
                $detalle -> subtotal = $subTotal[$cont];
                if ($detalle -> save()){
                    $producto = Producto::findOrFail($detalle -> idProducto);
                    $producto -> stock = $producto -> stock + $detalle -> cantidad;
                    $producto -> update();
                }
                $cont = $cont + 1;
            }

            DB::commit();
        } catch (Exception $e) {

            DB::rollback();

        }

        return  redirect('adm/compras');
    }


    public function show($id)
    {
        $compra = DB::table('compra')
            -> join('proveedor', 'proveedor.id', '=', 'compra.idProveedor')
            -> join('users', 'users.idEmpleado', '=', 'compra.idEmpleado')
            -> select('compra.id', 'compra.fecha', 'users.nombre as empleado', 'compra.costoTotal','proveedor.nombre as proveedor')
            -> where('compra.id', $id)
            -> first();

        $detalles = DetalleC::getDetalle($id);
        return view('admin.compras.show',["compra"=>$compra,"detalles"=>$detalles]);
    }

    public function destroy($id){
        $compras = Compra::findOrFail($id);
        $compras -> estado = 'Anulada';
        $compras ->update();

        return redirect('adm/compras');
    }
}
