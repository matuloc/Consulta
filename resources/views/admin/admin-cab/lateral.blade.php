<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ route('admin.home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ route('admin.ver_blog') }}"><i class="fa fa-bar-chart-o fa-fw"></i> Blog</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Hora Médica<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.hora_medica') }}"> Horas Médicas</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.especialidades') }}"> Especialidades/Previsión</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.lista_usuario') }}"><i class="fa fa-edit fa-fw"></i> Usuarios</a>
            </li>
            <li>
                <a href="{{ route('admin.mensajes') }}"><i class="fa fa-wrench fa-fw"></i> Mensajes</a>
            </li>
            <li>
                <a href="{{ route('inicio') }}" target="_blank"><i class="fa fa-table fa-fw"></i> Visitar Página</a>
            </li>
        </ul>
    </div>
</div>
