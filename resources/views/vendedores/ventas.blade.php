@extends('plantillas.plantilla')
@section('titulo')
    {{$vendedore->nombre}} {{$vendedore->apellidos}}
@endsection
@section('cabecera')
    <i>Vendedor <b>{{$vendedore->apellidos}}, {{($vendedore->nombre)}}</b></i>
@endsection
@section('contenido')
    <span class="clearfix"></span>
    <div class="card text-white bg-info mt-5 mx-auto" style="max-width: 38rem;">
        <div class="card-header text-center"><b>Detalles de sus Ventas</b></div>
        <div class="card-body" style="font-size: 1.1em">
            <ul>
            @foreach ($vendidos as $item)
            <li>
            <a class='text-white' href='{{route('articulos.show', $item->id)}}'>{{$item->nombre}}</a>&nbsp;&nbsp;&nbsp;{{$item->unidades}} Unds.
            </li>
            @endforeach
        </ul>
            Ventas totales: {{$total}}
        </div>
        <a href="{{route('vendedores.show', $vendedore)}}" class="float-left btn btn-secondary">Volver a los datos del Vendedor</a>
        <a href="{{route('vendedores.index')}}" class="float-left btn btn-success">Ir a Vendedores</a>
    </div>
@endsection