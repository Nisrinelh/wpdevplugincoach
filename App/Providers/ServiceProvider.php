<?php

namespace App\Providers;

class ServiceProvider
{

  /**
   * Chargement des services qui se trouvent dans le fichier providers qui se trouve dans le dossier config
   *
   * @return void
   */
  public static function boot()
  {
    $services = config('providers');
    foreach ($services as $service) {
      call_user_func([$service, 'boot']);
    }
  }
}