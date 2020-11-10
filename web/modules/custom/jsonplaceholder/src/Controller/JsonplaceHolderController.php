<?php

namespace Drupal\jsonplaceholder\Controller;
use Drupal\Core\Controller\ControllerBase;

/**
 * Class JsonplaceHolderController
 * @package Drupal\jsonplaceholder\Controller
 */

class JsonplaceHolderController extends ControllerBase{

  /**
   * pinta la fecha actual
   * @return array
   */
  public function render(){

    $jsonplaceholder_client = \Drupal::service('jsonplaceholder.jsonplaceholder_client');
    $items = $jsonplaceholder_client->getPosts();

    $build = [
      '#type' => 'markup',
      '#markup' => $items,
      '#theme' =>'jsonplaceholder_posts',
      '#titulo'=>'Posts',
      '#items'=>$items,
    ];
    return $build;
  }


  function renderTwig(){

    return[
      '#theme' => 'post_list',
      '#title' => "pos esto mismo",
    ];
  }
}


