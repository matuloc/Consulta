@extends('admin.admin-cab.cabecera')
@section('content')
@include('admin.admin-cab.nav')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-2" align="center">
			@include('sweet::alert')
			<h1>Editar Blog</h1>
			<hr>
			<div class="col-md-7">
				<table class="table table-hover">
				  <thead>
				    <tr>
				      <th>#</th>
				      <th>Titulo</th>
				      <th>Nombre Responasable</th>
				      <th>Fecha</th>
				      <th>Editar</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($blog_post as $blog)
				    <tr>
				      <th>{{ $contador }}</th>
				      <td>{{ $blog->titulo }}</td>
				      <td>{{ $blog->name }}</td>
				      <td>{{ date('j M, Y', strtotime($blog->created_at)) }}</td>
				      <td><a href="{{ route('admin.editar_blog',['id'=>$blog->id]) }}" class="btn btn-success btn-lg">editar</a></td>
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
							<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-default">Agregar nuevo Post</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Ventana emergente crear -->
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
                	<form class="form-horizontal" method="POST" action="{{ route('admin_postblog') }}">
		          		{{ csrf_field() }}
			        	<label for="titulo">Titulo:</label>
			        	<input name="titulo" class="form-control" type="text"><br>
			        	<label for="body">Descripción:</label>
			        	<textarea id="summernote" name="descripcion" class="form-control" ></textarea><br>
			        	<button type="submit" class="btn btn-success btn-lg btn-block"> Crear</button>
			      	</form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-lg btn-block" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin Ventana emergente crear  -->

<!-- summernote -->
<script type="text/javascript">
    $(document).ready(function() {
    	$('#summernote').summernote({
      	height: 150,
        });
    });
</script>
<!-- Fin summernote -->
@endsection
