@extends('producto.layout')
@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buscar producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Busqueda:</label>
            <input type="text" class="form-control" id="recipient-search">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="search-information" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div>


    <div class="row">
        <div class="col-lg-6 margin-tb">
            <div class="pull-left">
                <h2>Listado de productos</h2>
            </div>
            <div class="pull-right py-4">
                <a class="btn btn-success" href="{{ route('productos.create') }}"> Crear nuevo producto</a>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal" >Buscar</button>
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
                    <a class="btn btn-secondary mx-2" href="/products_chart/{{$t->id}}">Grafica</a>
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
<script>
$(document).on('click','#search-information',function(e){
    let search_field = $('#recipient-search').val();
    if(search_field==''){
        return swal('El campo de busqueda no puede estar vacio');
    }
    $.ajax({
        type:'get',
        url:'/api/search/'+search_field,
        dataType:'json',
        success:function(data){
            if(data.result==0){
                $('#recipient-search').val('');
                swal('No se encontraron resultados para tu busqueda')
            }else{
                swal('Producto encontrado').then((value) => {
                    window.location.href = '/productos/'+data.result;
                });
            }
        }
    });
});
</script>
@endsection