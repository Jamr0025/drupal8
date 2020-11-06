<?php

namespace Drupal\module1\Controller;
use Drupal\Core\Controller\ControllerBase;

class Module1Controller extends ControllerBase{

  //nos muestra la hora
  function render(){

    return[
      '#type' => 'markup',
      '#markup' => time(),
    ];
  }


  function renderTwig(){

    return[
      '#theme' => 'post_list',
      '#title' => "pos esto mismo",
    ];
  }
}


