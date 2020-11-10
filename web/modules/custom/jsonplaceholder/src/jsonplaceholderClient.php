<?php

namespace Drupal\jsonplaceholder;
use Drupal\Component\Serialization\Json;
use Drupal\Core\Http\ClientFactory;

/**
 * Class JsonplaceHolderClient
 * @package Drupal\jsonplaceholder\Controller
 */

class JsonplaceholderClient{
  /**
   * cliente HTTP
   * @var \GuzzleHttp\ClientInterface
   */
  protected $client;
  //declaramos constructor para poder tener los datos que necesitamos
  public function __construct(ClientFactory $http_client_factory){
    $this->client = $http_client_factory->fromOptions([
      'base_uri' => 'https://jsonplaceholder.typicode.com/',
      'timeout' => 3,
    ]);

  }
  /**
   * get post form the jsonplaceholder webpage
   */
  function getPosts(){
    //hacer una llamada con curl a la URL que sea
    $response = $this->client->get('posts');
   //$boby = $response->getBody();
    //decodificar el json
    $items = Json::decode($response->getBody());

    //filtar los datos que llegan
    $items = array_slice($items,0,9);
    //retunr los datos
    return $items;
  }

}


