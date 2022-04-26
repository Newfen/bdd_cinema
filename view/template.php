<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title><?= $titre ?></title>
</head>

<body>
    <div id="wrapper">
        <nav>
            <a href="http://localhost/Base_donnee/cinema_bdd/?action=listFilms">Films</a>
            <a href="http://localhost/Base_donnee/cinema_bdd/?action=listActeurs">Acteurs</a>
            <a href="index.php?action=listRealisateurs">Réalisateurs</a>
            <a href="index.php?action=listGenres">Genres</a>
            <a href="index.php?action=listRoles">Roles</a>
        </nav>
        <main>
            <div id="contenu">
                <h1> PDO Cinema</h1>
                <!-- Reprends les variabes du "ob_start" utiliser dans chaque view  -->
                <h2><?= $titre_secondaire ?></h2>
                <?= $contenu ?>
            </div>
        </main>
    </div>
</body>
</html>