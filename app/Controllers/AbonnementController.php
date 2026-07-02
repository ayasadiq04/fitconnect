<?php

require_once __DIR__ . '/../Services/AbonnementService.php';

class AbonnementController
{
    private $service;

    public function __construct()
    {
        $this->service = new AbonnementService();
    }

    public function index()
    {
        return $this->service->getAll();
    }

    public function show($id)
    {
        return $this->service->getById($id);
    }

    public function store($data)
    {
        return $this->service->create($data);
    }

    public function update($id, $data)
    {
        return $this->service->update($id, $data);
    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $controller = new AbonnementController();
    $controller->delete($_GET['id']);
    header("Location: ../../views/abonnements/index.php");
    exit;
}