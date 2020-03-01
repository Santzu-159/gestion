@extends('plantillas.plantilla')
@section('titulo')
    {{$categoria->nombre}}
@endsection
@section('contenido')
    <span class="clearfix"></span>
    <div class="card text-white bg-info mt-5 mx-auto" style="max-width: 38rem;">
        <div class="card-header text-center"><b>Detalles de la Categoria</b></div>
        <div class="card-body" style="font-size: 1.1em">
            <p><b>Categoria:</b> {{$categoria->nombre}}</p>
            <p><b>Descripción:</b> {{$categoria->descripcion}}</p>
        </div>
        <a href="javascript:history.back()" class="float-left btn btn-success">Volver</a>
    </div>
@endsection