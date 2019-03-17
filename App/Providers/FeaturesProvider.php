<?php 

namespace App\Providers;

class FeaturesProvider
{
  /**
   * Ajout d'un add action pour chaque feature
   *
   * @return void
   */
  public static function boot()
  {
    $features = config('features');
    foreach ($features as $feature) {
      add_action(...$feature);
    }
  }
}