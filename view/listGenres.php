<!-- Récupère toutes les données pour pouvoir les afficher ailleurs  -->
<?php ob_start(); ?>

<?php
   
?>

<table>
    <thead>
        <tr>
            <th>id Genre</th>
            <th>Nom Genre</th>
        </tr>
    </thead>

    <tbody>
        <?php
            foreach ($requete as $genres) { ?> <!-- Affiche les données de la requete grâce à un foreach -->
                <tr>
                    <td><?= $genres["id_genre"] ?></td>
                    <td><?= $genres["libelle_genre"] ?></td>
                </tr>
       <?php }
            $requete = null;
       ?>
    </tbody>
</table>

<?php
$titre = "Genres";
$titre_secondaire = "Les genres les plus populaires";
$contenu = ob_get_clean(); // Récupère tout le contenu dans une variable
require "view/template.php";