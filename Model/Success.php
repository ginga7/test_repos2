<?php
App::uses('AppModel', 'Model');
/**
 * Success Model
 *
 * @property SuccessfulBid $SuccessfulBid
 * @property Product $Product
 */
class Success extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'successful_bid_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'product_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'userid' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'successful_bid_price' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'userid',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		)
	);

	public function getData($id){
		 $sql = "SELECT * FROME success WHERE sample.id = :id;";
		$params = array(
			'id'=> $id
		);

		$data = $this->query($sql,$params);
		return $data;
	}
}
