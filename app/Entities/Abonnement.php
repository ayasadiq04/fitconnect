<?php

class Abonnement
{
    private $id;
    private $type;
    private $dateDebut;
    private $dateFin;
    private $statut;
    private $idAdherent;

    public function __construct(
        $id,
        $type,
        $dateDebut,
        $dateFin,
        $statut,
        $idAdherent
    ) {
        $this->id = $id;
        $this->type = $type;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->statut = $statut;
        $this->idAdherent = $idAdherent;
    }

    public function getId() { return $this->id; }
    public function getType() { return $this->type; }
    public function getDateDebut() { return $this->dateDebut; }
    public function getDateFin() { return $this->dateFin; }
    public function getStatut() { return $this->statut; }
    public function getIdAdherent() { return $this->idAdherent; }
}