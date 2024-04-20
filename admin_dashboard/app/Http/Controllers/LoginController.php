<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\Bitacora_ingresos_salidas;
use Illuminate\Support\Str;


class LoginController extends Controller
{
    /**
     * Muestra el formulario de inicio de sesión.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('FrontEnd.Modernize-Admin.html.login');
    }

    /**
     * Maneja la autenticación del usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {

        $credentials = $request->only('username', 'password');

        //BUSCA UN USUARIO CON ESAS CREDECIALES
        $user = Usuario::where('nombre_usuario', $credentials['username'])->first();
        //UNA VEZ TENGAMOS EL USUSARIO VERIFICAMOS QUE LA CONTRASEÑA SEA LA MISMA
        if ($user && password_verify($credentials['password'], $user->password)) {

            //VAMOS A GENERAR UN CODIGO DE INGRESO PARA CADA LOGIN
            $codigo_ingreso = 'login_' . Str::random(10);

            //LO GUARDAMOS EN LA DBB
            $user->codigo_ingreso = $codigo_ingreso;
            $user->save();



            //SI ES VALIDO AUTH
            Auth::login($user);

            //GUARDAMOS EL REGISTRO DE INGRESO
            $ingresoSalida = new Bitacora_ingresos_salidas();
            $ingresoSalida->codigo_ingreso = $codigo_ingreso;
            $ingresoSalida->usuario_id = $user->id;
            $ingresoSalida->fecha_hora_ingreso = now(); // Fecha y hora actual
            $ingresoSalida->save();

            //REDIRIJIMOS AL DASHBOARD
            return redirect()->intended('/dashboard');
        }

        //SI FALLA MUESTRA EL MENSAJE DE FAIL
        return redirect()->back()->withInput()->withErrors(['error' => 'Credenciales incorrectas.']);
    }

    /**
     * Cierra la sesión del usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {

        //DATOS PARA LOS DE SALIDA VALIDAMOS EL USER ID Y SI EL REGISTRO DE SALIDA ESTA NULL SE GUARDA AHI

        $user = Auth::user();
        $bitacora = Bitacora_ingresos_salidas::where('usuario_id', $user->id)
            ->whereNull('fecha_hora_salida')
            ->orderBy('id', 'desc') // Ordenar por la columna 'id' de forma descendente
            ->first();
        if ($bitacora) {
            $bitacora->fecha_hora_salida = now();
            $bitacora->save();
        }

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
