@extends('plantillas.plantilla')
@section('titulo')
    Vender {{$articulo->nombre}}
@endsection
@section('cabecera')
    <h1 class='text-white text-center'>{{$articulo->nombre}}</h1>
@endsection
@section('contenido')
    <span class="clearfix"></span>
    @if ($articulo->stock==0)
    <div class="card bg-danger mt-5 mx-auto" style="max-width: 38rem;">
        <div class="card-body" style="font-size: 1.1em">
            <h2 class='text-warning'>¡No se encuentra stock disponible!</h2>        
    @else        
    <div class="card bg-warning mt-5 mx-auto" style="max-width: 38rem;">
        <div class="card-header text-center"><b>Venta del Producto {{$articulo->nombre}}</b></div>
        <div class="card-body" style="font-size: 1.1em">                    
            <form method='POST' action="{{route('articulos.venta')}}">
                @csrf
                <div class="float-right"><img src="{{asset($articulo->imagen)}}" width="160px" heght="160px" class="rounded-circle"></div>
            <p><b>Precio:</b> {{$articulo->precio}}€</p>
            <label for='stock'><b>Stock:</b></label>
            <input class='text-center' name='stock' type='number' value="{{$articulo->stock}}" size='1' min='1' max='{{$articulo->stock}}' step='1'>
            <b>Unidades</b>
            <br>
            <label for='vendedor'><b>Vendedor:</b></label>
            <select name='vendedor'>
                @foreach ($vendedores as $vendedor)
            <option value='{{$vendedor->id}}'>{{$vendedor->apellidos}}, {{$vendedor->nombre}}</option>
                @endforeach
          </select>
          <br><br><br>
          <input type='submit' class='float-left btn btn-danger' value='Vender'>
        <input type='hidden' name='articulo' value='{{$articulo->id}}'>
        <input type='hidden' name='nombre' value='{{$articulo->nombre}}'>
        <input type='hidden' name='stockInicial' value='{{$articulo->stock}}'>        
    </form>
        @endif        
        <a href="{{route('articulos.index')}}" class="float-right btn btn-success">Volver</a>
    </div>
        </div>
@endsection