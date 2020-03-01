@extends('plantillas.plantilla')
@section("titulo")
Gestión de ventas
@endsection
@section("cabecera")
<div class='text-white text-center'>Gestion Articulos</div>
@endsection
@section("contenido")
@if ($text=Session::get("mensaje"))
    <p class="alert alert-success my-3">{{$text}}</p>
@endif
<a href="{{route('articulos.create')}}" class="btn btn-info mb-3">Crear articulo</a>
<form name="search" method="get" action="{{route('articulos.index')}}" class="form-inline float-right">
  <i class="fa fa-search fa-2x ml-2 mr-2" aria-hidden="true"></i>
  <input type='text' name='nombre' placeholder="Nombre del producto">&nbsp;
   <select name='categoria' class='form-control mr-2' onchange="this.form.submit()">
    <option value='%'>Cualquier categoria</option>
    @foreach($categorias as $categoria)
      @if($categoria->id==$request->categoria)
        <option value='{{$categoria->id}}' selected>{{$categoria->nombre}}</option>
      @else
        <option value='{{$categoria->id}}'>{{$categoria->nombre}}</option>
      @endif
    @endforeach
  </select> 
  <select name="precio" class="form-control" onchange="this.form.submit()">
  <option value='0'>Cualquier precio</option>
  @foreach ($precios as $index=>$precio)
  @if(($index+1)==$request->precio)
  <option selected="" value="{{$index+1}}">{{$precio}}</option>
@else
  <option value="{{$index+1}}">{{$precio}}</option>
@endif
  @endforeach
 </select> 
  <input type="submit" value="Buscar" class="btn btn-info ml-2">
</form>
</form>
 <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Detalles</th>
      <th scope="col" class="align-middle">Nombre</th>
      <th scope="col" class="align-middle">Categoria</th>
      <th scope="col" class="align-middle">Imagen</th>
      <th scope="col" class="align-middle">Acciones</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($articulos as $articulo)
        <tr>
            <th scope="row align-middle">
                <a href="{{route('articulos.show', $articulo)}}" class="btn btn-success">Detalles</a>
            </th>
            <td class="align-middle">{{$articulo->nombre}}</td>
            <td class="align-middle">{{$articulo->categoria->nombre}}</td>
            <td class="align-middle">
            <img src="{{asset($articulo->imagen)}}" class="img-fluid rounded-circle" width="80px" height="80px">
            </td>
            <td class="align-middle" style="white-space: nowrap;">
            <form class="form-inline" name='del' action='{{route('articulos.destroy', $articulo)}}' method='POST'>
              @method("DELETE")
              @csrf
              <button type="submit" onclick="return confirm('¿Borrar articulo?')" class="btn btn-danger">Borrar</button>
              <a href="{{route('articulos.edit',$articulo)}}" class="ml-2 btn btn-warning">Editar</a>
            </form>
            </td>
        </tr>
      @endforeach
  </tbody>
</table>
{{$articulos->appends(Request::except("page"))->links()}}
@endsection