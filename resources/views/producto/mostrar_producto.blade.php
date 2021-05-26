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
    border-radius: 200px;
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
                <h2> Detalle producto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('productos.index') }}"> Regresar</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <strong>Imagen:</strong>
                <div class="image-product" style="background-image: url({{ route('images.displayImage',$producto->imagen) }})"></div>

            </div>
            <div class="form-group">
                <strong>Nombre:</strong>
                {{ $producto->nombre }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion:</strong>
                {{ $producto->descripcion }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Precio:</strong>
                {{ $producto->precio }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha de Expiracion:</strong>
                {{ $producto->fechadeexpiracion }}
            </div>
        </div>
    </div>
@endsection