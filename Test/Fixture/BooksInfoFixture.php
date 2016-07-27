<?php
/**
 * BooksInfo Fixture
 */
class BooksInfoFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'books_info';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'isbn' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'price' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'isbn', 'unique' => 1)
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
			'isbn' => 'Lorem ipsum dolor ',
			'title' => 'Lorem ipsum dolor sit amet',
			'price' => 1
		),
	);

}
