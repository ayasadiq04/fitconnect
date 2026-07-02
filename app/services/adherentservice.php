<?php

require_once __DIR__ . '/../Repositories/AdherentRepository.php';

class AdherentService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new AdherentRepository();
    }

    public function getAllAdherents()
    {
        return $this->repository->findAll();
    }

    public function getAdherentById($id)
    {
        return $this->repository->findById($id);
    }

    public function createAdherent($data)
    {
        return $this->repository->create($data);
    }

    public function updateAdherent($id, $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deleteAdherent($id)
    {
        return $this->repository->delete($id);
    }
}