<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'venta';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nit',
        'nombre',
        'precioTotal',
        'fecha',
        'estado',
        'idCliente',
        'idEmpleado'
    ];

    public function scopegetVentas($query, $searchText){
        $compras = $query
            -> where('id','LIKE','%'.$searchText.'%')
            -> get();

        return $compras;
    }
}
