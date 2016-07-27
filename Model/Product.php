<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 * @property State $State
 * @property Category $Category
 * @property Bid $Bid
 * @property Photograph $Photograph
 * @property Success $Success
 */
class Product extends AppModel {

	public $actsAs = array('Containable',
		'Filebinder.Bindable' => array(
			'model' => 'Attachment',
			'filePath' => WWW_ROOT_IMG,
			'dbStorage' => true,
			'beforeAttach' => null,
			'afterAttach' => null,
			'withObject' => false,
		)
	);
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'product_id';
	public $displayField = 'product_name';

	public $bindFields = array(
		array('field' => 'photo1'),
		array('field' => 'photo2'),
		array('field' => 'photo3'),
	);
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'product_name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
		'userid' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'description_of_item' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
		'state_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'category_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'region' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
			),
		),
//		'photo' => array(
//			'allowExtention' => array(
//				'rule' => array('checkExtension', array('jpg','pdf')),
//				'message' => '拡張子が無効です',
//				'allowEmpty' => true
//			),
//			'fileSize' => array(
//				'rule' => array('checkFileSize', '1MB'),
//				'message' => 'ファイルサイズが1MBを超過しています'
//			),
//			'illegalCode' => array(
//				'rule' => array('funcCheckFile', 'checkIllegalCode'),
//				'allowEmpty' => true
//			)
//		)
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

	public function afterFind($results, $primary = false) {
		foreach ($results as $key => $val) {
			if (isset($val['Bid']['State'])) {
				$results[$key]['Bid']['State'] = $this->dateFormatAfterFind(
					$val['Bid']['State']
				);
			}
		}
	return $results;
	}
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'State' => array(
			'className' => 'State',
			'foreignKey' => 'state_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'userid',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Bid' => array(
			'className' => 'Bid',
			'foreignKey' => 'product_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Success' => array(
			'className' => 'Success',
			'foreignKey' => 'product_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public function checkIllegalCode($filePath){
		$fp = fopen($filePath, "r");
		$ofile = fread($fp, filesize($filePath));
		fclose($fp);

		if (preg_match('/<\\?php./i', $ofile)) {
			return false;
		}
		return true;
	}

}
