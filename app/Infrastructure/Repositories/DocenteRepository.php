<?php
namespace App\Infrastructure\Repositories;

use App\Domain\Models\Docente;

class DocenteRepository
{
    public function getAll($page = null)
    {
        if ($page) {
            return Docente::with('materias')->paginate(10);
        }
        return Docente::with('materias')->get();
    }

    public function create(array $data)
    {
        return Docente::create($data);
    }

    public function findById($id)
    {
        return Docente::with('materias')->findOrFail($id);
    }

    public function update($id, array $data)
    {
        $docente = Docente::findOrFail($id);
        $docente->update($data);
        return $docente;
    }

    public function delete($id)
    {
        $docente = Docente::findOrFail($id);
        $docente->delete();
    }

    public function assignMaterias($id, array $materiaIds)
    {
        $docente = Docente::findOrFail($id);
        $docente->materias()->sync($materiaIds);
        return $docente;
    }
}