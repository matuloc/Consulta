@extends('admin.admin-cab.cabecera')
@section('content')
@include('admin.admin-cab.nav')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-2" align="center">
			@include('sweet::alert')
			<h1>Especialidad</h1>
			<hr>
			<div class="col-md-7" >
				<table class="table table-hover" id="tabla_especialidad">
			  <thead>
			    <tr>
			      <th>#</th>
			      <th>Nombre</th>
			      <th>Descripción</th>
			      <th>Estado</th>
			      <th>Fecha Agregada</th>
			      <th>Última Modificación</th>
			      <th>Editar</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($especialidades as $especialidad)
			    <tr>
			      <td>{{ $contador }}</td>
			      <td>{{ $especialidad->nombre_especialidad }}</td>
			      <td>{{ $especialidad->descripcion }}</td>
			      <td>{{ $especialidad->nombre_estado }}</td>
			      <td>{{ date('j M, Y', strtotime($especialidad->created_at)) }}</td>
			      <td>{{ date('j M, Y', strtotime($especialidad->updated_at)) }}</td>
			      <td><a href="{{ route('admin.editar_especialidad',['id'=>$especialidad->id]) }}" class="btn btn-success btn-lg">editar</a></td>
			    </tr>
			    <?php $contador++ ?>
			    @endforeach
			  </tbody>
			</table>
			</div>
			<div class="col-md-5">
				<div class="well">
					<div class="row">
						<div class="col-sm-6">
							<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-default">Agregar nueva Especialidad</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-10 col-md-offset-2" align="center">
		<hr>
		</div>
		<div class="col-md-10 col-md-offset-2" align="center">
			<h1>Previsión</h1>
			<hr>
			<div class="col-md-7">
				<table class="table table-hover">
			  	<thead>
			    <tr>
			      <th>#</th>
			      <th>Nombre</th>
			      <th>Estado</th>
			      <th>Fecha Agregada</th>
			      <th>Última Modificación</th>
			      <th>Editar</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($prevision as $prevision)
			    <tr>
			      <td>{{ $contador2 }}</td>
			      <td>{{ $prevision->nombre_prevision }}</td>
			      <td>{{ $prevision->nombre_estado }}</td>
			      <td>{{ date('j M, Y', strtotime($prevision->created_at)) }}</td>
			      <td>{{ date('j M, Y', strtotime($prevision->updated_at)) }}</td>
			      <td><a href="{{ route('admin.editar_prevision',['id'=>$prevision->id]) }}" class="btn btn-success btn-lg">editar</a></td>
			    </tr>
			    <?php $contador2++ ?>
			    @endforeach
			  </tbody>
			</table>
			</div>
			<div class="col-md-5">
				<div class="well">
					<div class="row">
						<div class="col-md-4">
							<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-default2">Agregar nueva Previsión</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Ventana emergente -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"></span></button>
                <h4 class="modal-title">Agregar Especialidad</h4>
            </div>
        	<div class="modal-body">
                <div class="form-group">
                	<form class="form-horizontal" method="POST" action="{{ route('admin.post_especialidad') }}">
		          		{{ csrf_field() }}
			        	<label for="nombre">Nombre:</label>
			        	<input name="nombre" class="form-control" type="text"><br>
			        	<label for="body">Descripción:</label>
			        	<textarea name="descripcion" class="form-control" ></textarea><br>
			        	<label for="body">Estado:</label>
						<select name="estado" class="form-control" required>
							@foreach($estados as $estado)
						  <option value="{{ $estado->id }}">{{ $estado->nombre_estado }}</option>
						  	@endforeach
						</select><br>
			        	<button type="submit" class="btn btn-primary btn-lg btn-block"> Agregar</button>
			      	</form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-lg btn-block" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin Ventana emergente -->
<!-- Ventana emergente -->
<div class="modal fade" id="modal-default2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"></span></button>
                <h4 class="modal-title">Agregar Previsió</h4>
            </div>
        	<div class="modal-body">
                <div class="form-group">
                	<form class="form-horizontal" method="POST" action="{{ route('admin.post_prevision') }}">
		          		{{ csrf_field() }}
			        	<label for="nombre">Nombre:</label>
			        	<input name="nombre" class="form-control" type="text"><br>
			        	<label for="body">Estado:</label>
						<select name="estado" class="form-control" required>
							@foreach($estados as $estado)
						  <option value="{{ $estado->id }}">{{ $estado->nombre_estado }}</option>
						  	@endforeach
						</select><br>
			        	<button type="submit" class="btn btn-primary btn-lg btn-block"> Agregar</button>
			      	</form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-lg btn-block" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin Ventana emergente -->

@endsection
