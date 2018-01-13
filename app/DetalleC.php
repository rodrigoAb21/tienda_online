<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleC extends Model
{
    protected $table = 'detallec';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'idCompra',
        'idProducto',
        'cantidad',
        'costo',
        'subtotal'
    ];

    public function scopegetDetalle($query, $id){
        $detalles = $query
            -> join('producto','producto.id','=','detallec.idProducto')
            -> select('producto.nombre', 'detallec.cantidad', 'detallec.costo', 'detallec.subtotal')
            -> where('detallec.idCompra',$id) -> get();
        return $detalles;
    }
}
