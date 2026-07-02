<?php

require_once __DIR__ . '/../Repositories/AbonnementRepository.php';

class AbonnementService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new AbonnementRepository();
    }

    public function getAll()
    {
        return $this->repository->findAll();
    }

    public function getById($id)
    {
        return $this->repository->findById($id);
    }

    public function create($data)
    {
        return $this->repository->create($data);
    }

    public function update($id, $data)
    {
        return $this->repository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}