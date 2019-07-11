<?php

namespace Drupal\reusable_forms;

use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;

class ReusableFormManager extends DefaultPluginManager{

    public function __construct(\Traversable $namespace, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler){
        parent::__construct( 'Plugin/ReusableForm', $namespace, $module_handler, 'Drupal\reusable_forms\ReusableFormPluginInterface', 'Drupal\reusable_form\Annotation\ReusableForm' );
        $this->alterInfo('reusable_forms_info');
        $this->setCacheBackend($cache_backend, 'reusable_forms');
    }
}