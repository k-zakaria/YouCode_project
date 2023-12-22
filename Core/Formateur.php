<?php

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