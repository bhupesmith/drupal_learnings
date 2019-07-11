<?php
namespace Drupal\module_hero\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Our custom hero form.
 */
class HeroForm extends FormBase {
  /**
     * {@inheritdoc}
     */
    public function getFormId(){
        return "module_hero_heroform";
    }
  /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state){
        
        $form['rival_1'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Rival One'),
        ];
        $form['rival_2'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Rival Two'),
        ];
        
        $form['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Who will win?'),
        ];

        return $form;

    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state){
        $winner = rand(1, 2);

        drupal_set_message(
            'The Winner Between'. $form_state->getValue('rival_1').' and '. $form_state->getValue('rival_1') . ' 
            is : '. $form_state->getValue('rival_'.$winner) 
        );
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state){
       if( empty( $form_state->getValue('rival_1') ) ){
           $form_state->setErrorByName('rival_1', $this->t('Please enter the required firld Rival one'));
       }
    }

}