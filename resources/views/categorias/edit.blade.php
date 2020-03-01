@extends('plantillas.plantilla')
@section('titulo')
Editar {{$categoria->nombre}}
@endsection
@section('cabecera')
<div class='text-white text-center'>Actualizar Categoría {{$categoria->nombre}}</div>
@endsection
@section('contenido')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $miError)
            <li>{{$miError}}</li>
            @endforeach
        </ul>
    </div>
@endif
<form name="c" method='POST' action="{{route('categorias.update', $categoria)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-row">
      <div class="col">
      <input type="text" class="form-control" value="{{$categoria->nombre}}" name='nombre' required>
      </div>
    </div>    
      <div class="form-row mt-3">
      <textarea name='descripcion' class="form-control">{{$categoria->descripcion}}</textarea>
    </div>
      <div class="form-row mt-3">
        <div class="col">
            <input type='submit' value='Modificar' class='btn btn-success mr-3'>
            <a href={{route('categorias.index')}} class='btn btn-info'>Volver</a>
        </div>
    </div>
  </form>
@endsection 