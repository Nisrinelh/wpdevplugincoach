<?php

use App\Features\PostTypes\RecipePostType;
use App\Features\Taxonomies\RecipeTaxonomy;
use App\Features\MetaBoxes\RecipeDetailsMetabox;

/**
 * Plugin Name:     Ratatouille
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     ratatouille
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Ratatouille
 */

// Your code starts here.
 // Import du autoload.php pour récuperer les class automatiquement sans devoir un require
require_once('autoload.php');

 //lancement de l'application
require_once('bootstrap.php');