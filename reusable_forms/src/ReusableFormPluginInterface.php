<?php

namespace Drupal\reusable_forms;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Component\Plugin\PluginInspectionInterface;

interface ReusableFormPluginInterface extends PluginInspectionInterface, ContainerFactoryPluginInterface{
    /**
     * Return the name of the reusable form plugin.
     *
     * @return string
     */
    public function getName();

    /**
     * Builds the associated form.
     *
     * @param $entity EntityInterface.
     *   The entity this plugin is associated with.
     * 
     * @return array().
     *   Render array of forms that implements \Drupal\reusable_forms\Form\ReusableFormInterface.
     */
    public function buildForm($entity);
}