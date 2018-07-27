<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ route('admin.home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Blog<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.crear_blog') }}">Crear</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.ver_blog') }}">Ver</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Hora Médica</a>
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
