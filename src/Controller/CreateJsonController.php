<?php

namespace Drupal\siteapi\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Drupal\Core\Database\Database;
use Drupal\Core\Entity\Entity;
use Symfony\Component\HttpFoundation\Response;
use Drupal\node\NodeInterface;

  class CreateJsonController extends ControllerBase {

    public function get_json_content($api, NodeInterface $node) {
      
      
      //$connection = Database::getConnection();
      $title = $node->getTitle();

      if(empty($title)){
        throw new \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException();
      }

      $response = new Response();
      $response->setContent(json_encode(array('title' => $title,)));
      $response->headers->set('Content-Type', 'application/json');
      return $response;
    }
  }//close class();