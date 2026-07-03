<?php

require_once __DIR__ . '/../Services/SeanceService.php';

class SeanceController
{
    private $service;

    public function __construct()
    {
        $this->service = new SeanceService();
    }

    public function index()
    {
        return $this->service->getAllSeances();
    }

    public function show($id)
    {
        return $this->service->getSeanceById($id);
    }

    public function store($data)
    {
        return $this->service->createSeance($data);
    }

    public function update($id, $data)
    {
        return $this->service->updateSeance($id, $data);
    }

    public function delete($id)
    {
        return $this->service->deleteSeance($id);
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $controller = new SeanceController();
    $controller->delete($_GET['id']);
    header("Location: ../../views/seances/index.php");
    exit;
}