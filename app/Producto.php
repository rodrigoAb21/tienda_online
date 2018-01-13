<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'stock',
        'stockMinimo',
        'precio',
        'visible',
        'idCategoria'
    ];

    public function scopegetProductosB($query, $searchText){
        $productos = $query
            -> join('categoria', 'categoria.id','=','producto.idCategoria')
            -> where('producto.nombre','LIKE','%'.$searchText.'%')
            -> where('producto.visible','=','1')
            -> select('producto.id', 'producto.nombre', 'producto.imagen', 'categoria.nombre as categoria', 'producto.stock')
            ->get();
        return $productos;
    }

    public function scopegetProductos($query){
        $productos = $query
            -> where('visible','=','1')
            ->get();
        return $productos;
    }
}
