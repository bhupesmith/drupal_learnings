<?php

namespace Drupal\reusable_forms\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a reusable forms plugin annotation object.
 *
 * @Annotation
 *
 */

class ReusableForm extends Plugin{
    
    /**
     * The Plugin ID.
     *
     * @var string
     */
    public $id;

    /**
     * The name of the Form Plugin.
     * 
     * @var \Drupal\Core\Annotation\Translation
     * 
     * @ingroup plugin_translatable
     */

     public $name;

      /**
       * The form class associated with thires Plugin.
       * It must Implement \Drupal\reusable_module\Form\ReusableFormInterface.
       * 
       * @var string
       */
     public $form;
}
