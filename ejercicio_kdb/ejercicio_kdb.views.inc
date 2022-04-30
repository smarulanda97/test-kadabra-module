<?php

/**
 * @file
 * Contains ejercicio_kdb\ejercicio_kdb.views.inc.
 * Provide a custom views field data that isn't tied to any other module. */

/**
* Implements hook_views_data().
*/
function ejercicio_kdb_views_data() {
  $data['views']['table']['group'] = t('Custom Global');
  $data['views']['table']['join'] = [
    // #global is a special flag which allows a table to appear all the time.
    '#global' => [],
  ];

  $data['views']['computed_result'] = [
    'title' => t('Resultado'),
    'help' => t('Result field is a computed value calculated of dato_1 and dato_2'),
    'field' => [
      'id' => 'computed_result_field',
    ],
    'sort' => [
      'id' => 'computed_result_sort'
    ]
  ];

  return $data;
}
