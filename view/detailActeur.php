<?php
    ob_start(); // Récupère le contenu pour pouvoir l'afficher ailleurs
    $acteur = $requete->fetch(); // On instancie une variable qui contient les données de la requete grâce au fetch
?>

<h1><?= $acteur["nom_acteur"] ?></h1>

<p>
    <!-- On viens chercher chaque données qui nous intéressent dans la requête qu'on a initialement instancier -->
    Nom : <?= $acteur["nom_acteur"] ?> <br>
    Prenom : <?= $acteur["prenom_acteur"] ?> <br>
    Sexe : <?= $acteur["sexe"] ?> <br>
    Naissance : <?= $acteur["naissance"] ?> <br>
</p>

<table>
    <thead>
        <tr>
            <th>Rôle</th>
            <th>Titre</th>
            <th>Année Sortie</th>
        </tr>
    </thead>

    <tbody>
        <!-- On récupère et on affiche les données de la requete grâce à un foreach -->
        <!-- On utilise un "fetchAll" car un simple fetch ne renvoie qu'une ligne -->
        <?php foreach ($requete_filmographie->fetchAll() as $films) { ?> 
            <tr>
                <td> <?= $films["libelle_role"]?></td>
                <td> <?= $films["titre"]?></td>
                <td><?= $films["annee_sortie"] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Détail Acteur";
$titre_secondaire = "Detail acteur";
$contenu = ob_get_clean(); // Récupère tout le contenu dans une variable
require "view/template.php";