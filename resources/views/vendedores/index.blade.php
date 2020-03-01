@extends('plantillas.plantilla')
@section("titulo")
Gestión de ventas
@endsection
@section("cabecera")
<div class='text-white text-center'>Gestion Vendedores</div>
@endsection
@section("contenido")
@if ($text=Session::get("mensaje"))
    <p class="alert alert-success my-3">{{$text}}</p>
@endif
<a href="{{route('vendedores.create')}}" class="btn btn-info mb-3">Crear vendedor</a>
<form action="{{route('vendedores.index')}}" name="search" method="get" class="form-inline mb-2 float-right">
  <input type='text' name='nombre' placeholder="Buscar por Nombre">&nbsp;
  <select name="ventas" class="form-control" onchange="this.form.submit()">
    <option value='0'>Cualquier cantidad</option>
    @foreach ($ventas as $index=>$venta)
    @if(isset($_GET['ventas']) && ($index+1)==$_GET['ventas'])
    <option selected value="{{$index+1}}">{{$venta}}</option>
  @else
    <option value="{{$index+1}}">{{$venta}}</option>
  @endif
    @endforeach
   </select> 
  <input type="submit" value="Buscar" class="btn btn-info ml-2">
</form>
 <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Detalles</th>
      <th scope="col" class="align-middle">Nombre</th>
      <th scope="col" class="align-middle">Email</th>
      <th scope="col" class="align-middle">Imagen</th>
      <th scope="col" class="align-middle">Acciones</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($vendedores as $vendedor)
        <tr>
            <th scope="row align-middle">
                <a href="{{route('vendedores.show', $vendedor)}}" class="btn btn-success">Detalles</a>
            </th>
            <td class="align-middle">{{$vendedor->apellidos}}, {{$vendedor->nombre}}</td>
            <td class="align-middle">{{$vendedor->email}}</td>
            <td class="align-middle">
            <img src="{{asset($vendedor->imagen)}}" class="img-fluid rounded-circle" width="80px" height="80px">
            </td>
            <td class="align-middle" style="white-space: nowrap;">
            <form class="form-inline" name='del' action='{{route('vendedores.destroy', $vendedor)}}' method='POST'>
              @method("DELETE")
              @csrf
              <button type="submit" onclick="return confirm('¿Borrar vendedor?')" class="btn btn-danger">Borrar</button>
              <a href="{{route('vendedores.edit',$vendedor)}}" class="ml-2 btn btn-warning">Editar</a>
            </form>
            </td>
        </tr>
      @endforeach
  </tbody>
</table>
{{$vendedores->appends(Request::except("page"))->links()}}  
@endsection