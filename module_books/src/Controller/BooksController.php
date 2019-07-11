<?php
namespace Drupal\module_books\Controller;
/**
 * BooksController Class for testing my new module page.
 */

use Drupal\Core\Controller\ControllerBase;

/**
 * Controller class.
 */
class BooksController extends ControllerBase{

    public function myBooks(){

        return[
            '#type' => 'markup',
            '#markup' => '<h2>A page from my Books Controller.</h2>'
        ];
    }

}