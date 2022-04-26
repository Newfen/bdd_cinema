<!-- Récupère toutes les données pour pouvoir les afficher ailleurs  -->
<?php 
ob_start(); 

?> 

<?php
   
?>

<div class="container">
    <table>
        <thead>
            <tr>
                <th>Films</th>
                <th>Année sortie</th>
            </tr>
        </thead>

        <tbody>
            <?php
                foreach ($requete as $film) { ?>  <!-- Affiche les données de la requete grâce à un foreach -->
                    <tr>
                        <td><a href="index.php?action=detailFilm&id= <?= $film["id_film"] ?>"><?= $film["titre"]; ?></a></td>
                        <td><?= $film["annee_sortie"] ?></td>
                    </tr>
        <?php }
                $requete = null;
        ?>
        </tbody>
    </table>

    <form action="index.php?action=addActeur" method="post"> 
        <label>Nom</label>
        <input type="text" name="nom" >
        <label>Prenom</label>
        <input type="text" name="prenom">
        <label>Sexe</label>
        <select>
            <option value="">
                <?php 
                var_dump($requete_real);
                // foreach($requete_real as $real){
                //     echo $real;
                // }
                ?>
            </option>
        </select>
        <label>Naissance</label>
        <input type="date" name="naissance">
        <input type="submit">
    </form>
</div>

<?php
$titre = "Filmographie";
$titre_secondaire = "Les films (nombre film)";
$contenu = ob_get_clean(); // Récupère tout le contenu dans une variable
require "view/template.php";