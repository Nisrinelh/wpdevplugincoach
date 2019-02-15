<?php

namespace App\Interfaces;

interface MetaBoxInterface
{
  public static function add_meta_box();
  public static function render();
  public static function save(int $post_id);
}