<?php

class Admin extends Utilisateur {
    public function attribuerRole(Utilisateur $utilisateur, $nouveauRole) {
        // Logique pour attribuer un nouveau rôle à un utilisateur
        // Cette fonction pourrait mettre à jour la base de données par exemple
        // Exemple simple : on modifie directement le rôle dans l'objet
        $utilisateur->role = $nouveauRole;
    }

    public function accederTableauDeBord() {
        // Logique pour accéder au tableau de bord
    }

    public function bannirUtilisateur(Utilisateur $utilisateur) {
        // Logique pour bannir un utilisateur
    }
}

