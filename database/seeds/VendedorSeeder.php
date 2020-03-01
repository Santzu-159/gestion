<?php

use Illuminate\Database\Seeder;
use App\Vendedor;
use Illuminate\Support\Facades\DB;

class VendedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendedors');
        Vendedor::create([
            'nombre'=>'David',
            'apellidos'=>'Puig Peralta',
            'email'=>'david.peralta@gmail.com',
            'telefono'=>'684 354 976',
            'imagen'=>'/img/vendedores/david.jpg'
        ]);
        Vendedor::create([
            'nombre'=>'Consuelo',
            'apellidos'=>'Grau Granda',
            'email'=>'abu-78@gmail.com',
            'telefono'=>'647 232 292',
            'imagen'=>'/img/vendedores/consuelo.jpg'
        ]);
        Vendedor::create([
            'nombre'=>'Olga',
            'apellidos'=>'Belda Juan',
            'email'=>'olga-lagrande@gmail.com',
            'telefono'=>'658 936 754',
            'imagen'=>'/img/vendedores/olga.jpg'
        ]);
        Vendedor::create([
            'nombre'=>'Eduardo',
            'apellidos'=>'Torrejon Muñoz',
            'email'=>'edu.torre94@gmail.com',
            'telefono'=>'648 780 321',
            'imagen'=>'/img/vendedores/eduardo.jpg'
        ]);
    }
}
