<?php
/**
 * Success Fixture
 */
class SuccessFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'successful_bid_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary', 'comment' => '落札ID'),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index', 'comment' => '商品ID'),
		'userid' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index', 'comment' => '落札したユーザーID'),
		'successful_bid_price' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index', 'comment' => '落札価格'),
		'successful_bid_day' => array('type' => 'datetime', 'null' => false, 'default' => null, 'comment' => '落札日'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'successful_bid_id', 'unique' => 1),
			'product_id' => array('column' => 'product_id', 'unique' => 0),
			'successful_bid_price' => array('column' => 'successful_bid_price', 'unique' => 0),
			'successful_bid_price_2' => array('column' => 'successful_bid_price', 'unique' => 0),
			'userid' => array('column' => 'userid', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB', 'comment' => '落札完了アイテムが入る')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'successful_bid_id' => 1,
			'product_id' => 1,
			'userid' => 1,
			'successful_bid_price' => 1,
			'successful_bid_day' => '2016-07-19 03:41:25'
		),
	);

}
