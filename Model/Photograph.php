<?php
App::uses('AppModel', 'Model');
/**
 * Photograph Model
 *
 * @property Product $Product
 */
class Photograph extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	 public $actsAs = array(
		'Filebinder.Bindable' => array(
			'dbStorage' => false,
			'beforeAttach' => null,
			'afterAttach' => null,
			'withObject' => false,
	 		'filePath' => WWW_ROOT_IMG,
		)
	);

	public $validate = array(
		'product_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'photo_path' => array(
//			'allowExtention' => array(
//				'rule' => array('checkExtension', array('jpg','pdf')),
//				'allowEmpty' => true
//			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */

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
