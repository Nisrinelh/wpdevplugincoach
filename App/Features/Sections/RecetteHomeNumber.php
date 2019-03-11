<?php

namespace App\Features\Sections;

class RecetteHomeNumber
{
  /**
   * Enregistrement de la section
   *
   * @return void
   */
  public static function init()
  {
    // https://developer.wordpress.org/reference/functions/add_settings_section/
    add_settings_section(
      'recette-home-number', // l'id (slug) de la section
      __('Nombre de recette sur la home'), // le titre de la section qui apparaîtra
      [self::class, 'render'], // la méthode qui affichera le contenu de la secttion
      'reading' // l'id de la page à la quelle on ajoute la section
    );
    self::register_settings();
  }

  /**
   * Cette fonction enregistre les settings qui apparaîtrons dans la section afin qu'ils puissent être pris en compte lors de la sauvegarde de la page
   *
   * @return void
   */
  public static function register_settings()
  {
    //https://developer.wordpress.org/reference/functions/register_setting/
    register_setting(
      'reading', // ne slug de la page sur laquelle le setting se trouve
      'recette_home_number' // le name de l'input du setting
      // le troisème paramêtre est optionnel.
    );
  }

  /**
   * fonction pour render le contenu de la section
   */
  public static function render()
  {
    // Maintenant que la valeur est sauvegarder nous pouvons la récuperer de la base de donnée afin de la transmettre à la vue comme ça elle s'affiche sur la page après une sauvegarde ou un rechargement.
    // https://developer.wordpress.org/reference/functions/get_option/
    $recette_number = get_option('recette_home_number');
    view('sections/recette-home-number', compact('recette_number'));
  }
}
