<!-- form para el crear, la ruta va al web.php y de ahi al metodo del controlador -->
<form method="POST" action="{{ route('incidencias.store') }}" role="form" enctype="multipart/form-data">

    <!--Le digo que es put, equivalente a @ method('put')-->
    @method('POST')
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
 



    <!--Este formulario es para crear o actualizar registros en la tabla incidencias -->
<div class="mb3">
    <label for="nombre" class="negrita">title:</label>
    <div>
        <input class="form-control" placeholder="Zapatos Marrones de Cuero" required="required" name="title" type="text" id="title" >
    </div>
</div>

<div class="mb3">
    <label for="precio" class="negrita">description:</label>
    <div>
        <input class="form-control" placeholder="4.50" required="required" name="description" type="text" id="description" >
    </div>
</div>

<div class="mb3">
    <label for="stock" class="negrita">sucursal:</label>
    <div>
        <input class="form-control" placeholder="40" required="required" name="sucursal" type="text" id="sucursal" >
    </div>
</div>


<button type="submit" class="btn btn-info">Guardar</button>
<a href="{{ route('incidencias.index') }}" class="btn btn-warning">Cancelar</a>
  </form>