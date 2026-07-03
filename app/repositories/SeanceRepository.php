<?php

require_once __DIR__ . '/../../config/Database.php';

class SeanceRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    public function findAll()
    {
        $sql = "SELECT * FROM seance";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM seance WHERE id_seance = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = "INSERT INTO seance
                (date_seance, type_activite, equipement, duree, id_salle, id_adherent)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['date_seance'],
            $data['type_activite'],
            $data['equipement'],
            $data['duree'],
            $data['id_salle'],
            $data['id_adherent']
        ]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE seance
                SET date_seance = ?,
                    type_activite = ?,
                    equipement = ?,
                    duree = ?,
                    id_salle = ?,
                    id_adherent = ?
                WHERE id_seance = ?";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['date_seance'],
            $data['type_activite'],
            $data['equipement'],
            $data['duree'],
            $data['id_salle'],
            $data['id_adherent'],
            $id
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM seance WHERE id_seance = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function count()
    {
        $sql = "SELECT COUNT(*) FROM seance";
        return $this->pdo->query($sql)->fetchColumn();
    }
}