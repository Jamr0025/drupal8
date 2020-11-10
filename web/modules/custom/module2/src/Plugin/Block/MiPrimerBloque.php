<?php

namespace Drupal\module2\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a first code block.
  * Class MiPrimerBloque
 * @package Drupal\module2\Plugin\Block
 * @Block(
 *   id = "miPrimerBlouq",
 *   admin_label = @Translation("miPrimerBlouq"),
 * )
 */

class MiPrimerBloque extends BlockBase implements BlockPluginIterface {
// Access method here ...

  /**
   * {@inheritdoc}
   */
  public function build() {

    return [
      '#markup' => $this->t('The fax number is @number!'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    // Retrieve existing configuration for this block.
    $config = $this->getConfiguration();

    // Add a form field to the existing block configuration form.
    $form['fax_number'] = [
      '#type' => 'textfield',
      '#title' => t('Fax number'),
      '#default_value' => isset($config['fax_number']) ? $config['fax_number'] : '',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    // Save our custom settings when the form is submitted.
    $this->setConfigurationValue('fax_number', $form_state->getValue('fax_number'));
  }

  /**
   * {@inheritdoc}
   */
  public function blockValidate($form, FormStateInterface $form_state) {
    $fax_number = $form_state->getValue('fax_number');

    if (!is_numeric($fax_number)) {
      $form_state->setErrorByName('fax_number', t('Needs to be an integer'));
    }
  }
}
