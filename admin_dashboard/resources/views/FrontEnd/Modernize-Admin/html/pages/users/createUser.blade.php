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

            <!-- EDITAR CODIGO A PARTIR DE ACA CONTENIDO POR PAGINA -->
            <div class="container-fluid">
                <!-- COLOCAR CADA ROW PARA DIVIDIR LAS SECCIONES DE LA PAGINA -->
                <!-- ROW 1 FORMULARIO -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Crear Usuario</h5>
                                @if (Session::has('error'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif
                                <!-- Formulario para crear un nuevo usuario -->
                                <form action="{{ route('users.store') }}" method="post">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="nombre_usuario" class="form-label">Nombre de Usuario:</label>
                                        <input type="text" class="form-control" id="nombre_usuario"
                                            name="nombre_usuario" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Contraseña:</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="cedula" class="form-label">Cédula:</label>
                                        <input type="text" class="form-control" id="cedula" name="cedula"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre:</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="telefono" class="form-label">Teléfono:</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="direccion" class="form-label">Dirección:</label>
                                        <input type="text" class="form-control" id="direccion" name="direccion"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="edad" class="form-label">Edad:</label>
                                        <input type="number" class="form-control" id="edad" name="edad"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="rol_id" class="form-label">Rol:</label>
                                        <select class="form-select" id="rol_id" name="rol_id" required>
                                            <option value="">Seleccionar Rol</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="puesto_trabajo_id" class="form-label">Posición de Trabajo:</label>
                                        <select class="form-select" id="puesto_trabajo_id" name="puesto_trabajo_id"
                                            required>
                                            <option value="">Seleccionar Posición de Trabajo</option>
                                            @foreach ($jobPositions as $jobPosition)
                                                <option value="{{ $jobPosition->id }}">{{ $jobPosition->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        @include('Frontend.Modernize-Admin.layouts.footer')
        <!-- End Footer -->
    </div>

    <!-- SCRIPTS JS -->
    @include('Frontend.Modernize-Admin.layouts.scripts')

</body>

</html>
