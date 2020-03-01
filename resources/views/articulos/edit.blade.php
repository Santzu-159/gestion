@extends('plantillas.plantilla')
@section('titulo')
Editar {{$articulo->nombre}}
@endsection
@section('cabecera')
<div class='text-white text-center'>Actualizar Artículo {{$articulo->nombre}}</div>
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
<form name="c" method='POST' action="{{route('articulos.update', $articulo)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-row">
      <div class="col">
      <input type="text" class="form-control" value="{{$articulo->nombre}}" name='nombre' required>
      </div>
    </div>
    <div class="form-row mt-3">
        <div class="col">
          <select name='categoria' class="form-control">
              @foreach ($categorias as $categoria)
                  @if ($articulo->categoria_id==$categoria->id)
                      <option selected>{{$categoria->nombre}}</option>
                  @else
                  <option>{{$categoria->nombre}}</option>
                  @endif
              @endforeach
        </select>
        </div>        
          <div class="col">
            <input type="number" class="form-control" value="{{$articulo->precio}}" name="precio" required step="0.50" min="0">
          </div>
          <div class="col">
            <input type="number" class="form-control" value="{{$articulo->stock}}" name="stock" min="0">
          </div>
      </div>
      <div class="form-row mt-3">
        <div class="col">
              <img src="{{asset($articulo->imagen)}}" width="150vw" height="150vh" class='rounded-circle mr-3'>
            <b>Imagen</b>&nbsp;<input type='file' name='imagen' accept="image/*">
        </div>
      </div>
      <div class="form-row mt-3">
        <div class="col">
            <input type='submit' value='Modificar' class='btn btn-success mr-3'>
            <a href={{route('articulos.index')}} class='btn btn-info'>Volver</a>
        </div>
    </div>
  </form>
@endsection 