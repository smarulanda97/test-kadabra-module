<?php

namespace Drupal\ejercicio_kdb\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the Example kdb entity.
 *
 * @ingroup ejercicio_kdb
 *
 * @ContentEntityType(
 *   id = "ejemplo_kdb",
 *   label = @Translation("Example kdb"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\ejercicio_kdb\ExampleKdbListBuilder",
 *     "views_data" = "Drupal\ejercicio_kdb\Entity\ExampleKdbViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\ejercicio_kdb\Form\ExampleKdbForm",
 *       "add" = "Drupal\ejercicio_kdb\Form\ExampleKdbForm",
 *       "edit" = "Drupal\ejercicio_kdb\Form\ExampleKdbForm",
 *       "delete" = "Drupal\ejercicio_kdb\Form\ExampleKdbDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\ejercicio_kdb\ExampleKdbHtmlRouteProvider",
 *     },
 *     "access" = "Drupal\ejercicio_kdb\ExampleKdbAccessControlHandler",
 *   },
 *   base_table = "ejemplo_kdb",
 *   translatable = FALSE,
 *   admin_permission = "administer example kdb entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *     "langcode" = "langcode",
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/ejemplo_kdb/{ejemplo_kdb}",
 *     "add-form" = "/admin/structure/ejemplo_kdb/add",
 *     "edit-form" = "/admin/structure/ejemplo_kdb/{ejemplo_kdb}/edit",
 *     "delete-form" = "/admin/structure/ejemplo_kdb/{ejemplo_kdb}/delete",
 *     "collection" = "/admin/structure/ejemplo_kdb",
 *   },
 *   field_ui_base_route = "ejemplo_kdb.settings"
 * )
 */
class ExampleKdb extends ContentEntityBase implements ExampleKdbInterface {

  use ExampleKdbTrait;

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp) {
    $this->set('created', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    // Add field definition to entity
    $fields += self::exampleKdbBaseFieldDefinitions($entity_type);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    return $fields;
  }
}
