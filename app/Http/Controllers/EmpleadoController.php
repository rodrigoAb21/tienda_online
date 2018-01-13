<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\User;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request){
            $searchText = trim($request  -> searchText);
            $empleados = Empleado::getEmpleados($searchText);
            return view('admin.empleados.index', ['empleados' => $empleados, 'searchText' => $searchText]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = ['Administrador','Compra','Venta','Almacen'];
        return view('admin.empleados.create',['tipos' => $tipos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empleado = new Empleado();
        $empleado -> ci = $request -> ci;
        $empleado -> nombre = $request -> nombre;
        $empleado -> nacimiento = $request -> nacimiento;
        $empleado -> direccion = $request -> direccion;
        $empleado -> telefono = $request -> telefono;
        if ($empleado -> save()){
            $usuario = New User();
            $usuario -> nombre = $empleado -> nombre;
            $usuario -> email = $request -> email;
            $usuario -> password = bcrypt($request -> password);
            $usuario -> tipo = $request -> tipo;
            $usuario -> idEmpleado = $empleado -> id;
            $usuario -> save();
        }

        return redirect('adm/empleados');

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
        $empleado = Empleado::findOrFail($id);
        $tipos = ['Administrador','Compra','Venta','Almacen'];
        $usuario = User::getEmpleado($id);
        return view('admin.empleados.edit', ['empleado' => $empleado, 'tipos' => $tipos, 'usuario' => $usuario]);
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
        $empleado = Empleado::findOrFail($id);
        $empleado -> ci = $request -> ci;
        $empleado -> nombre = $request -> nombre;
        $empleado -> nacimiento = $request -> nacimiento;
        $empleado -> direccion = $request -> direccion;
        $empleado -> telefono = $request -> telefono;
        if ($empleado -> update()){
            $usuario = User::getEmpleado($id);
            $usuario -> nombre = $empleado -> nombre;
            $usuario -> email = $request -> email;
            $usuario -> tipo = $request -> tipo;
            $usuario -> password = bcrypt($request -> password);
            $usuario -> update();
        }

        return redirect('adm/empleados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado -> visible = '0';
        $empleado -> update();

        return redirect('adm/empleados');
    }
}
