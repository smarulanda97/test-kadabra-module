<?php

namespace Drupal\ejercicio_kdb\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 *
 * Checks if an entity field has a unique value.
 *
 * @Constraint(
 *   id = "UniqueDataFields",
 *   label = @Translation("Unique data fields", context = "Validation"),
 * )
 */

class UniqueDataFieldsConstraint extends Constraint {

  public string $message = "A @entity_type with dato_1 => @value1 and dato_2 => @value2 already exists.";

  /**
   * {@inheritdoc}
   */
  public function validatedBy() {
    return  '\Drupal\ejercicio_kdb\Plugin\Validation\Constraint\UniqueDataFieldsValidator';
  }
}