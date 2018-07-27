@extends('admin.admin-cab.cabecera')
@section('content')
@include('admin.admin-cab.nav')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-2" align="center">
			@include('sweet::alert')
			<h1>Usuarios Registrados</h1>
			<hr>
			<div class="col-md-7" align="center">
				<table class="table table-hover">
				  <thead>
				    <tr>
				      <th>#</th>
				      <th>Nombre</th>
				      <th>Rut</th>
				      <th>Tipo de usuario</th>
				      <th>Estado</th>
				      <th>Editar</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($usuarios as $usuario)
				    <tr>
				      <th>{{ $contador }}</th>
				      <td>{{ $usuario->name }}</td>
				      <td>{{ $usuario->rut }}</td>
				      <td>{{ $usuario->Tipo }}</td>
				      <td>{{ $usuario->nombre_estado }}</td>
				      <td><a href="{{ route('admin.editar_usuario',['id'=>$usuario->id_usuario]) }}" class="btn btn-success btn-lg">editar</a></td>
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
							<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-default">Agregar Usuario</button>
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
                <h4 class="modal-title">Agregar Blog</h4>
            </div>
        	<div class="modal-body">
                <div class="form-group">
                	<form class="form-horizontal" method="POST" action="{{ route('admin.crear_usuario') }}">
		          		{{ csrf_field() }}
			        	<label for="nombre">Nombre:</label>
			        	<input name="nombre" class="form-control" type="text" required><br>
			        	<label for="rut">Rut:</label>
			        	<input name="rut" type="text" class="form-control" required><br>
			        	<label for="correo">Correo:</label>
			        	<input name="correo" class="form-control" type="email" required><br>
			        	<label for="tipo">Tipo de Usuario:</label>
			        	<select name="tipo" class="form-control" required>
							@foreach($tipo_usuario as $tipo)
						  		<option value="{{ $tipo->id }}">{{ $tipo->Tipo }}</option>
						  	@endforeach
						</select><br>
						<label for="estado">Estado:</label>
						<select name="estado" class="form-control" required>
							@foreach($estados as $estado)
						  <option value="{{ $estado->id }}">{{ $estado->nombre_estado }}</option>
						  	@endforeach
						</select><br>
			        	<button type="submit" class="btn btn-primary btn-lg btn-block">Agregar</button>
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