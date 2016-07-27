<?php
App::uses('AdminInfo', 'Model');

/**
 * AdminInfo Test Case
 */
class AdminInfoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.admin_info'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AdminInfo = ClassRegistry::init('AdminInfo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AdminInfo);

		parent::tearDown();
	}

}
