<?php

class Utilisateur {
    private $nom;
    private $prenom;
    private $email;
    private $motDePasse;

    public function __construct($nom, $prenom, $email, $motDePasse) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->motDePasse = $motDePasse;
    }

    public function getRole() {
        return 'apprenant';
    }

    public function getEmail() {
        return $this->email;
    }
}

class Formateur extends Utilisateur {
    public function creerClasse($nomClasse) {
        // Logique pour créer une nouvelle classe
        return new Classe($nomClasse, $this);
    }

    public function modifierClasse(Classe $classe, $nouveauNom) {
        // Logique pour modifier le nom d'une classe
        $classe->setNom($nouveauNom);
    }

    public function supprimerClasse(Classe $classe) {
        // Logique pour supprimer une classe
    }
}

