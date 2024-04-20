<!-- INCLUIR EL HEAD -->
@include('Frontend.Modernize-Admin.layouts.head')

<!-- ESTILOS PROPIOS DE LA PAGINA -->

<body>

    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @include('Frontend.Modernize-Admin.layouts.aside')
        <!-- Sidebar End -->

        <!-- Main wrapper -->
        <div class="body-wrapper">
            <!-- Header Start -->
            @include('Frontend.Modernize-Admin.layouts.header')
            <!-- Header End -->

            <!-- EDITAR CODIGO A PARTIR DE ACA CONTENDIO POR PAGINA -->
            <div class="container-fluid">
                <!-- COLOCAR CADA ROW PARA DIVIDIR LAS SECCIONES DE LA PAGINA -->
                <!-- ROW 1 TABLE -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Lista de Usuarios</h5>
                                <!-- Botón para crear un nuevo usuario -->
                                <div class="mt-3">
                                    <a href="{{ route('users.create') }}" class="btn btn-primary">Crear Nuevo
                                        Usuario</a>
                                </div>
                                @if (session('success'))
                                    <div style="margin-top: 5px" class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table data-toggle="table" data-pagination="true" data-search="true">
                                        <thead>
                                            <tr>
                                                <th data-sortable="true">Nombre de Usuario</th>
                                                <th>Cédula</th>
                                                <th>Nombre</th>
                                                <th>Teléfono</th>
                                                <th>Dirección</th>
                                                <th>Edad</th>
                                                <th>Rol</th>
                                                <th>Puesto de Trabajo</th>
                                                <th>Salario</th>
                                                <th>ACCIONES</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->nombre_usuario }}</td>
                                                    <td>{{ $user->cedula }}</td>
                                                    <td>{{ $user->nombre }}</td>
                                                    <td>{{ $user->telefono }}</td>
                                                    <td>{{ $user->direccion }}</td>
                                                    <td>{{ $user->edad }}</td>
                                                    <td>{{ $user->rol->name }}</td>
                                                    <td>{{ $user->jobPosition->name }}</td>
                                                    <td>{{ $user->jobPosition->salary }}</td>
                                                    <td>
                                                        <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                                            class="btn btn-secondary">
                                                            Editar
                                                        </a>

                                                        <form
                                                            action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger">
                                                                Eliminar
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div>Total de usuarios: {{ count($users) }}</div>
                                    <div>Total de salarios: ₡{{ $totalSalary }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Footer -->
        @include('Frontend.Modernize-Admin.layouts.footer')
        <!--End Footer -->
    </div>
    <!-- SCRIPTS JS -->
    @include('Frontend.Modernize-Admin.layouts.scripts')

</body>

</html>
