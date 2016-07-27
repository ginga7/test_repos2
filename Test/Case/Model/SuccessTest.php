<?php
App::uses('Success', 'Model');

/**
 * Success Test Case
 */
class SuccessTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.success',
		'app.successful_bid',
		'app.product',
		'app.state',
		'app.category',
		'app.bid',
		'app.photograph'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Success = ClassRegistry::init('Success');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Success);

		parent::tearDown();
	}

}
