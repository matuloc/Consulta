@extends('cabecera.cab')
@section('content')
<br>
<div class="container">
  <div class="row">
    @include('aside.lateral2')
    <div class="col"></div>
    <div class="col-md-9 panel3 panel-default">
      @include('sweet::alert')
      <h2 class="blog-post-title" align="center">Dejános un Mensaje!</h2>
      <br>

      <form class="form-horizontal" method="POST" action="{{ route('enviar.contacto') }}">
          {{ csrf_field() }}
          <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}"align="center">
              <div class="col-md-8">
                  <input id="nombre" placeholder="Nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autofocus>
                  @if ($errors->has('nombre'))
                      <span class="help-block">
                          <strong class="text-dark">{{ $errors->first('nombre') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
          <div class="form-group{{ $errors->has('correo') ? ' has-error' : '' }}" align="center">
              <div class="col-md-8">
                  <input id="correo" placeholder="Correo" type="email" class="form-control" name="correo" required>
                  @if ($errors->has('correo'))
                      <span class="help-block">
                          <strong class="text-dark">{{ $errors->first('correo') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('asunto') ? ' has-error' : '' }}" align="center">
              <div class="col-md-8">
                  <input id="asunto" placeholder="Asunto" type="text" class="form-control" name="asunto" value="{{ old('asunto') }}" required>
                  @if ($errors->has('asunto'))
                      <span class="help-block">
                          <strong class="text-dark">{{ $errors->first('asunto') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ $errors->has('mensaje') ? ' has-error' : '' }}" align="center">
            <div class="col-md-8">
             <textarea name="mensaje" class="form-control" style="resize:none;" placeholder="Mensaje" rows="5" id="mensaje" required></textarea>
             @if ($errors->has('mensaje'))
                      <span class="help-block">
                          <strong class="text-dark">{{ $errors->first('mensaje') }}</strong>
                      </span>
                  @endif
           </div>
          </div>

          <div class="form-group" align="center">
              <div class="col-md-8 col-md-offset-4 boton">
                  <button type="submit" class="btn btn-primary btn-block">
                      Ingresar
                  </button>
              </div>
          </div>
      </form>
    </div>
  </div>
  <br>
</div>

@endsection
