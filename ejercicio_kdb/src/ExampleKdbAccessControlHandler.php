<?php

namespace Drupal\ejercicio_kdb;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Entity\EntityAccessControlHandler;

/**
 * Access controller for the Example kdb entity.
 *
 * @see \Drupal\ejercicio_kdb\Entity\ExampleKdb.
 */
class ExampleKdbAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\ejercicio_kdb\Entity\ExampleKdbInterface $entity */

    switch ($operation) {
      case 'view':
        return AccessResult::allowedIfHasPermission($account, 'view published example kdb entities');
      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit example kdb entities');
      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete example kdb entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add example kdb entities');
  }

}
