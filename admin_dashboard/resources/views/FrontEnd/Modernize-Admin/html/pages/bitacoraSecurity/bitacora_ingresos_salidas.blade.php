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
                                <h5 class="card-title">Bitácora de Ingresos y Salidas</h5>
                                <div class="table-responsive">
                                    <table data-toggle="table" data-pagination="true" data-search="true">
                                        <thead>
                                            <tr>
                                                <th>Código de Ingreso</th>
                                                <th>Usuario</th>
                                                <th>Fecha y Hora de Ingreso</th>
                                                <th>Fecha y Hora de Salida</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bitacora as $ingresoSalida)
                                                <tr>
                                                    <td>{{ $ingresoSalida->codigo_ingreso }}</td>
                                                    <td>{{ $ingresoSalida->usuario->nombre_usuario }}</td>
                                                    <td>{{ $ingresoSalida->fecha_hora_ingreso }}</td>
                                                    <td>{{ $ingresoSalida->fecha_hora_salida }}</td>
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
