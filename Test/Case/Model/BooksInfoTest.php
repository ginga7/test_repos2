<?php
App::uses('BooksInfo', 'Model');

/**
 * BooksInfo Test Case
 */
class BooksInfoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.books_info'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BooksInfo = ClassRegistry::init('BooksInfo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BooksInfo);

		parent::tearDown();
	}

}
