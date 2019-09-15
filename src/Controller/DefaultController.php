<?php
/**
 * Created by PhpStorm.
 * User: reese
 * Date: 9/15/19
 * Time: 5:37 PM
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController {

  /**
   * @Route("/")
   */
  public function homepage() {
    return new Response('Hello World!');
  }

  /**
   * @Route("/about")
   */
  public function about() {
    return new Response('@todo: create about page 314');
  }
}