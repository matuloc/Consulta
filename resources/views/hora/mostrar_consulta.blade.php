@extends('cabecera.cab')
@section('content')
<div class="container">
  	<div class="row">
    	<div class="col-md-12 panel6 panel-default">
      		<div class="row">
      			@include('aside.lateral2')
      			<div class="col"></div>
      			<div class="col-md-9 panel4 panel-default">
      				<div class="blog-post" align="center">
	      				<table class="table table-hover">
						  <thead>
						    <tr>
						      <th scope="col">id</th>
						      <th scope="col">dia</th>
						      <th scope="col">hora</th>
						      <th scope="col">estado</th>
						    </tr>
						  </thead>
						  <tbody>
						  	@foreach($consulta as $cons)
						    <tr>
						      <th>{{ $contador }}</th>
						      <td>{{ date('j M, Y', strtotime($cons->dia)) }}</td>
						      <td>{{ $cons->hora }}</td>
						      <td>{{ $cons->nombre_estado_atencion }}</td>
						    </tr>
						    <?php $contador++ ?>
						    @endforeach	
						  </tbody>
						</table>		
	            	</div>
      			</div>
    		</div>
  		</div>
  		<br>
	</div>
</div>
@endsection