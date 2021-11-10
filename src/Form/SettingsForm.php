<?php

namespace Drupal\raychat\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;


class SettingsForm extends ConfigFormBase  {


    public function getFormId(){
        return 'raychat_settings';
    }

    /**
     * {@inheritdoc}
     */
    protected function getEditableConfigNames() {
      return ['raychat.settings'];
    }

    /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $config = $this->config('raychat.settings');

    $form['script'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Script'),
      '#placeholder' => $this->t('!function(){ ...'),
      '#default_value' => $config->get('script'),
	  '#rows' => 5,
    ];

    return parent::buildForm($form, $form_state);
  }


  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {


    $this->config('raychat.settings')
    ->set('script', $form_state->getValue('script'))
    ->save();

    parent::submitForm($form, $form_state);

  }




}
