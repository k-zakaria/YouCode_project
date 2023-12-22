<?php

class Classe {
    private $nom;
    private $formateur;
    private $etudiants = [];

    public function __construct($nom, Formateur $formateur) {
        $this->nom = $nom;
        $this->formateur = $formateur;
    }

    public function ajouterEtudiant(Utilisateur $etudiant) {
        $this->etudiants[] = $etudiant;
    }

    public function getEtudiants() {
        return $this->etudiants;
    }

    public function setNom($nouveauNom) {
        $this->nom = $nouveauNom;
    }
}
