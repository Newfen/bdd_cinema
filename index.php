<?php

// Fait appel au controller dont on a besoin à la manière d'un "require"
use Controller\FilmController;
use Controller\GenreController;
use Controller\RealController;
use Controller\ActeurController;
use Controller\RoleController;

spl_autoload_register(function ($class_name) {
    include $class_name.'.php';
});

// Instanciation d'un objet controller pour chaque controller
$ctrlFilm = new FilmController();
$ctrlGenre = new GenreController();
$ctrlReal = new RealController();
$ctrlActeur = new ActeurController();
$ctrlRole = new RoleController();

// Définis l'affichage du fichier qu'on l'on souhaite afficher grâce à l'action qu'on lui donne dans l'url
// Exemple : http://localhost/Base_donnee/cinema_bdd/?action=listFilms 

if(isset($_GET["action"])){
    switch ($_GET["action"]) {
        case "listFilms": $ctrlFilm->filmDisplay(); break;
        case "listGenres": $ctrlGenre->genreDisplay(); break;
        case "listRealisateurs": $ctrlReal->realDisplay(); break;
        case "listActeurs": $ctrlActeur->acteurDisplay(); break;
        case "listRoles": $ctrlRole->roleDisplay(); break;
        case "detailFilm": $ctrlFilm->detailFilm($_GET["id"]); break;
        case "detailActeur": $ctrlActeur->detailActeur($_GET["id"]); break;
        case "addActeur": $ctrlActeur->addActeur(); break;
    }
}