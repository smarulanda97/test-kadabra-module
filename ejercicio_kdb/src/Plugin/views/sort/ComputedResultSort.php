<?php

namespace Drupal\ejercicio_kdb\Plugin\views\sort;

use Drupal\views\Plugin\views\sort\SortPluginBase;
use Drupal\ejercicio_kdb\Helper\CalculateResultHelper;


/**
 * Sort row by computed result calculated of
 *
 * @see CalculateResultHelper::getComputedResultRule()
 *
 * @ViewsSort("computed_result_sort")
 */
class ComputedResultSort  extends SortPluginBase {

  /**
   * {@inheritDoc}
   */
  public function query() {
    $this->ensureMyTable();

    $statement = CalculateResultHelper::getComputedResultSQLRule();

    $this->query->addOrderBy(NULL, $statement, $this->options['order'], $this->realField);
  }
}