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
                                <h5 class="card-title">Acerca de</h5>
                                <p>¡Bienvenido a nuestro sistema!</p>
                                <p>
                                    Este es un sistema de gestión diseñado para ayudarte en tus tareas diarias.
                                    Proporciona herramientas intuitivas y potentes para simplificar tu trabajo.
                                </p>
                                <p>
                                    - Nombre del sistema: [Nombre del sistema]<br>
                                    - Acrónimo: [Acrónimo del sistema]<br>
                                    - Versión: 1.0<br>
                                    - Desarrollado por: [Tu nombre o el nombre de tu equipo]<br>
                                    - Lenguaje de programación: PHP Bajo el framework laravel<br>
                                    - Fecha de lanzamiento: [Fecha de lanzamiento del sistema]
                                </p>
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
