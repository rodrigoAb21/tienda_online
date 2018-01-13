<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CarritoController extends Controller
{
   public function __construct()
   {
       if (!Session::has('carrito')){
           Session::put('carrito', array());
       }
   }

   public function show(){
       $carrito = Session::get('carrito');
       $total = 0;
       foreach ($carrito as $item){
           $total = $total + $item -> precio * $item -> cantidad;
       }
       return view('cliente.carrito',['carrito' => $carrito, 'total' => $total]);
   }

   public function add($id){
       $carrito = Session::get('carrito');
       $producto = Producto::findOrFail($id);
       $producto -> cantidad = 1;
       if (!isset($carrito[$producto -> id])){
           $carrito[$producto -> id] = $producto;
       }
       Session::put('carrito',$carrito);
        
       return redirect('/carrito');
   }

   public function delete($id){
       $carrito = Session::get('carrito');
       unset($carrito[$id]);
       Session::put('carrito', $carrito);

       return redirect('/carrito');
   }

   public function destroy(){
       Session::forget('carrito');

       return redirect('/carrito');
   }

   public function update($id, Request $request){
       $carrito = Session::get('carrito');
       $carrito[$id] -> cantidad = $request -> cantidad;
       Session::put('carrito', $carrito);
       
       return redirect('/carrito');
   }

}
