<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Articulo;

class Categoria extends Model
{
    protected $fillable=["nombre", "descripcion"];

    public function articulos(){
        return $this->hasMany(Articulo::class);
    }

    public function scopeNombre($query, $v){
        return $query->where('nombre','like',"%$v%");
    }
}
