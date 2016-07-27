<?php
App::uses('AppModel', 'Model');
/**
 * Admin Model
 *
 */
class Admin extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'password' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
		'admins_name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
		'insartday' => array(
			'datetime' => array(
				'rule' => array('datetime'),
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
			),
		),
	);
	public function beforeSave($options = array()) {
		$this->data['Admin']['password'] = AuthComponent::password($this->data['Admin']['password']);
		return true;
	}
}
