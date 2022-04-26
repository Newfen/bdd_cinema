<?php

namespace Controller;
use Model\Connect;

class RealController {

    public function realDisplay(){

        $pdo = Connect::seConnecter(); // On instancie un objet de la classe connect avec la fonction "seConnecter" qu'on a créer avec
        // On créer la requete dans une variable pour pouvoir l'uliliter ailleurs
        $requete = $pdo->query("
            SELECT nom_real, prenom_real FROM realisateur
        ");
    
        require "view/listRealisateurs.php"; // Permets de relier la fonction au fichier "listActeurs.php" dans lequel on va l'utiliser
    }

    public function realForFilm(){
        
        $pdo = Connect::seConnecter();

        $requete_real = $pdo->query("
            SELECT * FROM realisateur
        ");

        require "view/listFilms.php";
    }
}