<?php
/**
 * Bid Fixture
 */
class BidFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'bid_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary', 'comment' => '入札ID'),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index', 'comment' => '商品ID'),
		'userid' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index', 'comment' => 'ユーザーID（入札者の)'),
		'bid_day' => array('type' => 'timestamp', 'null' => false, 'default' => null, 'comment' => '入札日時'),
		'bid_price' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => '入札金額'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'bid_id', 'unique' => 1),
			'product_id' => array('column' => 'product_id', 'unique' => 0),
			'userid' => array('column' => 'userid', 'unique' => 0)
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
			'bid_id' => 1,
			'product_id' => 1,
			'userid' => 1,
			'bid_day' => 1468892404,
			'bid_price' => 1
		),
	);

}
