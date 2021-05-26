@extends('producto.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Listado de productos</h2>
            </div>
            <div class="pull-right py-4">
                <a class="btn btn-success" href="{{ route('productos.create') }}"> Crear nuevo producto</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Tipo de producto</th>
            <th>Nombre de producto</th>
            <th>Precio unitario</th>
            <th>Fecha de precio</th>
            <th>Fecha de ingreso bodega</th>
            <th>Unidades vendidas</th>
            <th>Ventas</th>
            <th>Ultima semana con unidades vendidas</th>
            <th width="250px">Accion</th>
        </tr>
        @foreach ($tabla_uno as $t)
        <tr>
            <td>{{ ++$i }}</td>
            <td><!--<a href="{{ route('productos.show',$t->id) }}">-->{{ $t->tipo_de_producto }}</a></td>
            <td>{{ $t->nombre_producto }}</td>
            <td>{{ $t->precio_unitario }}</td>
            <td>{{ $t->fecha_precio }}</td>
            <td>{{$tabla_dos[$loop->iteration - 1 ]->fecha_ingreso_bodega}}</td>
            @if($tabla_tres[$loop->iteration - 1 ])
            <td>{{$tabla_tres[$loop->iteration - 1 ]->unidades_vendidas}}</td>
            <td>{{$tabla_tres[$loop->iteration - 1 ]->unidades_vendidas*$t->precio_unitario}}</td>
            <td>{{$tabla_tres[$loop->iteration - 1 ]->numero_semana}}</td>
            @else
            <td></td>
            <td></td>
            <td></td>
            @endif
            <td>
                <form class="d-flex justify-content-center" action="{{ route('productos.destroy',$t->id) }}" method="POST">
    
                    <a class="btn btn-primary mx-2" href="{{ route('productos.edit',$t->id) }}">Editar</a>
   
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger mx-2">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
    {!! $tabla_uno->links() !!}
      
@endsection