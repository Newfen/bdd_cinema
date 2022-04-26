<?php

namespace Controller;
use Model\Connect;

class RoleController {

    public function roleDisplay(){

        $pdo = Connect::seConnecter(); // On instancie un objet de la classe connect avec la fonction "seConnecter" qu'on a créer avec
        // On créer la requete dans une variable pour pouvoir l'uliliter ailleurs
        $requete = $pdo->query(" 
            SELECT id_role, libelle_role FROM role
        ");
    
        require "view/listRoles.php"; // Permets de relier la fonction au fichier "listActeurs.php" dans lequel on va l'utiliser
    }
}