@extends('plantillas.plantilla')
@section('titulo')
Editar {{$vendedore->nombre}} {{$vendedore->apellidos}}
@endsection
@section('cabecera')
<div class='text-white text-center'>Actualizar información de {{$vendedore->apellidos}}, {{$vendedore->nombre}}</div>
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
<form name="c" method='POST' action="{{route('vendedores.update', $vendedore)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-row">
      <div class="col">
        <input type="text" class="form-control" value="{{$vendedore->nombre}}" name='nombre' required>
      </div>
      <div class="col">
        <input type="text" class="form-control" value="{{$vendedore->apellidos}}" name='apellidos' required>
      </div>
    </div>
    <div class="form-row mt-3">    
          <div class="col">
            <input type="text" class="form-control" value="{{$vendedore->email}}" name="email" required>
          </div>
          <div class="col">
            <input type="text" class="form-control" value="{{$vendedore->telefono}}" name="telefono" >
          </div>
      </div>
      <div class="form-row mt-3">
        <div class="col">
          <img src="{{asset($vendedore->imagen)}}" width="150vw" height="150vh" class='rounded-circle mr-3'>
          <b>Imagen</b>&nbsp;<input type='file' name='imagen' accept="image/*">
        </div>
      </div>
      <div class="form-row mt-3">
        <div class="col">
            <input type='submit' value='Modificar' class='btn btn-success mr-3'>
            <a href={{route('vendedores.index')}} class='btn btn-info'>Volver</a>
        </div>
    </div>
  </form>
@endsection 