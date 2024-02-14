

<div class="container-fluid">
<a href="{{ route('incidencias.create') }}" class="btn btn-success mt-4 ml-3"> Agregar incidencias</a><br><br>

@if(Session::has('message'))
    <div class="alert alert-primary" role="alert">
        {{ Session::get('message') }}
    </div>
@endif



<table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>title</th>
        <th>description</th>
        <th>sucursal</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($incidencias as $inci) <tr>
        <td class="v-align-middle">{{$inci->title}}</td>
        <td class="v-align-middle">{{$inci->description}} $</td>
        <td class="v-align-middle">{{$inci->sucursal}}</td>
        <td class="v-align-middle">
          <img src="http//127.0.0.1:8000/storage/app/public/paquete1.png" width="30" class="img-responsive">
        </td>
        <td class="v-align-middle">
          <form action="{{ route('incidencias.destroy',$inci->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <a href="{{ route('incidencias.show',$inci->id) }}" class="btn btn-dark">Detalles</a>
            <a href="{{ route('incidencias.edit',$inci->id) }}" class="btn btn-primary">Editar</a>
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </td>
      </tr>
      @endforeach
     </tbody>
  </table>
  <script type="text/javascript">
    function confirmarEliminar(){
        var x= confirm("Estas seguro de borrarlo?");
        if(x){
            return true;}
        else
            {return false;}
    }
    </script>
</div>