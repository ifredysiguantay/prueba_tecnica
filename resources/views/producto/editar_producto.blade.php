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
  
    <form action="{{ route('productos.update',$producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div class="row">

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Escoja una imagen:</strong>
                <div class="image-product" id ='img-product'style="background-image: url({{ route('images.displayImage',$producto->imagen) }})"></div>
                <input id="image" type="file"  value ="{{ $producto->imagen }}" name="imagen" accept="image/*">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value ="{{ $producto->nombre }}" required>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Descripcion:</strong>
                <input type="text" name="descripcion" class="form-control" placeholder="Descripcion" value ="{{ $producto->descripcion }}"required>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Precio:</strong>
                <input type="number" name="precio" class="form-control" placeholder="Precion" value ="{{ $producto->precio }}" required>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Fecha de vencimiento:</strong>
                <input type="date" name="fechadeexpiracion" class="form-control" placeholder="Fecha" value ="{{ $producto->fechadeexpiracion }}"required>
            </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
   
    </form>
<script type='text/javascript'>
  function preview_image(event) 
  {
   var reader = new FileReader();
   reader.onload = function()
   {
    var output = document.getElementById('img-product');
    output.src = reader.result;
   }
   reader.readAsDataURL(event.target.files[0]);
  }
  </script>
@endsection
