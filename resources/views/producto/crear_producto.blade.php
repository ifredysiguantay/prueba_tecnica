@extends('producto.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Crear un nuevo producto</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('productos.index') }}"> Regresar</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Warning!</strong> Please check your input code<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
     <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Tipo de producto:</strong>
                <input type="text" name="tipo_producto" class="form-control" placeholder="Tipo de producto" required>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Nombre de producto:</strong>
                <input type="text" name="nombre_producto" class="form-control" placeholder="Nombre de producto" required>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Precio unitario:</strong>
                <input type="number" min="0" name="precio_unitario" class="form-control" placeholder="Precio" required>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Fecha precio:</strong>
                <input type="date" name="fecha_precio" class="form-control" placeholder="Fecha Precio" required>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Fecha ingreso a bodega:</strong>
                <input type="date" name="fecha_bodega" class="form-control" placeholder="Fecha Precio" required>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Unidades vendidas:</strong>
                <input type="number" min="0" name="unidades_vendidas" class="form-control" onfocusout="myFunction()" placeholder="Unidades vendidas" required>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Ventas:</strong>
                <input type="number" min="0" name="ventas" class="form-control" placeholder="Ventas" >
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Ultima semana con unidades vendidas:</strong>
                <input type="text" name="ultima_semana_unidades_vendidas" class="form-control" placeholder="Ventas" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
   
</form>
<script>
function myFunction() {
    var unidades_vendidas= document.getElementsByName("unidades_vendidas")[0].value;
    var precio_unitario = document.getElementsByName("unidades_vendidas")[0].value;
    document.getElementsByName('ventas')[0].value = unidades_vendidas*precio_unitario;
}
</script>
@endsection