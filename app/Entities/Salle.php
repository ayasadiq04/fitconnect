<?php

class Salle
{
    private $id;
    private $nom;
    private $adresse;
    private $telephone;

    public function __construct($id, $nom, $adresse, $telephone)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->telephone = $telephone;
    }

    public function getId() { return $this->id; }
    public function getNom() { return $this->nom; }
    public function getAdresse() { return $this->adresse; }
    public function getTelephone() { return $this->telephone; }
}