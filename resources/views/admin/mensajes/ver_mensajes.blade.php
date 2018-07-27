@extends('admin.admin-cab.cabecera')
@section('content')
@include('admin.admin-cab.nav')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-2" align="center">
			<h1 align="left">Mensajes</h1>
			<hr>
			@foreach($mensajes_id as $message)
			<div class="col-md-7">
				<label for="nombre">Nombre:</label>
				<input name="nombre" class="form-control" placeholder="{{ $message->nombre }}" disabled><br>
				<label for="correo">Correo:</label>
				<input name="correo" class="form-control" placeholder="{{ $message->correo }}" disabled><br>
				<label for="titulo">Asunto:</label>
				<input name="titulo" class="form-control" placeholder="{{ $message->asunto }}" disabled><br>
				<label for="body">Descripción:</label>
					<textarea name="descripcion" class="form-control" disabled rows="5">{{ $message->mensaje }}</textarea>
			</div>

			<div class="col-md-5">
				<div class="well">
					<dl class="dl-horizontal" >
						<dt>Recibido el:</dt>
						<dd>{{ date('j M, Y h:ia', strtotime($message->created_at)) }}</dd>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<a href="{{ route('eliminar.mensaje',['id'=>$message->id]) }}" class="btn btn-danger btn-lg btn-block"> Eliminar</a>
						</div>
					</div>
				</div>
			</div>
				@endforeach
		</div>
	</div>
</div>
@endsection
