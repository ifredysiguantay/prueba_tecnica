@extends('producto.layout')
@section('content')
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
            </div>
            <div class="form-group">
                <strong>Tipo de producto:</strong>
                {{ $tabla_uno->tipo_de_producto }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre de producto:</strong>
                {{ $tabla_uno->tipo_de_producto }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Precio unitario:</strong>
                {{ $tabla_uno->precio_unitario }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha precio:</strong>
                {{$tabla_uno->fecha_precio}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha ingreso a bodega:</strong>
                {{$tabla_dos[0]->fecha_ingreso_bodega}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Unidades vendidas:</strong>
                {{$tabla_tres[0]->unidades_vendidas}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ventas:</strong>
                {{$tabla_tres[0]->unidades_vendidas *  $tabla_uno->precio_unitario}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ultima semana con unidades vendidas:</strong>
                {{$tabla_tres[0]->numero_semana}}
            </div>
        </div>

    </div>
@endsection