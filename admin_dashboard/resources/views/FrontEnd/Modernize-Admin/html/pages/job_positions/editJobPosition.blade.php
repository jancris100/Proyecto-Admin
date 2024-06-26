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
                <!-- ROW 1 TABLE -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Editar Puesto de Trabajo</h5>

                                <!-- Formulario para editar un puesto de trabajo existente -->
                                <form action="{{ route('job_positions.update', ['jobPosition' => $jobPosition->id]) }}" method="post">
                                    @csrf
                                    @method('PUT') <!-- Utilizamos el método PUT para la actualización -->

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nombre:</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $jobPosition->name }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="salary" class="form-label">Salario:</label>
                                        <input type="number" class="form-control" id="salary" name="salary" value="{{ $jobPosition->salary }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Descripción:</label>
                                        <textarea class="form-control" id="description" name="description" required>{{ $jobPosition->description }}</textarea>
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
