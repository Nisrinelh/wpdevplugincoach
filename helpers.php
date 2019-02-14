<?php

/**
 * fonction pour rendre une view
 *
 * @param string $path chemin du fichier à partir du dossier views sans l'extention .html.php
 * @param array $data tableau de donner qui sont passer dans la view
 * @return void
 */
function view($path, $data = array())
{
  extract($data);
  include(RAT_VIEW_DIR . $path . '.html.php');
}