<?php
App::uses('ProductController', 'Controller');
App::uses('ComponentCollection', 'Controller'); //コンポーネント使用の為に追加
App::uses('CommonComponent', 'Controller/Component');
class SuccsessShell extends AppShell{

	public $uses = array('Product');
	public function startup() {
		$collection = new ComponentCollection(); //これが大事です。
		$this->Common = new CommonComponent($collection); //コンポーネントをインスタンス化
		parent::startup();
	}
/*
 * cronに登録して定期的に落札変更するためのシェル
 */
	public function main() {
		$this->Product->hasMany['Bid']['conditions'] = array('Bid.state' => 0);
		$products = $this->Product->find('all');
		for($i = 0;$i < count($products); $i++){
			//$this->out($products[$i]);
			if($products[$i]['Product']['state'] == 0){
				$this->Common->successful($products[$i],'controllers');
			}
		}
		$this->Product->hasMany['Bid']['conditions'] = array();
		//$this->out(print_r($products, true));
	}
}