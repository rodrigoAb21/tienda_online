<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProductoController extends Controller
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
            $productos = Producto::getProductosB($searchText);
            return view('admin.productos.index',['productos' => $productos, 'searchText' => $searchText]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::getCats();
        return view('admin.productos.create',['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto();
        $producto -> nombre = $request -> nombre;
        $producto -> descripcion = $request -> descripcion;
        $producto -> precio = $request -> precio;
        $producto -> stock = 0;
        $producto -> stockMinimo = $request -> stockMinimo;
        $producto -> idCategoria = $request -> idCategoria;

        if (Input::hasFile('imagen')) {
            $file = Input::file('imagen');
            $file -> move(public_path().'/img/productos/', $file->getClientOriginalName());
            $producto -> imagen = $file->getClientOriginalName();
        }
        $producto -> save();

        return redirect('adm/productos');
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
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::getCats();
        return view('admin.productos.edit', ['producto' => $producto, 'categorias' => $categorias]);
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
        $producto = Producto::findOrFail($id);
        $producto -> nombre = $request -> nombre;
        $producto -> descripcion = $request -> descripcion;
        $producto -> stockMinimo = $request -> stockMinimo;
        $producto -> precio = $request -> precio;
        $producto -> idCategoria = $request -> idCategoria;

        if (Input::hasfile('imagen')){
            $file = Input::file('imagen');
            $file -> move(public_path().'/img/productos/', $file->getClientOriginalName());
            $producto -> imagen = $file->getClientOriginalName();
        }
        $producto -> update();
        return redirect('adm/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto -> visible = '0';
        $producto -> update();
    }
}
