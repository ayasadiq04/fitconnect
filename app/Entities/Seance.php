<?php

class Seance
{
    private $id;
    private $dateSeance;
    private $typeActivite;
    private $equipement;
    private $duree;
    private $idSalle;
    private $idAdherent;

    public function __construct(
        $id,
        $dateSeance,
        $typeActivite,
        $equipement,
        $duree,
        $idSalle,
        $idAdherent
    ) {
        $this->id = $id;
        $this->dateSeance = $dateSeance;
        $this->typeActivite = $typeActivite;
        $this->equipement = $equipement;
        $this->duree = $duree;
        $this->idSalle = $idSalle;
        $this->idAdherent = $idAdherent;
    }

    public function getId() { return $this->id; }
    public function getDateSeance() { return $this->dateSeance; }
    public function getTypeActivite() { return $this->typeActivite; }
    public function getEquipement() { return $this->equipement; }
    public function getDuree() { return $this->duree; }
    public function getIdSalle() { return $this->idSalle; }
    public function getIdAdherent() { return $this->idAdherent; }
}