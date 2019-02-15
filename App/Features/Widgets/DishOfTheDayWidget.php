<?php

namespace App\Features\Widgets;

class DishOfTheDayWidget extends \WP_Widget
{
  public static $slug = "dish-of-the-day";

  //ici on peut définir des arguments en plus que l'on pourrait passer à la vue qui s'affiche sur le front office
  public $args = array(
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
    'before_widget' => '<div class="widget-wrap">',
    'after_widget' => '</div></div>',
    'self' => self::class
  );

  /**
   * le construct est lancé lorsque l'on instentie la class on passe à la class parent le slug et le titre
   */
  function __construct()
  {

    parent::__construct(
      self::$slug,  // slug
      __("Plat du jour")   // Titre 
    );



  }
  /**
   * enregistrement du widget
   *
   * @return void
   */
  public static function register()
  {
    register_widget(self::class);
  }

  /**
   * methode pour arricher le widget sur le front
   *
   * @param [type] $arg argument de la class defini dans la propriété public
   * @param [type] $instance l'instance du widget sachant qu'il peut y avoir plusieurs widget utilisé
   * @return void
   */
  public function widget($args, $instance)
  {

    view('widgets/dish-of-day-widget', compact('arg', 'instance'));

  }

  /**
   * methode pour afficher le fomulaire dans le backoffire
   *
   * @param [type] $instance l'instance du widget sachant qu'il peut y avoir plusieurs widget utilisé
   * @return void
   */
  public function form($instance)
  {
    //les widgets génere des name specifique pour les inputs, il faut donc utiliser la methode get_field_name pour cela
    $title_name = self::get_field_name('title');
    $text_name = self::get_field_name('text');
    $title = !empty($instance['title']) ? esc_attr($instance['title']) : '';
    $text = !empty($instance['text']) ? esc_html($instance['text']) : '';

    view('widgets/dish-of-day-form', compact('title_name', 'text_name', 'title', 'text'));

  }

  /**
   * Methode pour updater les informations du widget
   *
   * @param [type] $new_instance
   * @param [type] $old_instance
   * @return void
   */
  public function update($new_instance, $old_instance)
  {

    $instance = array();

    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
    $instance['text'] = (!empty($new_instance['text'])) ? $new_instance['text'] : '';

    return $instance;
  }


}