@extends('plantillas.plantilla')
@section("titulo")
Gestión de ventas
@endsection
@section("cabecera")
<div class='text-white text-center'>Gestion Categorías</div>
@endsection
@section("contenido")
@if ($text=Session::get("mensaje"))
    <p class="alert alert-success my-3">{{$text}}</p>
@endif
<a href="{{route('categorias.create')}}" class="btn btn-info mb-3">Crear categoria</a>
<!--Búsquedas-->
<form action="{{route('categorias.index')}}" name="search" method="get" class="form-inline float-right">
  <i class="fa fa-search fa-2x ml-2 mr-2" aria-hidden="true"></i>
  <input type='text' name='nombre' placeholder="Buscar por Nombre">
  <input type="submit" value="Buscar" class="btn btn-info ml-2">
</form>
 <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Detalles</th>
      <th scope="col" class="align-middle">Nombre</th>
      <th scope="col" class="align-middle">Acciones</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($categorias as $categoria)
        <tr>
            <th scope="row align-middle">
                <a href="{{route('categorias.show', $categoria)}}" class="btn btn-success">Detalles</a>
            </th>
            <td class="align-middle">{{$categoria->nombre}}</td>
            <td class="align-middle" style="white-space: nowrap;">
            <form class="form-inline" name='del' action='{{route('categorias.destroy', $categoria)}}' method='POST'>
              @method("DELETE")
              @csrf
              <button type="submit" onclick="return confirm('¿Borrar categoria?')" class="btn btn-danger">Borrar</button>
              <a href="{{route('categorias.edit',$categoria)}}" class="ml-2 btn btn-warning">Editar</a>
            </form>
            </td>
        </tr>
      @endforeach
  </tbody>
</table>
{{$categorias->appends(Request::except("page"))->links()}}
@endsection