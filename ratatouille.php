<?php

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
/**
 * Fonction pour ajouter un type de contenu recette
 * Ceci a été copier coller du site 
 * https://developer.wordpress.org/plugins/post-types/registering-custom-post-types/
 *
 * @return void
 */
function register_recipe_post_type()
{
  register_post_type(
    'recipe', // Le slug du type de contenu 
    array( // un tableau contenant les configurations pour créer le type de contenu recette
      'labels' => array( // la key labels contient un tableau avec des labels pour les différents endroit où il y a le le type de contenu recette
        'name' => __('Recette'),
        'singular_name' => __('Recette'),
      ),
      'public' => true,// affichage public dans le menu 
      'has_archive' => true, // archivage de ce type de contenu
    )
  );
}
add_action('init', 'register_recipe_post_type');