<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;

class Articulo extends Model
{
    protected $fillable=["nombre", "categoria_id", "precio", "stock", "imagen"];

    public function categoria(){
        return $this->belongsTo(Categoria::class)->withDefault(['nombre'=>'Otra']);
    }

    public function vendedores(){
           return $this->belongsToMany("App\Vendedor")->withPivot("unidades")->withTimestamps();
    }

    public function scopeNombre($query, $v){
        return $query->where('nombre','like',"%$v%");
    }

    public function scopeCategoria($query, $v){
        return $query->where('categoria_id','like',"%$v%");
    }

    public function scopePrecio($query, $v){
        switch($v){
            case 0:
                return $query->where('precio','>',0);
            break;
            case 1:
                return $query->where('precio','<',50);
            break;
            case 2:
                return $query->where('precio','>',50)
                ->where('precio','<',10);
            break;
            case 3:
                return $query->where('precio','>',100);
            break;
        }
    }
}
