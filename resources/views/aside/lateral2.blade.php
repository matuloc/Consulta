<div class="col-md-2 panel4 panel-default" align="center">
	<div class="p-3">
	    <h5 class="font-italic">Especialidades</h5>
	    <ol class="list-unstyled mb-0">
	    	@foreach($especialidades as $especialidad)
	    		@if($especialidad->disponible==1)
	        		<li><a href="{{ route('info_especialidad',['id'=>$especialidad->id]) }}">{{ $especialidad->nombre_especialidad }}</a></li>
	        	@else
	        	@endif
	        @endforeach
		</ol>
	</div>
	<div class="p-3">
	    <h5 class="font-italic">Redes Sociales</h5>
	    <ol class="list-unstyled">
	        <li><a href="#">Twitter</a></li>
	        <li><a href="#">Facebook</a></li>
	        <li><a href="#">Instagram</a></li>
	    </ol>
	</div>
</div>
