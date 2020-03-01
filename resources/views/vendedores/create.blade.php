@extends('plantillas.plantilla')
@section('titulo')
Nuevo Vendedor
@endsection
@section('cabecera')
<div class='text-white text-center'>Dar de Alta a un Nuevo Vendedor</div>
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
<form name="c" method='POST' action="{{route('vendedores.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Nombre" name='nombre' required>
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Apellidos" name='apellidos' required>
      </div>
    </div>
    <div class="form-row mt-3">    
          <div class="col">
            <input type="text" class="form-control" placeholder="Email" name="email" required>
          </div>
          <div class="col">
            <input type="text" class="form-control" placeholder="Teléfono" name="telefono" >
          </div>
      </div>
      <div class="form-row mt-3">
        <div class="col">
            <b>Imagen</b>&nbsp;<input type='file' name='imagen' accept="image/*">
        </div>
      </div>
      <div class="form-row mt-3">
        <div class="col">
            <input type='submit' value='Guardar' class='btn btn-success mr-3'>
            <input type='reset' value='Limpiar' class='btn btn-warning mr-3'>
            <a href={{route('vendedores.index')}} class='btn btn-info'>Volver</a>
        </div>
    </div>
  </form>
@endsection 