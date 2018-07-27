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
	            		<h2 class="blog-post-title" align="center">Identificación del Paciente</h2>
		                <label for="rut" class="col-md-4 control-label text-dark">Ingresa tú Rut</label>
		                <div class="col-md-6">
                      <form class="form-horizontal" method="POST" action="{{ route('reserva.datos') }}">
                        {{ csrf_field() }}
		                    <h4><label class="control-label" name="rute">{{ $info_paciente->rut }}</label></h4>
                        <input class="form-control" name="rut" value="{{ $info_paciente->rut }}" type="hidden"/>
                        <h4><label class="control-label" name="nombre">{{ $info_paciente->nombre }}</label></h4>
                        <input class="form-control" name="nombre" value="{{ $info_paciente->nombre }}" type="hidden"/>
                          <div class="form-group">
                          <h3 class="box-title">Seleccione Previsión</h3>
                            <select class="form-control select2" name="prevision" id="prevision" required>
                              @foreach($prevision as $prev)
                                @if($prev->disponible==1)
                                  <option value="{{ $prev->id }}">{{ $prev->nombre_prevision }}</option>
                                  @else
                                  @endif
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <h3 class="box-title">Seleccione especialidad</h3>
                            <select class="form-control select2" name="especialidad" id="especialidad" required>
                              @foreach($especialidades as $especialidad)
                                @if($especialidad->disponible==1)
                                  <option value="{{ $especialidad->id }}">{{ $especialidad->nombre_especialidad }}</option>
                                @else
                                @endif
                              @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                              <h3 class="box-title">Elige horario</h3>
                                <div class="form-group"> <!-- Date input -->
                                  <label class="control-label" for="date">Date</label>
                                  <input class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" type="text" required/>
                                </div>
                            </div>
                            <div class="panel-body" name="info-dia" id="info-dia">

                            </div>
		                    </div>
		                    <br>
		                    <button type="submit" class="btn btn-primary">Reservar</button>
                    </form>
	            	</div>
      			</div>
    		</div>
  		</div>
  		<br>
	</div>
</div>
@include('aside.js')
@endsection
