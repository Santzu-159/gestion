<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ventas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("articulo_id")->unsigned();
            $table->bigInteger("vendedor_id")->unsigned();
            $table->integer("unidades")->nullable();
            $table->timestamps();

            $table->foreign("articulo_id")
                ->references("id")
                ->on("articulos")
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->foreign("vendedor_id")
                ->references("id")
                ->on("vendedors")
                ->onDelete("cascade")
                ->onUpdate("cascade");
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
