<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Rol;
use App\Models\JobPosition;
use Illuminate\Support\Facades\Auth;
use App\Traits\FunctionsGlobal;
class UserController extends Controller
{
    use FunctionsGlobal;
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // Obtener todos los usuarios con su puesto de trabajo y rol
        $users = Usuario::with('jobPosition', 'rol')->get();
        $totalSalary = $users->sum(function ($user) {
            return $user->jobPosition->salary;
        });
        // Retornar la vista con los datos
        return view('FrontEnd.Modernize-Admin.html.pages.users.users', compact('users', 'totalSalary'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Rol::all();
        $jobPositions = JobPosition::all();

        return view('FrontEnd.Modernize-Admin.html.pages.users.createUser', compact('roles', 'jobPositions'));
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {

        $existingUser = Usuario::where('cedula', $request->input('cedula'))->first();
        if ($existingUser) {
            // Si la cédula ya existe, mostrar un mensaje de error y redirigir de vuelta
            return redirect()->route('users.create')->with('error', 'Cédula ya existe.');
        }

        $existingUser = Usuario::where('nombre_usuario', $request->input('nombre_usuario'))->first();
        if ($existingUser) {
            // Si el nombre de usuario ya existe, mostrar un mensaje de error y redirigir de vuelta
            return redirect()->route('users.create')->with('error', 'Nombre de usuario ya existe.');
        }
        $this->registrarMovimiento('create', 'Nuevo usuario creado', Auth::id());

        // Validación de datos
        $request->validate([
            'nombre_usuario' => 'required|unique:usuarios',
            'password' => 'required',
            'cedula' => 'required|unique:usuarios|numeric',
            'nombre' => 'required',
            'telefono' => 'required|numeric',
            'direccion' => 'required',
            'edad' => 'required|numeric',
            'rol_id' => 'required',
            'puesto_trabajo_id' => 'required',
        ]);


        // Crear una nueva instancia de Usuario con los datos validados
        Usuario::create([
            'nombre_usuario' => $request->input('nombre_usuario'),
            'password' => bcrypt($request->input('password')),
            'cedula' => $request->input('cedula'),
            'nombre' => $request->input('nombre'),
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion'),
            'edad' => $request->input('edad'),
            'rol_id' => $request->input('rol_id'),
            'puesto_trabajo_id' => $request->input('puesto_trabajo_id'),
        ]);
        //LLAMAMOS A LA FUNCION DEL TRAIT GLOBAL PARA LA CREACION


        // Redireccionar con un mensaje de éxito
        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function myAccountUpdate(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required|numeric',
        ]);

        // Obtener el ID del usuario autenticado
        $id = Auth::id();

        // Buscar al usuario en la base de datos por su ID
        $user = Usuario::find($id);

        // Verificar si se encontró al usuario

        // Actualizar los datos del usuario
        $user->update([
            'nombre' => $request->input('nombre'),
            'telefono' => $request->input('telefono'),
        ]);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('panel.dashboard')->with('success', '¡Tu perfil ha sido actualizado exitosamente!');

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        // Obtener la tecnología específica por su ID
        $user = Usuario::findOrFail($id);

        // Renderizar la vista de edición con los datos de la tecnología
        return view('FrontEnd.Modernize-Admin.html.pages.users.editUser', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, string $id)
    {

        // Validación de datos
        $request->validate([
            'nombre_usuario' => 'required|unique:usuarios,nombre_usuario,' . $id,
            'password' => 'nullable',
            'cedula' => 'required|unique:usuarios,cedula,' . $id . '|numeric',
            'nombre' => 'required',
            'telefono' => 'required|numeric',
            'direccion' => 'required',
            'edad' => 'required|numeric',
        ]);

        // Obtener el usuario específico por su ID
        $user = Usuario::findOrFail($id);
        $nombreUsuario = $user->nombre_usuario;

        $this->registrarMovimiento('update', 'Usuario ' . $nombreUsuario . ' actualizado', Auth::id());

        // Actualizar los datos del usuario
        $user->update([
            'nombre_usuario' => $request->input('nombre_usuario'),
            'password' => $request->input('password'),
            'cedula' => $request->input('cedula'),
            'nombre' => $request->input('nombre'),
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion'),
            'edad' => $request->input('edad'),
        ]);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Obtener la tecnología específica por su ID
        $storeProduct = Usuario::findOrFail($id);
        $nombreUsuario = $storeProduct->nombre_usuario;

        $this->registrarMovimiento('delete', 'Usuario ' . $nombreUsuario . ' eliminado', Auth::id());

        // Eliminar la tecnología
        $storeProduct->delete();

        // Redireccionar con un mensaje de éxito
        return redirect()->route('users.index')->with('success', 'Usuario eliminada exitosamente.');
    }
}
