@extends('cabecera.cab')
@section('content')
<div class="container">
	<div class="row">
		@include('aside.lateral')
		<div class="col-md-10 panel-default">
			<div class="col-md-2"></div>
			<div class="col-md-10 panel3 panel-default">
				<div class="blog-post" id="post">
						<h2 class="blog-post-title texto-post">{{ $ultimo_post->titulo }}</h2>
						<p class="blog-post-meta texto-post">{{ date('M j, Y', strtotime($ultimo_post->created_at)) }} por <a href="#">{{ $ultimo_post->name }}</a></p>
						<p class="texto-post">{!! $ultimo_post->descripcion !!}</p>
						<br>
				</div><!-- /.blog-post -->
			</div>
		</div>
	</div>
</div>
@endsection