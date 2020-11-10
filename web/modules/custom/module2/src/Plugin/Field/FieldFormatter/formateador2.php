<?php

namespace Drupal\module2\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'field_example_simple_text' formatter.
 * Class formateador2
 * @package Drupal\modulo2\Plugin\Field\FieldFormatter
 *
 * @FieldFormatter(
 *   id = "field_formatter_v2_mod2",
 *   module = "modulo2",
 *   label = @Translation("FormateadorTexto2"),
 *   field_types = {
 *     "string"
 *   }
 * )
 */
class formateador2 extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    foreach ($items as $delta => $item) {
      $elements[$delta] = [
        // We create a render array to produce the desired markup,
        // "<p style="color: #hexcolor">The color code ... #hexcolor</p>".
        // See theme_html_tag().
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#attributes' => [
          'style' => 'color: ' . $item->value,
        ],
        '#value' => "hoal",
      ];
    }

    return $elements;
  }

}
