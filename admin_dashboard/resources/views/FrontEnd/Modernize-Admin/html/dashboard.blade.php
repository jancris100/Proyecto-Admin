<!-- INCLUIR EL HEAD -->
@include('Frontend.Modernize-Admin.layouts.head')

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
                <!-- ROW 1 -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Mi Perfil</h5>
                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <!-- Formulario con los datos del usuario logueado -->
                                <form action="{{ route('users.myAccountUpdate', ['user' => Auth::user()->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                                    <div class="mb-3">
                                        <label for="nombre_usuario" class="form-label">Nombre de Usuario:</label>
                                        <input type="text" class="form-control" id="nombre_usuario"
                                            name="nombre_usuario" value="{{ Auth::user()->nombre_usuario }}" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre:</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            value="{{ Auth::user()->nombre }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="telefono" class="form-label">Teléfono:</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono"
                                            value="{{ Auth::user()->telefono }}" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                @include('Frontend.Modernize-Admin.layouts.footer')
                <!--End Footer -->
            </div>
        </div>
    </div>
    <!-- SCRIPTS JS -->
    @include('Frontend.Modernize-Admin.layouts.scripts')

</body>

</html>
