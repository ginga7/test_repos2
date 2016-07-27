<?php
App::uses('ProductInfo', 'Model');

/**
 * ProductInfo Test Case
 */
class ProductInfoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.product_info',
		'app.product',
		'app.product_state',
		'app.category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProductInfo = ClassRegistry::init('ProductInfo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductInfo);

		parent::tearDown();
	}

}
