<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\User;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request){
            $searchText = trim($request -> searchText);
            $clientes = Cliente::getClientesB($searchText);
            return view('admin.clientes.index',['clientes' => $clientes, 'searchText' => $searchText]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        return redirect('adm/clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        $usuario = User::getCliente($id);
        return view('admin.clientes.edit',['cliente' => $cliente, 'usuario' => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente -> nombre = $request -> nombre;
        $cliente -> ci = $request -> ci;
        $cliente -> nacimiento = $request -> nacimiento;
        $cliente -> direccion = $request -> direccion;
        $cliente -> telefono = $request -> telefono;
        if ($cliente ->update()){
            $usuario = User::getCliente($id);
            $usuario -> nombre = $request -> nombre;
            $usuario -> email = $request -> email;
            $usuario -> password = bcrypt($request -> password);
            $usuario -> update();
        }

        return redirect('adm/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente -> visible = '0';
        $cliente -> update();

        return redirect('adm/clientes');
    }
}
