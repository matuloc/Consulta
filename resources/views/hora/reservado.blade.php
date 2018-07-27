@extends('cabecera.cab')
@section('content')
<div class="container">
  	<div class="row">
    	<div class="col-md-12 panel6 panel-default">
      		<div class="row">
      			@include('aside.lateral2')
      			<div class="col"></div>
      			<div class="col-md-9 panel4 panel-default">
      				@include('flash::message')
      			</div>
    		</div>
  		</div>
  		<br>
	</div>
</div>
@endsection