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
            <!-- EDITAR CODIGO A PARTIR DE ACA CONTENDIO POR PAGINA -->
            <div class="container-fluid">
                <!-- ROW 1 TABLE -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Lista de Roles</h5>
                                <!-- Botón para crear un nuevo rol -->
                                <div class="mt-3">
                                    <a href="{{ route('roles.create') }}" class="btn btn-primary">Crear Nuevo Rol</a>
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
                                                <th data-sortable="true">ID</th>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $role)
                                                <tr>
                                                    <td>{{ $role->id }}</td>
                                                    <td>{{ $role->name }}</td>
                                                    <td>{{ $role->description }}</td>
                                                    <td>
                                                        <a href="{{ route('roles.edit', ['role' => $role->id]) }}"
                                                            class="btn btn-secondary">
                                                            Editar
                                                        </a>
                                                        <form
                                                            action="{{ route('roles.destroy', ['role' => $role->id]) }}"
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
