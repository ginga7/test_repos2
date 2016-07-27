<?php
App::uses('AppModel', 'Model');
/**
 * State Model
 *
 */
class State extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'state_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'state' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
	);

	public $hasMany = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'state_id',
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
