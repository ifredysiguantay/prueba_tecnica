@extends('producto.layout')
   
@section('content')
<style>
.image-product{
    width: 200px;
    height: 200px;
    -webkit-border-radius: 200px;
    -webkit-background-clip: padding-box;
    -moz-border-radius: 200px;
    -moz-background-clip: padding;
    border-radius:200px;
    background-clip: padding-box;
    margin: 7px 0 0 5px;
   /*float: left;*/
    background-size: cover;
    background-position: center center;
}
</style>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Producto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('productos.index') }}"> Regresar</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Peligro!</strong> Por favor revise los datos de entrada<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('productos.update',$tabla_uno->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
        <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Tipo de producto:</strong>
                <input type="text" name="tipo_producto" class="form-control" placeholder="Tipo de producto" value="{{$tabla_uno->tipo_de_producto}}" required>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Nombre de producto:</strong>
                <input type="text" name="nombre_producto" class="form-control" placeholder="Nombre de producto" value ="{{$tabla_uno->nombre_producto}}" required>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Precio unitario:</strong>
                <input type="number" min="0" name="precio_unitario" class="form-control" placeholder="Precio" value ="{{$tabla_uno->precio_unitario}}" required>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Fecha precio:</strong>
                <input type="date" name="fecha_precio" class="form-control" placeholder="Fecha Precio" value ="{{$tabla_uno->fecha_precio}}" required>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Fecha ingreso a bodega:</strong>
                <input type="date" name="fecha_bodega" class="form-control" placeholder="Fecha Precio" value = "{{$tabla_dos[0]->fecha_ingreso_bodega}}" required>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Unidades vendidas:</strong>
                <input type="number" min="0" name="unidades_vendidas" class="form-control" onfocusout="myFunction()" onchange="checkTextbox(this)" placeholder="Unidades vendidas" value="{{$tabla_tres[0]->unidades_vendidas}}"required>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Ventas:</strong>
                <input type="number" min="0" name="ventas" class="form-control" value="{{$tabla_tres[0]->unidades_vendidas *  $tabla_uno->precio_unitario}}" placeholder="Ventas" >
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Ultima semana con unidades vendidas:</strong>
                <input type="text" name="ultima_semana_unidades_vendidas" class="form-control" value = "{{$tabla_tres[0]->numero_semana}}" placeholder="Ventas" >
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
    var precio_unitario = document.getElementsByName("precio_unitario")[0].value;
    document.getElementsByName('ventas')[0].value = unidades_vendidas*precio_unitario;
}
function checkTextbox(element){
    var precio_unitario= document.getElementsByName("precio_unitario")[0].value;
    var unidades_vendidas = element.value;
    document.getElementsByName('ventas')[0].value = unidades_vendidas*precio_unitario;
    
}
</script>

@endsection
