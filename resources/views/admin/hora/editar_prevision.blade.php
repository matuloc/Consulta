@extends('admin.admin-cab.cabecera')
@section('content')
@include('admin.admin-cab.nav')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-2" align="center">
			<h1 align="left">Editar Blog</h1>
			<hr>
	    	@foreach($prevision as $prev)
	  			<form class="form-horizontal" method="POST" action="{{ route('admin.posteditar_prevision') }}">
	          		{{ csrf_field() }}
					<div class="col-md-7">
						<input name="id" class="form-control" type="hidden" value="{{ $prev->id }}"><br>
						<label for="nombre">Nombre:</label>
						<input name="nombre" class="form-control" type="text" value="{{ $prev->nombre_prevision }}" required><br>
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
								<dd>{{ date('j M, Y h:ia', strtotime($prev->created_at)) }}</dd>
							</dl>
							<dl class="dl-horizontal">
								<dt>Actualizado en:</dt>
								<dd>{{ date('j M, Y h:ia', strtotime($prev->updated_at)) }}</dd>
							</dl>
							<hr>
							<div class="row">
								<div class="col-sm-6">
									<button type="submit" class="btn btn-success btn-lg btn-block"> Actualizar</button>
								</div>
								<div class="col-sm-6">
									<a href="{{ route('admin.eliminar_prevision',['id'=>$prev->id]) }}" class="btn btn-danger btn-lg btn-block"> Eliminar</a>
								</div>
							</div>
						</div>
					</div>
	        </form>
	        @endforeach
		</div>
	</div>
</div>