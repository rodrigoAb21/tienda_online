<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleado';

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

    public function scopegetEmpleados($query, $searchText){
        $empleados = $query
            -> join('users','users.idEmpleado','=','empleado.id')
            -> where('empleado.visible','=','1')
            -> where('empleado.nombre','LIKE','%'.$searchText.'%')
            -> select('empleado.id','empleado.ci','empleado.nombre','users.email','users.tipo')
            -> get();
        return $empleados;
    }
}
