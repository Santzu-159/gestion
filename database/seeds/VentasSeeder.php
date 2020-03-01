<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ventas'); 
        DB::table('ventas')->insert([
            'articulo_id' => '2',
            'vendedor_id' => '1',
            'unidades' => '9',
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now()  # new \Datetime()
        ]);
        DB::table('ventas')->insert([
            'articulo_id' => '2',
            'vendedor_id' => '2',
            'unidades' => '20',
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now()  # new \Datetime()
        ]);
        DB::table('ventas')->insert([
            'articulo_id' => '1',
            'vendedor_id' => '2',
            'unidades' => '67',
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now()  # new \Datetime()
        ]);
        DB::table('ventas')->insert([
            'articulo_id' => '3',
            'vendedor_id' => '4',
            'unidades' => '5',
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now()  # new \Datetime()
        ]);
        DB::table('ventas')->insert([
            'articulo_id' => '4',
            'vendedor_id' => '4',
            'unidades' => '12',
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now()  # new \Datetime()
        ]);
        DB::table('ventas')->insert([
            'articulo_id' => '5',
            'vendedor_id' => '3',
            'unidades' => '100',
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now()  # new \Datetime()
        ]);
        DB::table('ventas')->insert([
            'articulo_id' => '6',
            'vendedor_id' => '4',
            'unidades' => '44',
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now()  # new \Datetime()
        ]);
    }
}
