<?php
App::uses('CategoryInfo', 'Model');

/**
 * CategoryInfo Test Case
 */
class CategoryInfoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.category_info',
		'app.category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CategoryInfo = ClassRegistry::init('CategoryInfo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CategoryInfo);

		parent::tearDown();
	}

}
