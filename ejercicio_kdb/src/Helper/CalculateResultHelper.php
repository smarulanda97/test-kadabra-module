<?php

namespace Drupal\ejercicio_kdb\Helper;

class CalculateResultHelper {

  /**
   * If in this case it have an expensive operation in cost of memory.
   * I will implement this function and take advantage of Drupal Cache System
   *
   * @param int $data1
   * @param int $data2
   *
   * @return int
   */
  public static function getComputedResult(int $data1, int $data2): int {
    return (($data1 * 5) + ($data2 * 10));
  }

  /**
   * Return a string with the rule applies to calculate the computed result
   *
   * @return string
   */
  public static function getComputedResultSQLRule(): string {
    return '((dato_1 * 5) + (dato_2 * 10))';
  }
}