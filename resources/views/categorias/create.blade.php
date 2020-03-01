@extends('plantillas.plantilla')
@section('titulo')
Nueva Categoría
@endsection
@section('cabecera')
<div class='text-white text-center'>Guardar una Nueva Categoría</div>
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
<form name="c" method='POST' action="{{route('categorias.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Nombre" name='nombre' required>
      </div>
    </div>
      <div class="form-row mt-3">
          <textarea name='descripcion' class="form-control" placeholder="Descripción"></textarea>
      </div>
      <div class="form-row mt-3">
        <div class="col">
            <input type='submit' value='Guardar' class='btn btn-success mr-3'>
            <input type='reset' value='Limpiar' class='btn btn-warning mr-3'>
            <a href={{route('categorias.index')}} class='btn btn-info'>Volver</a>
        </div>
    </div>
  </form>
@endsection 