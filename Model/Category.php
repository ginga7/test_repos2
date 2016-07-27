<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 * @property Category $Category
 * @property Category $Category
 * @property Product $Product
 */
class Category extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'category_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'category' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'category_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}
