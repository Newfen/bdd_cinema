<?php
ob_start(); // Récupère le contenu pour pouvoir l'afficher ailleurs
$film = $requete->fetch(); // On instancie une variable qui contient les données de la requete grâce au fetch
?>

<h1><?= $film["titre"] ?></h1>

<p>
    <!-- On viens chercher chaque données qui nous intéressent dans la requête qu'on a initialement instancier -->
    Titre : <?= $film["titre"] ?> <br>
    Resume : <?= $film["resume"] ?> <br>
    Durée : <?= $film["duree"] ?> <br>
    Note : <?= $film["note"] ?> <br>
    Année sortie : <?= $film["annee_sortie"]; $requete = null; ?> <br>
</p>



<table>
    <thead>
        <tr>
            <th>Acteur</th>
            <th>Rôle</th>
        </tr>
    </thead>

    <tbody>
        <!-- On récupère et on affiche les données de la requete grâce à un foreach -->
        <!-- On utilise un "fetchAll" car un simple fetch ne renvoie qu'une ligne -->
        <?php foreach ($requete_casting->fetchAll() as $casting) { ?> 
            <tr>
                <td><a href="index.php?action=detailActeur&id=<?= $casting["id_acteur"] ?>"> <?= $casting["nom_acteur"]." ".$casting["prenom_acteur"] ?> </a></td>
                <td><?= $casting["libelle_role"] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Détail Films";
$titre_secondaire = "Detail du film";
$contenu = ob_get_clean(); // Récupère tout le contenu dans une variable
require "view/template.php";
