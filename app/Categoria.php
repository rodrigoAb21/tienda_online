<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'visible',
    ];

    public function scopegetCategorias($query, $searchText){
        $categorias = $query -> where('visible','=','1')
            ->where('nombre','LIKE','%'.$searchText.'%')
            ->get();
        return $categorias;
    }

    public function scopegetCats($query){
        $categorias = $query -> where('visible','=','1')
            ->get();
        return $categorias;
    }

}
