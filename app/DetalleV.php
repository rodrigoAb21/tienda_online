<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleV extends Model
{
    protected $table = 'detallev';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'idVenta',
        'idProducto',
        'cantidad',
        'subtotal'
    ];

    public function scopegetDetalle($query, $id){
        $detalles = $query
            -> join('producto','producto.id','=','detallev.idProducto')
            -> select('producto.nombre', 'detallev.cantidad', 'producto.precio', 'detallev.subtotal')
            -> where('detallev.idVenta',$id)
            -> get();
        return $detalles;
    }
}
