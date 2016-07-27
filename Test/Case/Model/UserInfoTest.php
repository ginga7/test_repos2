<?php
App::uses('UserInfo', 'Model');

/**
 * UserInfo Test Case
 */
class UserInfoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_info'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserInfo = ClassRegistry::init('UserInfo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserInfo);

		parent::tearDown();
	}

}
