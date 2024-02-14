<div class="panel-body">

    <!--Si redirigimos de algun lado con un mensaje, lo mostramos aqui-->
    @if(Session::has('message'))
      <div class="alert alert-primary" role="alert">
        {{ Session::get('message') }}
      </div>
    @endif

      <p class="h5">title:</p>
      <p class="h6 mb-3">{{ $incidencia->title }}</p>

      <p class="h5">Description:</p>
      <p class="h6 mb-3">{{ $incidencia->description }}</p>

      <p class="h5">Sucrusal:</p>
      <p class="h6 mb-3">{{ $incidencia->sucursal }}</p>

      <p class="h5">Imagen:</p>
      <img src="http//127.0.0.1:8000/storage/app/public/paquete1.bmp" class="img-fluid" width="20%">

    <a href="{{route('incidencias.index')}}">Listo</a>
</div>