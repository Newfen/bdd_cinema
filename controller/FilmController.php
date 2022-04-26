<?php

namespace Controller;
use Model\Connect;

class FilmController {

    public function filmDisplay(){

        $pdo = Connect::seConnecter(); // On instancie un objet de la classe connect avec la fonction "seConnecter" qu'on a créer avec
        // On créer la requete dans une variable pour pouvoir l'uliliter ailleurs
        $requete = $pdo->query("
            SELECT id_film, titre, annee_sortie FROM film
        ");
    
        require "view/listFilms.php"; // Permets de relier la fonction au fichier "listActeurs.php" dans lequel on va l'utiliser
    }

    public function detailFilm($id){ 

        $pdo = Connect::seconnecter();
        $requete = $pdo->prepare("
            SELECT id_film, titre, resume, duree, note, genre_id, real_id, annee_sortie 
            FROM film
            where id_film = :id 
        ");
        $requete->execute([ "id" => $id ]); // Permets de lier l'id sur lequel on click
     
        $requete_casting = $pdo->prepare("
        SELECT a.id_acteur, nom_acteur, prenom_acteur, libelle_role
        FROM acteur a
        inner join casting c on a.id_acteur = c.acteur_id
        inner join role r on c.role_id = r.id_role
        inner join film f on c.film_id = f.id_film
        where f.id_film = :id
        ");
        $requete_casting->execute([
            "id" => $id
        ]);
        require "view/detailFilm.php";
    }

}