<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'email',
        'password',
        'tipo',
        'visible',
        'idEmpleado',
        'idCliente',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopegetEmpleado($query, $id){
        return $query -> where('idEmpleado','=', $id) -> first();
    }

    public function scopegetCliente($query, $id){
        return $query -> where('idCliente','=', $id) -> first();
    }
}
