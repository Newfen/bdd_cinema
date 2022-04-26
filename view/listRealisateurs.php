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
            foreach ($requete as $reals) { ?>  <!-- Affiche les données de la requete grâce à un foreach -->
                <tr>
                    <td><?= $reals["nom_real"] ?></td>
                    <td><?= $reals["prenom_real"] ?></td>
                </tr>
       <?php }
            $requete = null;
       ?>
    </tbody>
</table>

<?php
$titre = "Realisateurs";
$titre_secondaire = "Les réalisateurs du bat 7";
$contenu = ob_get_clean(); // Récupère tout le contenu dans une variable
require "view/template.php";