<?php

use App\Providers\ServiceProvider;
// use App\Features\PostTypes\RecipePostType;
// Ajout du fichier env.php pour les constantes global
require_once('env.php');
// Ajout du fichier helpers.php pour disposé des fonctions helper
require_once('helpers.php');

//Lancement du chargement des provider
ServiceProvider::boot();
