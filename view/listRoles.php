<!-- Récupère toutes les données pour pouvoir les afficher ailleurs  -->
<?php ob_start(); ?> 

<?php
   
?>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
        </tr>
    </thead>

    <tbody>
        <?php
            foreach ($requete as $roles) { ?> <!-- Affiche les données de la requete grâce à un foreach -->
                <tr>
                    <td><?= $roles["id_role"] ?></td>
                    <td><?= $roles["libelle_role"] ?></td>
                </tr>
       <?php }
            $requete = null;
       ?>
    </tbody>
</table>

<?php
$titre = "Roles";
$titre_secondaire = "Les meilleurs roles de l'année";
$contenu = ob_get_clean(); // Récupère tout le contenu dans une variable
require "view/template.php";