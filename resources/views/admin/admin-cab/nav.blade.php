<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('admin.home') }}">Panel Admin</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <!--  navbar mensajes -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            @if($mensajes->isEmpty())
                                <p align="center"><strong>No tienes mensajes</strong></p>
                                @else
                                @foreach($mensajes as $mensaje)
                                    <a href="#">
                                        <strong>{{ $mensaje->nombre }}</strong>
                                        <span class="pull-right text-muted">
                                            <em>{{ date('j M, Y, m:h', strtotime($mensaje->created_at)) }}</em>
                                        </span>
                                        <div>{{ $mensaje->asunto }}</div>
                                        <hr>
                                    </a>
                                @endforeach
                            @endif
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="{{ route('admin.mensajes') }}">
                                <strong>Todos los mensajes</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- /. navbar mensajes -->

                <!--  navbar tareas -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            @if($tareas==0)
                                <p align="center"><strong>No hay nuevas tareas</strong></p>
                            @else
                                <p><strong>Si hay nuevas tareas</strong></p>
                            @endif
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Todas las Horas</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- /. navbar tareas -->

                <!-- /. navbar sesión -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i>
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </li>
                    </ul>
                </li>
                <!-- /. navbar sesión -->
            </ul>
            @include('admin.admin-cab.lateral')
        </nav>
