@extends('admin.admin-cab.cabecera')
@section('content')
@include('admin.admin-cab.nav')

<div class="container">
	<div class="row">
		@include('sweet::alert')
		<div class="col-md-8 col-md-offset-2" align="center">
			<h1>Mensajes</h1>
			<hr>
			@if($contar_mensajes!=0)
			<table class="table table-hover">
			  <thead>
			    <tr>
			      <th>#</th>
			      <th>Nombre</th>
			      <th>Correo</th>
			      <th>Asunto</th>
			      <th>Fecha</th>
			      <th>Ver</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($mensajes_lista as $mensajes)
			    <tr>
			      <th>{{ $contador }}</th>
			      <td>{{ $mensajes->nombre }}</td>
			      <td>{{ $mensajes->correo }}</td>
			      <td>{{ $mensajes->asunto }}</td>
			      <td>{{ date('j M, Y', strtotime($mensajes->created_at)) }}</td>
			      <td><a href="{{ route('admin.ver_mensajes',['id'=>$mensajes->id]) }}" class="btn btn-primary btn-block">Ver</a></td>
			    </tr>
			    <?php $contador++ ?>
			    @endforeach
			  </tbody>
			</table>
			@else
				<h4>No hay mensajes</h4>
			@endif
		</div>
	</div>
</div>
@endsection
