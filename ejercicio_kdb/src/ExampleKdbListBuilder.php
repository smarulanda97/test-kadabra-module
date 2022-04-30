<?php

namespace Drupal\ejercicio_kdb;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;

/**
 * Defines a class to build a listing of Example kdb entities.
 *
 * @ingroup ejercicio_kdb
 */
class ExampleKdbListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Entity ID');
    $header['data1'] = $this->t('Dato 1');
    $header['data2'] = $this->t('Dato 2');

    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var \Drupal\ejercicio_kdb\Entity\ExampleKdb $entity */

    $row['id'] = $entity->id();
    $row['data1'] = $entity->getData1();
    $row['data2'] = $entity->getData2();

    return $row + parent::buildRow($entity);
  }

}
