<?php
namespace Drupal\module_books\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterFace;
class BooksConfigForm extends ConfigFormBase{

    public function getFormId(){
        return "books_config_mymodule";
    }

    public function buildForm(array $form, FormStateInterFace $form_state){
        $config = $this->config('module_books.settings');
//kint($config); die;
        $form['person_name'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Name'),
            '#default_value' => $config->get('person_name'),
        ];

        $form['person_title'] = [
            '#type' => 'select',
            '#title' => $this->t('Title'),
            '#options' => [
              '1' => $this->t('Mr.'),
              '2' => $this->t('Mrs.'),
              '3' => $this->t('Ms.'),
            ],
            '#default_value' => $config->get('person_title'),
          ];

          $form['person_gender'] = array(
            '#type' => 'radios',
            '#title' => $this->t('Gender'),
            '#default_value' => $config->get('person_gender'),
            '#options' => array(
              '0' => $this->t('Male'),
              '1' => $this->t('Female'),
              '2' => $this->t('Other'),
            ),
          );

        return parent::buildForm($form, $form_state);
    }

    protected function getEditableConfigNames(){
        return [
            'module_books.settings'
        ];
    }
    public function submitForm(array &$form, FormStateInterFace $form_state){
        //kint($form['person_gender']['#options']); die();

        $config = $this->configFactory->getEditable('module_books.settings');
        $config->set('person_name', $form_state->getValue('person_name'))->save();
        $config->set('person_title', $form_state->getValue('person_title'))->save();
        $config->set('person_gender', $form_state->getValue('person_gender'))->save();
       

        parent::submitForm($form, $form_state);
    }
}