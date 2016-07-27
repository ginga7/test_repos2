<?php
/**
 * AdminInfo Fixture
 */
class AdminInfoFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'admin_info';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false, 'key' => 'primary', 'comment' => '管理者ID'),
		'password' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 40, 'collate' => 'utf8_general_ci', 'comment' => 'パスワード', 'charset' => 'utf8'),
		'admins_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'comment' => '管理者名', 'charset' => 'utf8'),
		'insartday' => array('type' => 'datetime', 'null' => false, 'default' => null, 'comment' => '登録日'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'comment' => 'メールアドレス', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'password' => 'Lorem ipsum dolor sit amet',
			'admins_name' => 'Lorem ipsum dolor sit amet',
			'insartday' => '2016-07-15 08:55:55',
			'email' => 'Lorem ipsum dolor sit amet'
		),
	);

}
