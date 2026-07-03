<?php

require_once __DIR__ . '/../../config/Database.php';

class SalleRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    public function findAll()
    {
        return $this->pdo->query("SELECT * FROM salle")
                         ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM salle WHERE id_salle = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO salle(nom_salle, adresse, telephone)
            VALUES(?, ?, ?)
        ");
        return $stmt->execute([
            $data['nom_salle'],
            $data['adresse'],
            $data['telephone']
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("
            UPDATE salle
            SET nom_salle = ?, adresse = ?, telephone = ?
            WHERE id_salle = ?
        ");
        return $stmt->execute([
            $data['nom_salle'],
            $data['adresse'],
            $data['telephone'],
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM salle WHERE id_salle = ?");
        return $stmt->execute([$id]);
    }

    public function count()
    {
        return $this->pdo->query("SELECT COUNT(*) FROM salle")
                         ->fetchColumn();
    }
}