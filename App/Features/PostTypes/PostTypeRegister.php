<?php

namespace App\Features\PostTypes;

/**
 * Cette class à pour but d'enregistrer tout les postType afin de n'avoir qu'un event pour les postTypes au lieu d'un event par postType
 */
class PostTypeRegister
{
  public static function register()
  {
    RecipePostType::register();
  }
}