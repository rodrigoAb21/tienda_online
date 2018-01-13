<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedor';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'nit',
        'direccion',
        'telefono',
        'visible',
    ];

    public function scopegetProveedoresB($query, $searchText){
        $proveedores = $query
            -> where('nombre','LIKE','%'.$searchText.'%')
            -> where('visible','=','1')
            -> get();

        return $proveedores;
    }

    public function scopegetProveedores($query){
        $proveedores = $query
            -> where('visible','=','1')
            -> get();

        return $proveedores;
    }
}
