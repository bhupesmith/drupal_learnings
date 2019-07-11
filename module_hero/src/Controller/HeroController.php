<?php
namespace Drupal\module_hero\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Config\ConfigFactory;
use Drupal\module_hero\HeroArticleService;
use Drupal\Core\Session\AccountProxy;
/**
 * This is our Hero Controller
 */
class HeroController extends ControllerBase{

    private $articleService;
    protected $configFactory;
    protected $currentUser;

    public static function create(ContainerInterface $container ){
        return new static(
            $container->get('module_hero.hero_articles'),
            $container->get('config.factory'),
            $container->get('current_user')
        );
    }
    public function __construct( HeroArticleService $articleService, ConfigFactory $configFactory, AccountProxy $currentUser ){
        $this->articleService = $articleService;
        $this->configFactory = $configFactory;
        $this->currentUser = $currentUser;
    }
    public function heroList(){
     //$config_obj =  \Drupal::config('module_books.settings');
     //  kint($this->configFactory->get('module_hero.settings')->get('hero_list_title'));die();
     // kint($this->configFactory->get('module_books.settings'));die();
      // kint($this->configFactory->get('module_books.settings')->getRawData());die;
     
        $heros = [
            ["name" => "Ram"],
            ["name" => "Luxman"],
            ["name" => "Krishna"],
            ["name" => "Balram"]
        ];
        // $ourHeros = '';
        // foreach($heros as $hero){
           
        //     $ourHeros .= '<li>'.$hero['name'].'</li>';
        // }

        // return [
        //     '#type' => 'markup',
        //     '#markup' => '<h2>'.$this->t(' These are the most voted heros..') .'</h2><ol>'. $ourHeros.'</ol>',
        // ];
        // return [
        //     '#theme' => 'hero_list',
        //     '#items' => $heros,
        //     '#title' => $this->configFactory->get('module_hero.settings')->get('hero_list_title')
        // ];

        if ($this->currentUser->hasPermission('can see hero list')) {
            return [
              '#theme' => 'hero_list',
              '#items' => $heros,
              '#title' => $this->configFactory->get('module_hero.settings')->get('hero_list_title'),
            ];
          }
          else {
            return [
              '#theme' => 'hero_list',
              '#items' => [],
              '#title' => $this->configFactory->get('module_hero.settings')->get('hero_list_title'),
            ];
          }


    }
}