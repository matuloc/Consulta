@extends('admin.admin-cab.cabecera')
@section('content')
@include('admin.admin-cab.nav')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-2" align="center">
			@include('sweet::alert')
			<h1 align="left">Editar Blog</h1>
			<hr>
	    	@foreach($blog_post as $blog)
	  			<form class="form-horizontal" method="POST" action="{{ route('admin.actualizar_blog',['id'=>$blog->id]) }}">
	          		{{ csrf_field() }}
					<div class="col-md-7">
						<label for="titulo">Titulo:</label>
						<input name="titulo" class="form-control" type="text" value="{{ $blog->titulo }}"><br>
						<label for="body">Descripción:</label>
						<textarea id="summernote" name="descripcion" class="form-control" >{{ $blog->descripcion }}</textarea><br>
					</div>
					<div class="col-md-5">
						<div class="well">
							<dl class="dl-horizontal">
								<dt>Creado en:</dt>
								<dd>{{ date('j M, Y h:ia', strtotime($blog->created_at)) }}</dd>
							</dl>
							<dl class="dl-horizontal">
								<dt>Actualizado en:</dt>
								<dd>{{ date('j M, Y h:ia', strtotime($blog->updated_at)) }}</dd>
							</dl>
							<hr>
							<div class="row">
								<div class="col-sm-6">
									<button type="submit" class="btn btn-success btn-lg btn-block"> Actualizar</button>
								</div>
								<div class="col-sm-6">
									<a href="{{ route('admin.eliminar_blog',['id'=>$blog->id]) }}" class="btn btn-danger btn-lg btn-block"> Eliminar</a>
								</div>
							</div>
						</div>
					</div>
	        </form>
	        @endforeach
		</div>
	</div>
</div>
<script type="text/javascript">
        $(document).ready(function() {
      $('#summernote').summernote({
      	height: 150,

        });
    });
    </script>
@endsection