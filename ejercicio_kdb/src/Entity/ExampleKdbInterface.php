<?php

namespace Drupal\ejercicio_kdb\Entity;

use Drupal\taxonomy\TermInterface;
use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Provides an interface for defining Example kdb entities.
 *
 * @ingroup ejercicio_kdb
 */
interface ExampleKdbInterface extends ContentEntityInterface {

  /**
   * Gets value for field "dato_1"
   *
   * @return int
   */
  public function getData1(): int;

  /**
   * Sets value for field "dato_2"
   *
   * @param int $data1
   *
   * @return \Drupal\ejercicio_kdb\Entity\ExampleKdbInterface
   */
  public function setData1(int $data1);

  /**
   * Gets value for field "dato_2"
   *
   * @return int
   */
  public function getData2(): int;

  /**
   * Sets value for field "dato_2"
   *
   * @param int $data2
   *
   * @return \Drupal\ejercicio_kdb\Entity\ExampleKdbInterface
   */
  public function setData2(int $data2);

  /**
   * Gets val of entity reference field "tag"
   *
   * @return \Drupal\taxonomy\TermInterface
   */
  public function getTag(): TermInterface;

  /**
   * Sets val of entity reference field "tag"
   *
   * @param \Drupal\taxonomy\TermInterface $tag
   *
   * @return \Drupal\ejercicio_kdb\Entity\ExampleKdbInterface
   */
  public function setTag(TermInterface $tag);


  /**
   * Gets the Example kdb creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Example kdb.
   */
  public function getCreatedTime();

  /**
   * Sets the Example kdb creation timestamp.
   *
   * @param int $timestamp
   *   The Example kdb creation timestamp.
   *
   * @return \Drupal\ejercicio_kdb\Entity\ExampleKdbInterface
   *   The called Example kdb entity.
   */
  public function setCreatedTime($timestamp);
}
