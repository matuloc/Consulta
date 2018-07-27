<header>
  <div class="container">
    <div class="row">
      <div class="col-4">
        <br>
        <a class="text-muted" href="#">Logo</a>
      </div>
      <div class="col-4" align="center">
        <br>
        <h4 class="text-dark" href="#">Algun Título</h4>
      </div>
    </div>

    <hr>
  </div>
</header>

<nav class="navbar navbar-toggleable-md navbar-expand-lg navbar-light">
  <div class="center">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  </div>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <div class="mx-auto my-2 order-0 order-md-1 position-relative ">
      <ul class="navbar-nav ml-auto text-center">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('inicio') }}">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('seguir_leyendo') }}">Novedades/Noticias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('especialidades') }}">Especialidades</a>
        </li>
        <li class="nav-item dropdown">
          <div class="btn-group hover_drop_down">
            <a type="button" class="btn btn-default nav-link" data-toggle="dropdown">Hora Médica</a>
            <ul class="dropdown-menu" role="menu">
              <li>
                <a class="text-muted" href="{{ route('reserva') }}">Reserva de Hora</a></li>
                <li><a class="text-muted" href="{{ route('consulta') }}">Consulta de Hora</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('quienes_somos') }}">Quiénes Somos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('ubicacion') }}">Ubicación</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contacto') }}">Contacto</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container"><div class="row"><div class="col-md"><hr></div></div></div>