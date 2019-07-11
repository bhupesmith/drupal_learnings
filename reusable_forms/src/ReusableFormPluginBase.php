<?php

namespace Drupal\reusable_form;

use Drupal\Component\Plugin\PluginBase;
use Drupal\Core\Form\FormBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class ReusableFormPluginBase extends PluginBase implements ReusableFormPluginInterfacec {
    /**
     * The form Builder.
     * 
     * @var \Drupal\Core\Form\FormBuilder.
     */
    protected $formBuilder;

    /**
     * Construct a ReusableFormPluginBase object. 
     * 
     * @param array $configuration
     * @param string $plugin_id
     * @param mixed $plugin_defination
     * @param FormBuilder $form_builder
     * 
     */
    public function __construct(array $configuration, $plugin_id, $plugin_defination, FormBuilder $form_builder){
        parent::__construct($configuration, $plugin_id, $plugin_defination);
        $this->formBuilder = $form_builder;

    }

    public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_defination){
        return new static(
            $configuration,
            $plugin_id,
            $plugin_defination,
            $container->get('form_builder')
        );
    }
    
    /**
     * {@inheritdoc}
     */
    public function getName(){
        return $this->pluginDefinition['name'];
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(){
        return $this->formBuilder->getForm($this->pluginDefinition['name'], $entity);
    }

}