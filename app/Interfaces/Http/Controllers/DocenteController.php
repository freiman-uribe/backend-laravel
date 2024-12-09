<?php
namespace App\Interfaces\Http\Controllers;

use App\Application\Services\DocenteService;
use Illuminate\Http\Request;

class DocenteController
{
    protected $docenteService;

    public function __construct(DocenteService $docenteService)
    {
        $this->docenteService = $docenteService;
    }

    public function index(Request $request)
    {
        $page = $request->query('page', null);

        if ($page) {
            $docentes = $this->docenteService->getAllDocentes($page);
        } else {
            $docentes = $this->docenteService->getAllDocentes();
        }

        return response()->json($docentes);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:docentes',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $docente = $this->docenteService->createDocente($validatedData);

        return response()->json($docente, 201);
    }

    public function show($id)
    {
        $docente = $this->docenteService->getDocenteById($id);
        return response()->json($docente);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:docentes,email,' . $id,
        ]);

        $docente = $this->docenteService->updateDocente($id, $validatedData);

        return response()->json($docente);
    }

    public function destroy($id)
    {
        $this->docenteService->deleteDocente($id);

        return response()->json(null, 204);
    }

    public function assignMaterias(Request $request, $id)
    {
        $validatedData = $request->validate([
            'materia_ids' => 'required|array',
            'materia_ids.*' => 'exists:materias,id',
        ]);

        $docente = $this->docenteService->assignMaterias($id, $validatedData['materia_ids']);

        return response()->json($docente);
    }
}