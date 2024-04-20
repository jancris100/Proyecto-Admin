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
                                <h5 class="card-title">Bitácora de Movimientos</h5>
                                <div class="table-responsive">
                                    <table data-toggle="table" data-pagination="true" data-search="true">
                                        <thead>
                                            <tr>
                                                <th>Código de Movimiento</th>
                                                <th data-sortable="true" data-field="nombre_usuario">Usuario</th>
                                                <th>Fecha y Hora de Movimiento</th>
                                                <th data-sortable="true">Tipo de Movimiento</th>
                                                <th>Detalle</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($movimientos as $movimiento)
                                                <tr>
                                                    <td>{{ $movimiento->codigo_movimiento }}</td>
                                                    <td>{{ $movimiento->usuario->nombre_usuario }}</td>
                                                    <td>{{ $movimiento->fecha_hora_movimiento }}</td>
                                                    <td>{{ $movimiento->tipo_movimiento }}</td>
                                                    <td>{{ $movimiento->detalle }}</td>
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

    <script>
        function nombreUsuarioFormatter(value, row, index) {
            // Aquí puedes implementar la lógica para obtener el nombre de usuario
            // Puedes hacer una petición AJAX para obtener el nombre del usuario por su ID
            // o utilizar los datos disponibles en la página para mapear el ID con el nombre de usuario
            return row.usuario.nombre_usuario; // Suponiendo que row.usuario contiene el nombre de usuario
        }
    </script>
</body>

</html>
