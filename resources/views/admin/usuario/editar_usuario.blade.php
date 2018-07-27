@extends('admin.admin-cab.cabecera')
@section('content')
@include('admin.admin-cab.nav')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-2" align="center">
			<h1 align="left">Editar Usuario</h1>
			<hr>
	    	@foreach($editar_usuario as $usuario)
	  			<form class="form-horizontal" method="POST" action="{{ route('admin.post_editarusuario') }}">
	          		{{ csrf_field() }}
					<div class="col-md-7">
						<input name="id" class="form-control" type="hidden" value="{{ $usuario->id }}"><br>
						<label for="nombre">Nombre:</label>
						<input name="nombre" class="form-control" type="text" value="{{ $usuario->name }}" required><br>
						<label for="nombre">Rut:</label>
						<input id="rut" placeholder="Rut" type="text" class="form-control" name="rut" value="{{ old('rut') }}" required autofocus><br>
		                          @if ($errors->has('rut'))
		                              <span class="help-block">
		                                  <strong class="text-dark">{{ $errors->first('rut') }}</strong>
		                              </span>
		                          @endif
						<label for="correo">Correo:</label>
						<input name="correo" class="form-control" type="text" value="{{ $usuario->email }}" required><br>
						<label for="body">Tipo Usuario:</label>
						<select name="tipo" class="form-control" required>
							@foreach($tipo_usuario as $tipo)
						  <option value="{{ $tipo->id }}">{{ $tipo->Tipo }}</option>
						  	@endforeach
						</select><br>
						<label for="body">Estado:</label>
						<select name="estado" class="form-control" required>
							@foreach($estados as $estado)
						  <option value="{{ $estado->id }}">{{ $estado->nombre_estado }}</option>
						  	@endforeach
						</select>
					</div>
					<div class="col-md-5">
						<div class="well">
							<dl class="dl-horizontal">
								<dt>Creado en:</dt>
								<dd>{{ date('j M, Y h:ia', strtotime($usuario->created_at)) }}</dd>
							</dl>
							<dl class="dl-horizontal">
								<dt>Actualizado en:</dt>
								<dd>{{ date('j M, Y h:ia', strtotime($usuario->updated_at)) }}</dd>
							</dl>
							<hr>
							<div class="row">
								<div class="col-sm-6">
									<button type="submit" class="btn btn-success btn-lg btn-block"> Actualizar</button>
								</div>
								<div class="col-sm-6">
									<a href="{{ route('admin.eliminar_usuario',['id'=>$usuario->id_usuario]) }}" class="btn btn-danger btn-lg btn-block"> Eliminar</a>
								</div>
							</div>
						</div>
					</div>
	        </form>
	        @endforeach
		</div>
	</div>
</div>
@endsection