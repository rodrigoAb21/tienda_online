<?php

namespace App\Http\Controllers;

use App\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
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
            $proveedores = Proveedor::getProveedoresB($searchText);
            return view('admin.proveedores.index',['proveedores' => $proveedores, 'searchText' => $searchText]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proveedor = new Proveedor();
        $proveedor -> nit = $request -> nit;
        $proveedor -> nombre = $request -> nombre;
        $proveedor -> direccion = $request -> direccion;
        $proveedor -> telefono = $request -> telefono;
        $proveedor -> save();

        return redirect('adm/proveedores');
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
        $proveedor = Proveedor::findOrFail($id);
        return view('admin.proveedores.edit', ['proveedor' => $proveedor]);
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
        $proveedor = Proveedor::findOrFail($id);
        $proveedor -> nit = $request -> nit;
        $proveedor -> nombre = $request -> nombre;
        $proveedor -> direccion = $request -> direccion;
        $proveedor -> telefono = $request -> telefono;
        $proveedor -> update();

        return redirect('adm/proveedores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor -> visible = '0';
        $proveedor -> update();

        return redirect('adm/proveedores');
    }
}
