<?php
/**
 * UserInfo Fixture
 */
class UserInfoFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'user_info';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'userid' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary', 'comment' => 'ユーザーID'),
		'password' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 40, 'collate' => 'utf8_general_ci', 'comment' => 'パスワード', 'charset' => 'utf8'),
		'nickname' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'comment' => 'ニックネーム', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'comment' => '本名', 'charset' => 'utf8'),
		'address' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'comment' => '住所', 'charset' => 'utf8'),
		'phone' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 11, 'collate' => 'utf8_general_ci', 'comment' => '電話番号', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'comment' => 'メールアドレス', 'charset' => 'utf8'),
		'insertday' => array('type' => 'timestamp', 'null' => false, 'default' => null, 'comment' => '登録日'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'userid', 'unique' => 1),
			'email' => array('column' => 'email', 'unique' => 1)
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
			'userid' => 1,
			'password' => 'Lorem ipsum dolor sit amet',
			'nickname' => 'Lorem ipsum dolor ',
			'name' => 'Lorem ipsum dolor ',
			'address' => 'Lorem ipsum dolor sit amet',
			'phone' => 'Lorem ips',
			'email' => 'Lorem ipsum dolor sit amet',
			'insertday' => 1468565976
		),
	);

}
