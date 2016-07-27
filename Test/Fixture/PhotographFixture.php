<?php
/**
 * Photograph Fixture
 */
class PhotographFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index', 'comment' => '商品ID（FK)'),
		'photo_path' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'comment' => '写真パス', 'charset' => 'utf8'),
		'insartday' => array('type' => 'date', 'null' => false, 'default' => null, 'comment' => '登録日'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'photo_path' => array('column' => 'photo_path', 'unique' => 1),
			'product_id' => array('column' => 'product_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'product_id' => 1,
			'photo_path' => 'Lorem ipsum dolor sit amet',
			'insartday' => '2016-07-19'
		),
	);

}
