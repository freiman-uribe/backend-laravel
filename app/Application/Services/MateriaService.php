<?php
namespace App\Application\Services;

use App\Infrastructure\Repositories\MateriaRepository;

class MateriaService
{
    protected $materiaRepository;

    public function __construct(MateriaRepository $materiaRepository)
    {
        $this->materiaRepository = $materiaRepository;
    }

    public function getAllMaterias($page = null)
    {
        return $this->materiaRepository->getAll($page);
    }

    public function createMateria(array $data)
    {
        return $this->materiaRepository->create($data);
    }

    public function getMateriaById($id)
    {
        return $this->materiaRepository->findById($id);
    }

    public function updateMateria($id, array $data)
    {
        return $this->materiaRepository->update($id, $data);
    }

    public function deleteMateria($id)
    {
        return $this->materiaRepository->delete($id);
    }
}