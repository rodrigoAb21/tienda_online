<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compra';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'costoTotal',
        'fecha',
        'estado',
        'idProveedor',
        'idEmpleado'
    ];

    public function scopegetCompras($query, $searchText){
        $compras = $query
            -> join('proveedor','proveedor.id','=','compra.idProveedor')
            -> where('compra.id','LIKE','%'.$searchText.'%')
            -> select('compra.id', 'compra.costoTotal', 'compra.fecha', 'compra.estado', 'proveedor.nombre')
            -> get();

        return $compras;
    }
}
