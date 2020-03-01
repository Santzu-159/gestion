@extends('plantillas.plantilla')
@section('titulo')
    {{$vendedore->nombre}} {{$vendedore->apellidos}}
@endsection
@section('cabecera')
<h1 class='text-white text-center'><i>Vendedor <b>{{$vendedore->apellidos}}, {{($vendedore->nombre)}}</b></i></h1>
@endsection
@section('contenido')
    <span class="clearfix"></span>  
    <div class="card text-white bg-info mt-5 mx-auto" style="max-width: 38rem;">
        <div class="card-header text-center"><b>Detalles del Vendedor</b></div>
        <div class="card-body" style="font-size: 1.1em">
            <div class="float-right"><img src="{{asset($vendedore->imagen)}}" width="160px" heght="160px" class="rounded-circle"></div>
            <p><b>Nombre:</b> {{$vendedore->nombre}}</p>
            <p><b>Apellidos:</b> {{$vendedore->apellidos}}</p>
            <p><b>Email: </b>{{$vendedore->email}}</p>
            <p><b>Telefono: </b>{{$vendedore->telefono}}</p>            
            
        <a href="{{route('vendedores.ventas', $vendedore)}}" class="float-left btn btn-secondary">Ventas</a>
        <a href="{{route('vendedores.index')}}" class="float-right btn btn-success">Volver</a>
        </div>
    </div>
@endsection