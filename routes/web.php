<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('vendedores/{vendedore}/ventas', 'VendedorController@ventas')->name('vendedores.ventas');
Route::get('articulos/{articulo}/vender', 'ArticuloController@vender')->name('articulos.vender');

Route::resource("articulos", "ArticuloController");
Route::resource("categorias", "CategoriaController");
Route::resource("vendedores", "VendedorController");

Route::post("vender", "ArticuloController@venta")->name("articulos.venta");