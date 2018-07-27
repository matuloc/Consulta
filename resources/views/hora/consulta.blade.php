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
	            		<h2 class="blog-post-title" align="center">Consulta tu hora!</h2>
	            		<form class="form-horizontal" method="POST" action="{{ route('consulta.hora') }}">
		                  {{ csrf_field() }}
		                  <div class="form-group{{ $errors->has('rut') ? ' has-error' : '' }}">
		                      <label for="rut" class="col-md-4 control-label text-dark">Ingresa tú Rut</label>
		                      <div class="col-md-6">
		                          <input id="rut" placeholder="Rut" type="text" class="form-control" name="rut" value="{{ old('rut') }}" required autofocus>
		                          @if ($errors->has('rut'))
		                              <span class="help-block">
		                                  <strong class="text-dark">{{ $errors->first('rut') }}</strong>
		                              </span>
		                          @endif
		                      </div>
		                  </div>
		                  <br>	
		                      <button type="submit" class="btn btn-primary">Consultar</button>
		              </form>
	            	</div>
      			</div>
    		</div>
  		</div>
  		<br>
	</div>
</div>
@endsection