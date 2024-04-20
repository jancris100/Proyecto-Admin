<!-- ASIDE LAYOUT-->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('panel.dashboard') }}" class="text-nowrap logo-img">
                <img src="{{ asset('libs/admin/assets/images/logos/dark-logo.svg') }}" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">MI CUENTA</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('panel.dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">PERFIL</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">MANTENIMIENTOS</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('users.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">USUARIOS</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('roles.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-check"></i>
                        </span>
                        <span class="hide-menu">ROLES</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('job_positions.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-sitemap"></i>
                        </span>
                        <span class="hide-menu">PUESTOS DE TRABAJO</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">SEGURIDAD</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#" data-toggle="modal" data-target="#filtroModal"
                        aria-expanded="false">
                        <span>
                            <i class="ti ti-shield"></i>
                        </span>
                        <span class="hide-menu">INGRESOS Y SALIDAS</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="#" data-toggle="modal" data-target="#filtroModalMovimientos"
                        aria-expanded="false">
                        <span>
                            <i class="ti ti-shield"></i>
                        </span>
                        <span class="hide-menu">MOVIMIENTOS</span>
                    </a>
                </li>

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">HERRAMIENTAS</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('panel.about') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-copyright"></i>
                        </span>
                        <span class="hide-menu">ACERCA DE</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

<!-- POP UP-->
<div class="modal fade" id="filtroModal" tabindex="-1" role="dialog" aria-labelledby="filtroModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filtroModalLabel">Filtrar Bitácora por Fecha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('security.index_ingresos_salidas') }}" method="GET">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="fecha_inicio">Fecha de inicio:</label>
                        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin">Fecha de fin:</label>
                        <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="filtroModalMovimientos" tabindex="-1" role="dialog"
    aria-labelledby="filtroModalLabelMovimientos" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filtroModalLabelMovimientos">Filtrar Movimientos por Fecha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('security.index_movimientos') }}" method="GET">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="fecha_inicio_movimientos">Fecha de inicio:</label>
                        <input type="date" class="form-control" id="fecha_inicio_movimientos" name="fecha_inicio"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin_movimientos">Fecha de fin:</label>
                        <input type="date" class="form-control" id="fecha_fin_movimientos" name="fecha_fin"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
