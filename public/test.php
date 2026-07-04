<?php
require_once __DIR__ . "/../app/Controllers/AdherentController.php";

$controller = new AdherentController();

echo "<pre>";
print_r($controller->index());
echo "</pre>";