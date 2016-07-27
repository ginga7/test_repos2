<?php
App::uses('SuccessesController', 'Controller');
App::uses('ProductsController', 'Controller');
class CommonComponent extends Component {

	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
//emunの仕様上　指定している値の番号なので、1を足してあげる
	public function enum($num) {
		return $num+1;
	}

	public function successful($product){
		$now = date('Y/m/d H:i:s');

		if(strtotime($now) >= strtotime($product['Product']['end_day'])){
			$SucCon = new SuccessesController();
			$ProCon = new ProductsController();
//			var_dump($product);
//			exit;
			$SucCon->add($product['Product']['product_id'],$product['Bid'][0]['bid_price'],$product['Bid'][0]['userid']);
			$ProCon->updateStateAuto($product['Product']['product_id'],2);
		}
	}

}