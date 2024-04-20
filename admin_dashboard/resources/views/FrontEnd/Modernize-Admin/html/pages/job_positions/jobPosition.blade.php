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
                                <h5 class="card-title">Lista de Posiciones Laborales</h5>
                                <!-- Botón para crear una nueva posición laboral -->
                                <div class="mt-3">
                                    <a href="{{ route('job_positions.create') }}" class="btn btn-primary">Crear Nueva
                                        Posición Laboral</a>
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
                                                <th data-sortable="true">Nombre</th>
                                                <th>Salario</th>
                                                <th>Descripción</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jobPositions as $jobPosition)
                                                <tr>
                                                    <td>{{ $jobPosition->name }}</td>
                                                    <td>{{ $jobPosition->salary }}</td>
                                                    <td>{{ $jobPosition->description }}</td>
                                                    <td>
                                                        <a href="{{ route('job_positions.edit', ['jobPosition' => $jobPosition->id]) }}"
                                                            class="btn btn-secondary">
                                                            Editar
                                                        </a>
                                                        <form
                                                            action="{{ route('job_positions.destroy', ['jobPosition' => $jobPosition->id]) }}"
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
