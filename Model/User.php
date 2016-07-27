<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'userid';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'password' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => BLANK_ERR,
			),
			'between' => array(
				'rule' => array('between', 4, 20),
				'message' => BW_ERR,
			),
		),
		'nickname' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => BLANK_ERR,
			),
		),
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => BLANK_ERR,
			),
		),
		'address' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => BLANK_ERR,
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => EMAIL_ERR,
			),
		),
	);
	public function beforeSave($options = array()) {
		$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		return true;
	}
}

