<?php
namespace App\Infrastructure\Repositories;

use App\Domain\Models\Materia;

class MateriaRepository
{
    public function getAll($page = null)
    {
        if ($page) {
            return Materia::paginate(10);
        }
        return Materia::all();
    }

    public function create(array $data)
    {
        return Materia::create($data);
    }

    public function findById($id)
    {
        return Materia::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $materia = Materia::findOrFail($id);
        $materia->update($data);
        return $materia;
    }

    public function delete($id)
    {
        $materia = Materia::findOrFail($id);
        $materia->delete();
    }
}