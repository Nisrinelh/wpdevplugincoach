<?php 

namespace App\Features\Taxonomies;

/**
 * Cette class à pour but d'enregistrer toutes les taxonomies
 */
class TaxonomyRegister
{
  public static function register()
  {
    RecipeTaxonomy::register();
  }
}