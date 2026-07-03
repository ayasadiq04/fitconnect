<?php

require_once __DIR__ . '/../Repositories/SalleRepository.php';

class SalleService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new SalleRepository();
    }

    public function getAllSalles()
    {
        return $this->repository->findAll();
    }

    public function getSalleById($id)
    {
        return $this->repository->findById($id);
    }

    public function createSalle($data)
    {
        return $this->repository->create($data);
    }

    public function updateSalle($id, $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deleteSalle($id)
    {
        return $this->repository->delete($id);
    }
}