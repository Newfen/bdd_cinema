<?php

namespace Controller;
use Model\Connect;

class ActeurController {

    public function acteurDisplay(){

        $pdo = Connect::seConnecter(); // On instancie un objet de la classe connect avec la fonction "seConnecter" qu'on a créer avec
        // On créer la requete dans une variable pour pouvoir l'uliliter ailleurs
        $requete = $pdo->query("
            SELECT id_acteur, nom_acteur, prenom_acteur FROM acteur
        ");
    
        require "view/listActeurs.php"; // Permets de relier la fonction au fichier "listActeurs.php" dans lequel on va l'utiliser
    }

    public function detailActeur($id){

        $pdo = Connect::seconnecter();
        $requete = $pdo->prepare("
            SELECT id_acteur, nom_acteur, prenom_acteur, sexe, naissance
            FROM acteur
            where id_acteur = :id
        "); 
        $requete->execute([
            "id" => $id
        ]); // Permets de lier l'id sur lequel on click

        $requete_filmographie = $pdo->prepare("
        SELECT libelle_role, titre, annee_sortie
        FROM acteur a
        INNER JOIN casting c ON a.id_acteur = c.acteur_id
        INNER JOIN film f ON c.film_id = f.id_film
        INNER JOIN role r ON c.role_id = r.id_role
        WHERE c.acteur_id = :id
        ");
        $requete_filmographie->execute([
            "id" => $id
        ]);

        require "view/detailActeur.php";
    }

    public function vuAddActeur(){
        $path = 'view/listActeurs';
        require $path;
    }

    public function addActeur(){

        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $sexe = filter_input(INPUT_POST, 'sexe', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $naissance = filter_input(INPUT_POST, 'naissance', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($nom && $prenom && $sexe && $naissance){
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare('INSERT INTO acteur (nom_acteur, prenom_acteur, sexe, naissance) VALUES (:nom, :prenom, :sexe, :naissance)');
            $requete->execute([
                'nom' => $nom,
                'prenom' => $prenom,
                'sexe' => $sexe,
                'naissance' => $naissance
            ]); 
            header('Location: index.php?action=listActeurs');
            die();
        } else {
            echo "L'envoie n'a pas pu s'effecter";
        } 
    }
}