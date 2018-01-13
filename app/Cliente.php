<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'ci',
        'nacimiento',
        'direccion',
        'telefono',
        'visible'
    ];

    public function scopegetClientesB($query, $searchText){
        $clientes = $query
            -> join('users','users.idCliente','=','cliente.id')
            -> select('cliente.id','cliente.nombre','cliente.ci','users.email','cliente.telefono')
            -> where('cliente.visible','=','1')
            -> where('cliente.nombre','LIKE','%'.$searchText.'%')
            -> get();

        return $clientes;
    }

    public function scopegetClientes($query){
        $clientes = $query
            -> where('visible','=','1')
            -> get();

        return $clientes;
    }
}
