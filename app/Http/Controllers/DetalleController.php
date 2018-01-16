<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DetalleController extends Controller
{
    public function mostrarDetalle(){
        $carrito = Session::get('carrito');
        $total = 0;
        foreach ($carrito as $item){
            $total = $total + $item -> precio * $item -> cantidad;
        }
        $cliente = Cliente::findOrFail(Auth::user() -> idCliente);
        return view('cliente.detalleFactura',['carrito' => $carrito, 'total' => $total, 'cliente' => $cliente]);
    }
}
