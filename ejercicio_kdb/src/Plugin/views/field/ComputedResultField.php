<?php

namespace Drupal\ejercicio_kdb\Plugin\views\field;

use Drupal\views\ResultRow;
use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\ejercicio_kdb\Entity\ExampleKdbInterface;
use Drupal\ejercicio_kdb\Helper\CalculateResultHelper;

/**
 * A handler to provide a field that returns a computed value.
 *
 * Result is calculated of following way: (field_dato_1 * 5) + (field_dato_2 * 10)
 *
 * @ingroup views_field_handlers
 *
 * @ViewsField("computed_result_field")
 */
class ComputedResultField extends FieldPluginBase {

  /**
   * {@inheritdoc}
   */
  public function usesGroupBy() {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function query() {

    // Do nothing -- to override the parent query.
  }

  /**
   * {@inheritdoc}
   */
  protected function defineOptions() {
    $options = parent::defineOptions();
    $options['hide_alter_empty'] = ['default' => FALSE];
    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function render(ResultRow $values) {
    if (!($values->_entity instanceof ExampleKdbInterface)) {
      return 'This plugin must be used for instances of ' . ExampleKdbInterface::class;
    }

    /** @var \Drupal\ejercicio_kdb\Entity\ExampleKdbInterface $entity */
    $entity = $values->_entity;

    return CalculateResultHelper::getComputedResult($entity->getData1(), $entity->getData2());
  }
}
