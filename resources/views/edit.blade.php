<!--form para el actualizar/editar, la ruta va al web.php y de ahi al metodo del controlador update-->
<form method="POST" action="{{ route('incidencias.update',$incidencia->id) }}" role="form" enctype="multipart/form-data">

    <!--Le digo que es put, equivalente a @ method('put')-->
    <input type="hidden" name="_method" value="PUT">

    <!--Mando el token de seguridad, equivalente a @ scrf
        Cross-site Request Forgery o en español Falsificación de Petición en Sitios Cruzados-->
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

   <!--Este formulario es para crear o actualizar registros en la tabla incidencias -->
<div class="mb3">
    <label for="nombre" class="negrita">title:</label>
    <div>
        <input class="form-control" placeholder="Zapatos Marrones de Cuero" required="required" name="title" type="text" id="title" value="{{ $incidencia->title }}">
    </div>
</div>

<div class="mb3">
    <label for="precio" class="negrita">description:</label>
    <div>
        <input class="form-control" placeholder="4.50" required="required" name="description" type="text" id="description" value="{{ $incidencia->description }}">
    </div>
</div>

<div class="mb3">
    <label for="stock" class="negrita">sucursal:</label>
    <div>
        <input class="form-control" placeholder="40" required="required" name="sucursal" type="text" id="sucursal" value="{{ $incidencia->sucursal }}">
    </div>
</div>

<button type="submit" class="btn btn-info">Guardar</button>
<a href="{{ route('incidencias.index') }}" class="btn btn-warning">Cancelar</a>

<br>
<br>

</form>


