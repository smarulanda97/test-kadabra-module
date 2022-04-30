<?php

namespace Drupal\ejercicio_kdb\Entity;

use Drupal\taxonomy\TermInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\Exception\UnsupportedEntityTypeDefinitionException;

trait ExampleKdbTrait {

  /**
   * Return field definitions for entity ExampleKdb
   *
   * @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
   *
   * @return array[]
   * @throws \Drupal\Core\Entity\Exception\UnsupportedEntityTypeDefinitionException
   */
  public static function exampleKdbBaseFieldDefinitions(EntityTypeInterface $entity_type): array {
    if (!is_subclass_of($entity_type->getClass(), ExampleKdbInterface::class)) {
      throw new UnsupportedEntityTypeDefinitionException('The entity ' . $entity_type->id() . ' must be implement \Drupal\ExampleKdb\Entity\ExampleKdbInterface');
    }

    $fields = [];

    $fields['dato_1'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Dato 1'))
      ->setRequired(TRUE)
      ->setDefaultValue(0)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'integer',
        'weight' => 0,
      ])
      ->setDisplayOptions('form', [
        'type' => 'integer',
        'weight' => 0,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->addConstraint('UniqueDataFields');

    $fields['dato_2'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Dato 2'))
      ->setRequired(TRUE)
      ->setDefaultValue(0)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'integer',
        'weight' => 0,
      ])
      ->setDisplayOptions('form', [
        'type' => 'integer',
        'weight' => 0,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->addConstraint('UniqueDataFields');

    $fields['etiqueta'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Etiqueta'))
      ->setSetting('target_type', 'taxonomy_term')
      ->setSetting('handler', 'default')
      ->setSetting('handler_settings',['target_bundles' => ['tags'=> 'tags']])
      ->setDisplayOptions('view', [
        'label' => 'above'
      ])
      ->setDisplayOptions('form', [
        'type' => 'entity_reference_autocomplete',
        'weight' => 8,
        'settings' => array(
          'placeholder'       => '',
          'size'              => '60',
          'autocomplete_type' => 'tags',
          'match_operator'    => 'CONTAINS',
        )
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    return $fields;
  }

  /**
   * {@inheritDoc}
   */
  public function getData1(): int {
    return $this->get('dato_1')->value;
  }

  /**
   * {@inheritDoc}
   */
  public function setData1(int $data1) {
    $this->set('dato_1', $data1);
    return $this;
  }

  /**
   * {@inheritDoc}
   */
  public function getData2(): int {
    return $this->get('dato_2')->value;
  }

  /**
   * {@inheritDoc}
   */
  public function setData2(int $data2) {
    $this->set('dato_2', $data2);
    return $this;
  }

  /**
   * {@inheritDoc}
   */
  public function getTag(): TermInterface {
    return $this->get('etiqueta')->entity;
  }

  /**
   * {@inheritDoc}
   */
  public function setTag(TermInterface $tag) {
    $this->set('etiqueta', $tag->id());
    return $this;
  }
}