<?php
App::uses('Photograph', 'Model');

/**
 * Photograph Test Case
 */
class PhotographTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.photograph',
		'app.product',
		'app.state',
		'app.category',
		'app.bid',
		'app.success'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Photograph = ClassRegistry::init('Photograph');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Photograph);

		parent::tearDown();
	}

}
