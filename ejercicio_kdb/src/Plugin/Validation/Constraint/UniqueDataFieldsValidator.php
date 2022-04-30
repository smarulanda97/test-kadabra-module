<?php

namespace Drupal\ejercicio_kdb\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Mixed value between field dato_1 and field dato_2 must be unique
 *
 * This class doesn't follow Liskov Substitutio Principle, for that reason
 * only should use with Entity instances of \Drupal\ejercicio_kdb\Entity\ExampleKdbInterface
 *
 * @Todo = "Applies Liskov Substitution Principle"
 *
 */
class UniqueDataFieldsValidator extends ConstraintValidator {

  /**
   * {@inheritDoc}
   */
  public function validate($value, Constraint $constraint) {
    /** @var \Drupal\Core\Field\FieldItemListInterface $value */
    /** @var \Drupal\ejercicio_kdb\Entity\ExampleKdbInterface $entity */
    $entity = $value->getEntity();
    $entityId = $entity->id();
    $idKey = $entity->getEntityType()->getKey('id');

    $query = \Drupal::entityQuery($entity->getEntityTypeId());
    $query->accessCheck();

    if (isset($entityId)) {
      $query->condition($idKey, $entityId, '<>');
    }

    $valueTaken = (bool) $query
      ->condition('dato_1', $entity->getData1())
      ->condition('dato_2', $entity->getData2())
      ->range(0, 1)
      ->count()
      ->execute();

    if (!$valueTaken) {
      return;
    }

    $this->context->addViolation($constraint->message, [
      '@entity_type' => $entity->getEntityType()->getSingularLabel(),
      '@value1' => (string) $entity->getData1(),
      '@value2' => (string) $entity->getData2(),
    ]);
  }
}