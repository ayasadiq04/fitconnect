<?php

require_once __DIR__ . '/../Services/AdherentService.php';

class AdherentController
{
    private $service;

    public function __construct()
    {
        $this->service = new AdherentService();
    }

    public function index()
    {
        return $this->service->getAllAdherents();
    }

    public function show($id)
    {
        return $this->service->getAdherentById($id);
    }

    public function store($data)
    {
        return $this->service->createAdherent($data);
    }

    public function update($id, $data)
    {
        return $this->service->updateAdherent($id, $data);
    }

    public function delete($id)
    {
        return $this->service->deleteAdherent($id);
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    if (isset($_GET['id'])) {
        $controller = new AdherentController();
        $controller->delete($_GET['id']);
        header("Location: ../../views/adherents/index.php");
        exit;
    }
}