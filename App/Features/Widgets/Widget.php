<?php 

namespace App\Features\Widgets;

/**
 * Class pour charger tout les widgets
 * https://developer.wordpress.org/themes/functionality/widgets/
 */
class Widget
{
  public static function init()
  {
    DishOfTheDayWidget::register();
  }
}