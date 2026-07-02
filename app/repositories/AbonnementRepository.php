<?php

require_once __DIR__ . '/../../config/Database.php';

class AbonnementRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect();
    }

    public function findAll()
    {
        return $this->pdo->query("SELECT * FROM abonnement")
                         ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM abonnement WHERE id_abonnement = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO abonnement(type_abonnement, date_debut, date_fin, statut, id_adherent)
            VALUES(?, ?, ?, ?, ?)
        ");
        return $stmt->execute([
            $data['type_abonnement'],
            $data['date_debut'],
            $data['date_fin'],
            $data['statut'] ?? 'Actif',
            $data['id_adherent']
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("
            UPDATE abonnement
            SET type_abonnement = ?,
                date_debut = ?,
                date_fin = ?,
                statut = ?,
                id_adherent = ?
            WHERE id_abonnement = ?
        ");
        return $stmt->execute([
            $data['type_abonnement'],
            $data['date_debut'],
            $data['date_fin'],
            $data['statut'],
            $data['id_adherent'],
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM abonnement WHERE id_abonnement = ?");
        return $stmt->execute([$id]);
    }

    public function count()
    {
        return $this->pdo->query("SELECT COUNT(*) FROM abonnement")
                         ->fetchColumn();
    }
}