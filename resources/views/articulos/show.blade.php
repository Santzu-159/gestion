@extends('plantillas.plantilla')
@section('titulo')
    {{$articulo->nombre}}
@endsection
@section('cabecera')
    <h1 class='text-white text-center'>{{$articulo->nombre}}</h1>
@endsection
@section('contenido')
    <span class="clearfix"></span>
    <div class="card text-white bg-info mt-5 mx-auto" style="max-width: 38rem;">
        <div class="card-header text-center"><b>Detalles del Producto {{$articulo->nombre}}</b></div>
        <div class="card-body" style="font-size: 1.1em">
            <div class="float-right"><img src="{{asset($articulo->imagen)}}" width="160px" heght="160px" class="rounded-circle"></div>
            <p><b>Categoria:</b> {{$articulo->categoria->nombre}}</p>
            <p><b>Precio (€):</b> {{$articulo->precio}}</p>
            <p><b>Stock: </b>{{$articulo->stock." unidades"}}</p>
            <br><br>
            <a href="{{route('articulos.vender', $articulo)}}" class="btn btn-warning">Vender</a>
            <a href="{{route('articulos.index')}}" class="float-right btn btn-success">Volver</a>
        </div>
        
    </div>
@endsection