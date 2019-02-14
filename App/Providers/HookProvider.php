<?php

namespace App\Providers;

class HookProvider
{
  /**
   * Ajouter les listenings aux actions et au filters
   *
   * @return void
   */
  public static function boot()
  {
    $hooks = config('hooks');
    $actions = $hooks['actions'];
    $filters = $hooks['filters'];

    foreach ($actions as $action) {
      add_action($action[0], $action[1]);
    }

    foreach ($filters as $event => $callback) {
      add_filter($event, $callback);
    }
  }
}