<?php

namespace App\Providers;

class RoutesProvider
{

  public static function boot()
  {
    $routes  = include(RAT_PLUGIN_DIR . 'routes/action.php');

    //On charge les différentes types de routes d'action
    foreach ($routes as $key => $actions) {
      foreach ($actions as $action) {
        $action[0] = $key . '_' . $action[0];
        add_action(...$action);
      }
    }
  }
}
