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
                                <h5 class="card-title">Editar Usuario</h5>

                                <!-- Formulario para editar un usuario existente -->
                                <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
                                    @csrf
                                    @method('PUT') <!-- Utilizamos el método PUT para la actualización -->

                                    <div class="mb-3">
                                        <label for="nombre_usuario" class="form-label">Nombre de Usuario:</label>
                                        <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" value="{{ $user->nombre_usuario }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="cedula" class="form-label">Cédula:</label>
                                        <input type="text" class="form-control" id="cedula" name="cedula" value="{{ $user->cedula }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre:</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $user->nombre }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="telefono" class="form-label">Teléfono:</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $user->telefono }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="direccion" class="form-label">Dirección:</label>
                                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $user->direccion }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="edad" class="form-label">Edad:</label>
                                        <input type="number" class="form-control" id="edad" name="edad" value="{{ $user->edad }}" required>
                                    </div>


                                    <button type="submit" class="btn btn-primary">Actualizar</button>
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
