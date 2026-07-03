<?php

require_once __DIR__ . '/../Repositories/SeanceRepository.php';

class SeanceService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new SeanceRepository();
    }

    public function getAllSeances()
    {
        return $this->repository->findAll();
    }

    public function getSeanceById($id)
    {
        return $this->repository->findById($id);
    }

    public function createSeance($data)
    {
        return $this->repository->create($data);
    }

    public function updateSeance($id, $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deleteSeance($id)
    {
        return $this->repository->delete($id);
    }
}