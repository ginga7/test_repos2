<?php
/**
 * State Fixture
 */
class StateFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'state_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary', 'comment' => '商品状態ID'),
		'state' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'comment' => '商品状態', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'state_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB', 'comment' => '商品状態テーブル')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'state_id' => 1,
			'state' => 'Lorem ipsum dolor '
		),
	);

}
