<!-- Récupère toutes les données pour pouvoir les afficher ailleurs  -->
<?php ob_start(); ?>  

<div class="container">
    <table class="acteur-table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
            </tr>
        </thead>

        <tbody>
            <?php
                foreach ($requete as $acteur) { ?> <!-- Affiche les données de la requete grâce à un foreach -->
                    <tr>
                        <td><a href="index.php?action=detailActeur&id= <?= $acteur["id_acteur"] ?>"><?= $acteur["nom_acteur"] ?></a></td>
                        <td><?= $acteur["prenom_acteur"] ?></td>
                    </tr>
        <?php }
                $requete = null;
        ?>
        </tbody>
    </table>

    <!-- Permets de préciser la méthode du controller qu'on veut utiliser grâce à l'action qu'on vise via l'index dans le case -->
    <form action="index.php?action=addActeur" method="post"> 
        <label>Nom</label>
        <input type="text" name="nom">
        <label>Prenom</label>
        <input type="text" name="prenom">
        <label>Sexe</label>
        <input type="text" name="sexe">
        <label>Naissance</label>
        <input type="date" name="naissance">
        <input type="submit">
    </form>
</div>


<?php
$titre = "Acteurs";
$titre_secondaire = "Les acteurs de L.A";
$contenu = ob_get_clean(); // Récupère tout le contenu dans une variable
require "view/template.php";