<?php
namespace App\Application\Services;

use App\Infrastructure\Repositories\DocenteRepository;

class DocenteService
{
    protected $docenteRepository;

    public function __construct(DocenteRepository $docenteRepository)
    {
        $this->docenteRepository = $docenteRepository;
    }

    public function getAllDocentes($page = null)
    {
        return $this->docenteRepository->getAll($page);
    }

    public function createDocente(array $data)
    {
        return $this->docenteRepository->create($data);
    }

    public function getDocenteById($id)
    {
        return $this->docenteRepository->findById($id);
    }

    public function updateDocente($id, array $data)
    {
        return $this->docenteRepository->update($id, $data);
    }

    public function deleteDocente($id)
    {
        return $this->docenteRepository->delete($id);
    }

    public function assignMaterias($id, array $materiaIds)
    {
        return $this->docenteRepository->assignMaterias($id, $materiaIds);
    }
}