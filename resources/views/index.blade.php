@extends('plantillas.plantilla')
@section("titulo")
Gestión de ventas
@endsection
@section("cabecera")
Gestión de ventas
@endsection
@section("contenido")
<div class="text-center mt-3">
    <a href="{{route('articulos.index')}}" class="btn btn-primary mr-4">Gestionar Articulos</a>
    <a href="{{route('categorias.index')}}" class="btn btn-primary mr-4">Gestionar Categorias</a>
    <a href="{{route('vendedores.index')}}" class="btn btn-primary mr-4">Gestionar Vendedores</a>
</div>
@endsection