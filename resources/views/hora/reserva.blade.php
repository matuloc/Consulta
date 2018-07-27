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
	            		<h2 class="blog-post-title" align="center">Identificación del Paciente!</h2>
	            		<form class="form-horizontal" method="POST" action="{{ route('reserva.hora') }}">
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
		                      <br>
		                      <label for="nombre" class="col-md-4 control-label text-dark">Ingresa tú Nombre</label>
		                      <div class="col-md-6">
		                          <input id="nombre" placeholder="Juan Contreras" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autofocus maxlength="30">
		                          @if ($errors->has('nombre'))
		                              <span class="help-block">
		                                  <strong class="text-dark">{{ $errors->first('nombre') }}</strong>
		                              </span>
		                          @endif
		                      </div>
		                  </div>
		                  <button type="submit" class="btn btn-primary">Ingresar</button>
		              </form>
	            	</div>
      			</div>
    		</div>
  		</div>
  		<br>
	</div>
</div>
@endsection