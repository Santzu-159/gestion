<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $fillable=["nombre", "apellidos", "email", "telefono", "imagen"];

    public function articulos(){
        return $this->belongsToMany("App\Articulo")->withPivot("unidades")->withTimestamps();
    }

    public function scopeNombre($query, $v){
        return $query
        ->where('nombre','like',"%$v%")
        ->orwhere('apellidos','like',"%$v%");
    }
    
    public function scopeVentas($query, $v){
        switch($v){
            case 0:
                return $query;
            break;
            case 1:
                return $query->join('ventas', 'vendedor_id','vendedors.id')
                            ->havingRaw('sum(unidades)<50')
                            ->groupBy('vendedor_id');
            break;
            case 2:
                return $query->join('ventas', 'vendedor_id','vendedors.id')
                            ->havingRaw('sum(unidades)>50 and sum(unidades)<100')
                            ->groupBy('vendedor_id');
            break;
            case 3:
                return $query->join('ventas', 'vendedor_id','vendedors.id')
                            ->havingRaw('sum(unidades)>100')
                            ->groupBy('vendedor_id');
            break;
        }
    }
}
