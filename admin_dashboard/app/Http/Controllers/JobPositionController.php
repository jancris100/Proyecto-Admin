<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPosition;
use App\Traits\FunctionsGlobal;
use Illuminate\Support\Facades\Auth;

class JobPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use FunctionsGlobal;

    public function index()
    {
        $jobPositions = JobPosition::all();

        return view(
            'FrontEnd.Modernize-Admin.html.pages.job_positions.jobPosition',
            [
                'jobPositions' => $jobPositions,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('FrontEnd.Modernize-Admin.html.pages.job_positions.createJobPosition');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'name' => 'required',
            'salary' => 'required',
            'description' => 'required',
        ]);

        // Crear una nueva instancia de Technology con los datos validados
        JobPosition::create([
            'name' => $request->input('name'),
            'salary' => $request->input('salary'),
            'description' => $request->input('description'),
        ]);
        $this->registrarMovimiento('create', 'Nuevo trabajo creado', Auth::id());

        // Redireccionar con un mensaje de éxito (puedes ajustar esto según tus necesidades)
        return redirect()->route('job_positions.index')->with('success', 'Puesto de trabajo creado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        // Obtener la tecnología específica por su ID
        $jobPosition = JobPosition::findOrFail($id);

        // Renderizar la vista de edición con los datos de la tecnología
        return view('FrontEnd.Modernize-Admin.html.pages.job_positions.editJobPosition', [
            'jobPosition' => $jobPosition,
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
            'salary' => 'required',
            'description' => 'required',
        ]);
        // Obtener la tecnología específica por su ID
        $jobPosition = JobPosition::findOrFail($id);

        // Actualizar los datos de la tecnología
        $jobPosition->update([
            'name' => $request->input('name'),
            'salary' => $request->input('salary'),
            'description' => $request->input('description'),
        ]);

        $jobName = $jobPosition->name;

        $this->registrarMovimiento('update', 'Trabjo ' . $jobName . ' actualizado', Auth::id());

        // Redireccionar con un mensaje de éxito
        return redirect()->route('job_positions.index')->with('success', 'Puesto de trabajo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Obtener la tecnología específica por su ID
        $jobPosition = JobPosition::findOrFail($id);

        $jobName = $jobPosition->name;

        $this->registrarMovimiento('delete', 'Trabjo ' . $jobName . ' eliminado', Auth::id());
        // Eliminar la tecnología
        $jobPosition->delete();

        // Redireccionar con un mensaje de éxito
        return redirect()->route('job_positions.index')->with('success', 'Puesto de trabajo eliminado exitosamente.');
    }
}
