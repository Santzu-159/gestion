<?php

use Illuminate\Database\Seeder;
use App\Articulo;
use Illuminate\Support\Facades\DB;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articulos');
        Articulo::create([
            'nombre'=>'Jerseys De Punto',
            'categoria_id'=>'1',
            'precio'=>'5.99',
            'stock'=>'20',
            'imagen'=>'/img/articulos/jerseys-de-punto.jpg'
        ]);
        Articulo::create([
            'nombre'=>'K-youth Sudaderas',
            'categoria_id'=>'1',
            'precio'=>'4.38',
            'stock'=>'32',
            'imagen'=>'/img/articulos/k-youth-sudaderas.jpg'
        ]);
        Articulo::create([
            'nombre'=>'Iris Ohyama Perchero',
            'categoria_id'=>'2',
            'precio'=>'44.60',
            'stock'=>'12',
            'imagen'=>'/img/articulos/iris-ohyama-perchero.jpg'
        ]);
        Articulo::create([
            'nombre'=>'ARNTY Fundas de Cojines',
            'categoria_id'=>'2',
            'precio'=>'16.28',
            'stock'=>'60',
            'imagen'=>'/img/articulos/arnty-fundas-de-cojines.jpg'
        ]);
        Articulo::create([
            'nombre'=>'Xiaomi Redmi Airdots Bluetooth',
            'categoria_id'=>'3',
            'precio'=>'24.50',
            'stock'=>'43',
            'imagen'=>'/img/articulos/xiaomi-airdots.jpg'
        ]);
        Articulo::create([
            'nombre'=>'Viewsonic XG2405',
            'categoria_id'=>'3',
            'precio'=>'199',
            'stock'=>'3',
            'imagen'=>'/img/articulos/viewsonic.jpg'
        ]);
    }
}
