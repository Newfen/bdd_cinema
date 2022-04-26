<?php

namespace Controller;
use Model\Connect;

class GenreController {

    public function genreDisplay(){

        $pdo = Connect::seConnecter(); // On instancie un objet de la classe connect avec la fonction "seConnecter" qu'on a créer avec
        // On créer la requete dans une variable pour pouvoir l'uliliter ailleurs
        $requete = $pdo->query("
            SELECT id_genre, libelle_genre FROM genre
        ");
    
        require "view/listGenres.php"; // Permets de relier la fonction au fichier "listActeurs.php" dans lequel on va l'utiliser
    }
}