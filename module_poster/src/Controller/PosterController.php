<?php 
namespace Drupal\module_poster\Controller;

use Drupal\Core\Controller\ControllerBase;

class PosterController extends ControllerBase{

    public function posterList(){
        $posters = array('Poster 1','Poster 2','Poster 3');
        //kint($posters);die;

        
        // return [
        //     '#type' => 'markup',
        //     '#markup' => 'Working as per the need'
        // ];

        return[
            '#theme' => 'poster_list',
            '#posters' => $posters,
            '#title' => 'List of posters from Learning Module'
        ];
    }
}