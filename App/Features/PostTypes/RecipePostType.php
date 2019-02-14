<?php 

namespace App\Features\PostTypes;

class RecipePostType
{
  /**
   * Enregistrement du type de contenu recipe
   *
   * @return void
   */
  public static function register()
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
}