<?php

require_once __DIR__ . '/../Services/SalleService.php';

class SalleController
{
    private $service;

    public function __construct()
    {
        $this->service = new SalleService();
    }

    public function index()
    {
        return $this->service->getAllSalles();
    }

    public function show($id)
    {
        return $this->service->getSalleById($id);
    }

    public function store($data)
    {
        return $this->service->createSalle($data);
    }

    public function update($id, $data)
    {
        return $this->service->updateSalle($id, $data);
    }

    public function delete($id)
    {
        return $this->service->deleteSalle($id);
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $controller = new SalleController();
    $controller->delete($_GET['id']);
    header("Location: ../../views/salles/index.php");
    exit;
}