@extends('plantillas.plantilla')
@section('titulo')
    {{$vendedor->nombre}} {{$vendedor->apellidos}}
@endsection
@section('cabecera')
<h1 class='text-white text-center'><i>Vendedor <b>{{$vendedor->apellidos}}, {{($vendedor->nombre)}}</b></i></h1>
@endsection
@section('contenido')
    <span class="clearfix"></span>
    <div class="card text-white bg-info mt-5 mx-auto" style="max-width: 38rem;">
        <div class="card-header text-center"><b>Detalles del Vendedor</b></div>
        <div class="card-body" style="font-size: 1.1em">
            <p><b>Nombre:</b> {{$vendedor->nombre}}</p>
            <p><b>Apellidos:</b> {{$vendedor->apellidos}}</p>
            <p><b>Email: </b>{{$vendedor->email}}</p>
            <p><b>Telefono: </b>{{$vendedor->telefono}}</p>            
            
        <a href="{{route('vendedores.ventas', $vendedor)}}" class="float-left btn btn-secondary">Ventas</a>
        <a href="{{route('vendedores.index')}}" class="float-left btn btn-success">Volver</a>
        </div>
    </div>
@endsection