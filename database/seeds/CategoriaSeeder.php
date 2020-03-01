<?php

use Illuminate\Database\Seeder;
use App\Categoria;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias');
        Categoria::create([
            'nombre'=>'Bazar',
            'descripcion'=>'Ropa, alimentación y bebidas'
        ]);
        Categoria::create([
            'nombre'=>'Hogar',
            'descripcion'=>'Productos del hogar'
        ]);
        Categoria::create([
            'nombre'=>'Electrónica',
            'descripcion'=>'Dispositivos electrónicos'
        ]);
    }
}
