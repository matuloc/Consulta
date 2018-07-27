@extends('cabecera.cab')
@section('content')
<div class="container">
	<div class="row">
		@include('aside.lateral')
		<div class="col-md-10 panel-default">
			<div class="col-md-2"></div>
			<div class="col-md-10 panel3 panel-default">
				<div class="blog-post" id="post">
					@foreach($novedades as $novedad)
						<h2 class="blog-post-title texto-post">{{ $novedad->titulo }}</h2>
						<p class="blog-post-meta texto-post">{{ date('M j, Y', strtotime($novedad->created_at)) }} por <a href="#">{{ $novedad->name }}</a></p>
						<p class="texto-post">{!! $novedad->descripcion !!}</p>
						<br>
					@endforeach
				</div><!-- /.blog-post -->
			</div>
		</div>
	</div>
</div>
@endsection