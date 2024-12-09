<?php
namespace App\Interfaces\Http\Controllers;

use App\Application\Services\MateriaService;
use Illuminate\Http\Request;

class MateriaController
{
    protected $materiaService;

    public function __construct(MateriaService $materiaService)
    {
        $this->materiaService = $materiaService;
    }

    public function index(Request $request)
    {
        $page = $request->query('page', null);

        if ($page) {
            $materias = $this->materiaService->getAllMaterias($page);
        } else {
            $materias = $this->materiaService->getAllMaterias();
        }

        return response()->json($materias);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $materia = $this->materiaService->createMateria($validatedData);

        return response()->json($materia, 201);
    }

    public function show($id)
    {
        $materia = $this->materiaService->getMateriaById($id);
        return response()->json($materia);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $materia = $this->materiaService->updateMateria($id, $validatedData);

        return response()->json($materia);
    }

    public function destroy($id)
    {
        $this->materiaService->deleteMateria($id);

        return response()->json(null, 204);
    }
}