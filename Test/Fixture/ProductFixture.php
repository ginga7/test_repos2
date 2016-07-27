<?php
/**
 * Product Fixture
 */
class ProductFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary', 'comment' => '商品ID'),
		'product_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'comment' => '商品名(見出し)', 'charset' => 'utf8'),
		'userid' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index', 'comment' => '商品を登録したユーザーのID'),
		'description_of_item' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 400, 'collate' => 'utf8_general_ci', 'comment' => '商品説明', 'charset' => 'utf8'),
		'state_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index', 'comment' => '商品状態ID'),
		'category_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index', 'comment' => 'カテゴリーID'),
		'starting_price' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => '開始価格'),
		'decision_price' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => '即決価格'),
		'start_day' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '開始日時'),
		'end_day' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '終了日時'),
		'insertday' => array('type' => 'timestamp', 'null' => false, 'default' => null, 'comment' => '登録日'),
		'minimum_amount' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => '最低落札金額'),
		'region' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'comment' => '出品地域', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'product_id', 'unique' => 1),
			'userid' => array('column' => 'userid', 'unique' => 0),
			'product_state_id' => array('column' => 'state_id', 'unique' => 0),
			'category_id' => array('column' => 'category_id', 'unique' => 0)
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
			'product_id' => 1,
			'product_name' => 'Lorem ipsum dolor sit amet',
			'userid' => 1,
			'description_of_item' => 'Lorem ipsum dolor sit amet',
			'state_id' => 1,
			'category_id' => 1,
			'starting_price' => 1,
			'decision_price' => 1,
			'start_day' => '2016-07-19 03:35:33',
			'end_day' => '2016-07-19 03:35:33',
			'insertday' => 1468892133,
			'minimum_amount' => 1,
			'region' => 'Lorem ipsum dolor '
		),
	);

}
