<?php

namespace Drupal\ejercicio_kdb\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Example kdb entities.
 */
class ExampleKdbViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.
    return $data;
  }

}
