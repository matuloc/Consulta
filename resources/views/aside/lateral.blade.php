<div class="col-md-2 panel4 panel-default" align="center">
	<div class="p-3">
	    <h4 class="font-italic">Novedades / Noticias</h4>
	    <ol class="list-unstyled mb-0">
	        <li><h5>Fechas</h5></li>
	       <div class="list-group">
				@foreach($blog_post as $blog)
					<a href="{{ route('novedades',['id'=>$blog->id]) }}">{{ $blog->titulo }}<span class="fa arrow"></span></a>
				@endforeach
			 </div>
		</ol>
	</div>
	<div class="p-3">
	    <h4 class="font-italic">Redes Sociales</h4>
	    <ol class="list-unstyled">
	        <li><a href="#">Twitter</a></li>
	        <li><a href="#">Facebook</a></li>
	        <li><a href="#">Instagram</a></li>
	    </ol>
	</div>
</div>
