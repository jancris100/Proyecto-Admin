<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;
use App\Traits\FunctionsGlobal;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use FunctionsGlobal;

    public function index()
    {
        $roles = Rol::all();

        return view(
            'FrontEnd.Modernize-Admin.html.pages.roles.roles',
            [
                'roles' => $roles,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('FrontEnd.Modernize-Admin.html.pages.roles.createRoles');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $this->registrarMovimiento('create', 'Nuevo rol creado', Auth::id());

        // Crear una nueva instancia de Technology con los datos validados
        Rol::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        // Redireccionar con un mensaje de éxito (puedes ajustar esto según tus necesidades)
        return redirect()->route('roles.index')->with('success', 'Rol creado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Obtener la tecnología específica por su ID
        $role = Rol::findOrFail($id);

        // Renderizar la vista de edición con los datos de la tecnología
        return view('FrontEnd.Modernize-Admin.html.pages.roles.editRoles', [
            'role' => $role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        // Validación de datos
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        // Obtener la tecnología específica por su ID
        $role = Rol::findOrFail($id);
        $nombreRol = $role->name;
        $this->registrarMovimiento('update', 'Rol ' . $nombreRol . ' actualizado', Auth::id());

        // Actualizar los datos de la tecnología
        $role->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('roles.index')->with('success', 'Rol actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Obtener la tecnología específica por su ID
        $roles = Rol::findOrFail($id);

        // Eliminar la tecnología
        $roles->delete();
        $nombreRol = $roles->name;
        $this->registrarMovimiento('delete', 'Rol ' . $nombreRol . ' eliminado', Auth::id());

        // Redireccionar con un mensaje de éxito
        return redirect()->route('roles.index')->with('success', 'Rol eliminado exitosamente.');
    }
}
