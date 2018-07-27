@extends('cabecera.cab')
@section('content')
<div class="container">
	<div class="row">
		@include('aside.lateral2')
		<div class="col-md-10 panel-default">
	        	<div class="col"></div>
	          <div class="col-md-9 panel3 panel-default">
	            <div class="blog-post">
	            	@foreach($info_especialidad as $info)
						<h2 class="blog-post-title texto-post">{{ $info->nombre_especialidad }}</h2>
						<p class="blog-post-meta texto-post">Agregado el {{ date('M j, Y', strtotime($info->created_at)) }}</p>
						<p class="texto-post">{{ $info->descripcion }}</p>
						<br>
					@endforeach
	            </div><!-- /.blog-post -->
	          </div>
		</div>
	</div>
</div>
@endsection