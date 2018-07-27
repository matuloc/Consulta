@extends('admin.admin-cab.cabecera')
@section('content')
@include('admin.admin-cab.nav')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2" align="center">
			<h1>Horas Médicas</h1>
			@include('sweet::alert')
			<hr>
			<table class="table table-hover" id="tabla">
			  <thead>
			    <tr>
			      <th>#</th>
			      <th>Id Paciente</th>
			      <th>Nombre</th>
			      <th>Rut</th>
			      <th>Fecha</th>
			      <th>Estado</th>
			      <th>Ver</th>
			      <th>Eliminar</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($horas as $hora)
			    <tr>
			      <th>{{ $contador }}</th>
			      <td>{{ $hora->id_paciente }}</td>
			      <td>{{ $hora->nombre }}</td>
			      <td>{{ $hora->rut }}</td>
			      <td>{{ date('j M, Y', strtotime($hora->created_at)) }}</td>
			      <td>{{ $hora->nombre_estado_atencion }}</td>
			      <td><button type="button" class="btn btn-primary btn-block" id="ver" value="{{ $hora->id }}">Ver</button></td>
			      <td><a href="{{ route('admin.eliminar_hora_medica',['id'=>$hora->id]) }}" class="btn btn-danger btn-block">Eliminar</a></td>
			    </tr>
			    <?php $contador++ ?>
			    @endforeach
			  </tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <form class="form-horizontal" method="POST" action="{{ route('admin.actualizar_hora_medica') }}">
      		{{ csrf_field() }}
      	<div class="modal-body">

      	</div>
 	 </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	
<script>
	$(document).ready(function(){
		$('#tabla').click(function(e){
			var id=e.target.value;
	    	$('.modal-title').empty();
			$('.modal-body').empty();
	    	$.get('/ajax-ver?ver='+id, function(data){
      			$.each(data,function(index, info){
			    	if(info=="indefined")
			    	{
			    	}
			    	else
			    	{
			    		$('.modal-title').append('Hora Médica');
				    	$('.modal-body')
				    	.append('<input type="hidden" name="id" class="form-control" value="'+info.id_hora+'"><br>')
				    	.append('<label for="nombre">Id Paciente:</label>')
				    	.append('<input name="nombre" class="form-control" placeholder="'+info.id_paciente+'" disabled><br>')
				    	.append('<label for="rut">Nombre:</label>')
				    	.append('<input name="nombre" class="form-control" placeholder="'+info.nombre+'" disabled><br>')
				    	.append('<label for="nombre">Rut:</label>')
				    	.append('<input name="rut" class="form-control" placeholder="'+info.rut+'" disabled><br>')
				    	.append('<label for="especialidad">especialidad:</label>')
				    	.append('<input name="especialidad" class="form-control" placeholder="'+info.nombre_especialidad+'" disabled><br>')
				    	.append('<label for="prevision">Previsión:</label>')
				    	.append('<input name="prevision" class="form-control" placeholder="'+info.nombre_prevision+'" disabled><br>')
				    	.append('<label for="dia">Día:</label>')
				    	.append('<input name="dia" class="form-control" placeholder="'+info.dia+'" disabled><br>')
				    	.append('<label for="hora">Hora:</label>')
				    	.append('<input name="hora" class="form-control" placeholder="'+info.hora+'" disabled><br>')
				    	.append('<label for="estado">Estado:</label>')
				    	.append('<select name="estado" class="form-control" required>@foreach($estados as $estado)<option value="{{ $estado->id }}">{{ $estado->nombre_estado_atencion }}</option>@endforeach</select><br>	')
				    	.append('<button type="submit" class="btn btn-primary btn-lg btn-block"> Actualizar</button>');
				    	$('#myModal').modal('show');  	
				    }
				});
			});
		});
	});
</script>

@endsection
