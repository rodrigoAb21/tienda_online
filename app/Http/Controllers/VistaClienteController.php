<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VistaClienteController extends Controller
{
    public function index(){
        $categorias = DB::table('categoria') -> where('visible','1') ->get();
        $productos = DB::table('producto') -> where('visible','1') ->get();
        return view('cliente.productos',["productos" => $productos, "categorias" => $categorias]);
    }

    public function listarProductos($id){
        $categorias = DB::table('categoria') -> where('visible','1') ->get();
        $productos = DB::table('producto') -> where('visible','1') ->where('idCategoria',$id)->get();
        return view('cliente.productos',["productos" => $productos, "categorias" => $categorias]);
    }

    public function registro(){
        return view('cliente.registro');
    }

    public function registrarCliente(Request $request){
        $cliente = new Cliente();
        $cliente -> nombre = $request -> nombre;
        $cliente -> ci = $request -> ci;
        $cliente -> nacimiento = $request -> nacimiento;
        $cliente -> direccion = $request -> direccion;
        $cliente -> telefono = $request -> telefono;
        if ($cliente -> save()){
            $usuario = new User();
            $usuario -> nombre = $cliente -> nombre;
            $usuario -> email = $request -> email;
            $usuario -> password = bcrypt($request -> password);
            $usuario -> tipo = 'Cliente';
            $usuario -> idCliente = $cliente -> id;
            $usuario -> save();
        }
        return redirect('/');
    }


    public function login(){
        return view('cliente.login');
    }

}
