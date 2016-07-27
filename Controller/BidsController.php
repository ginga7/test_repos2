<?php
App::uses('AppController', 'Controller');
App::uses('SuccessesController', 'Controller');
App::uses('ProductsController', 'Controller');
/**
 * Bids Controller
 *
 * @property Bid $Bid
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class BidsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash','Auth');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Bid->recursive = 0;
		$this->set('bids', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Bid->exists($id)) {
			throw new NotFoundException(__('Invalid bid'));
		}
		$options = array('conditions' => array('Bid.' . $this->Bid->primaryKey => $id));
		$this->set('bid', $this->Bid->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id,$price = null) {
		if ($this->request->is('post')) {
			$this->Bid->create();
			$user = $this->Auth->user();
			$datas = $this->Session->read('data');
			$this->request->data['Bid']['userid'] = $user['userid'];
			$this->request->data['Bid']['product_id'] = $id;
			$this->request->data['Bid']['state'] = 0;
			//渡すデータの準備
			$data = array(
				'state' => 1,
			);
			//Where句の条件
			$conditions = array(
				'Bid.product_id' => $id, //複数指定可
            );
			if ($this->Bid->updateAll($data,$conditions)) {
				$this->Flash->error(__('だめだめ'));
			}
//			var_dump();
//			exit;
			if ($this->Bid->save($this->request->data)) {
				if($datas['Product']['decision_price'] != 0 && $datas['Product']['decision_price'] <= $this->request->data['Bid']['bid_price']){
					$SucCon = new SuccessesController();
					$SucCon->add($id,$this->request->data['Bid']['bid_price'],$user['userid']);
					$ProCon = new ProductsController();
					$ProCon->updateState($id,2);
				}
				$this->Flash->success(__('入札が完了しました。'));
				return $this->redirect(array('controller'=>'products','action' => 'view',$id));
			} else {
				$this->Flash->error(__('The bid could not be saved. Please, try again.'));
			}
		}else{
			$product_id = $id;
			$now_bid_price = $price;
			$this->set(compact('now_bid_price','product_id'));
		}
//		$options = array('conditions' => array('Bid.' . $this->Bid->primaryKey => $id));
//		$this->request->data = $this->Bid->find('first', $options);

	}
	//出品時の登録用入札
	public function farstbid($data){
		$this->autoRender = false;
		if(isset($data)){
			$addData['Bid']['userid'] = $data['Product']['userid'];
			$addData['Bid']['bid_price'] = $data['Product']['starting_price'];
			$addData['Bid']['product_id'] = $data['Product']['product_id'];
			$addData['Bid']['state'] = 0;
			if ($this->Bid->save($addData)) {
			}
		}
	}
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Bid->exists($id)) {
			throw new NotFoundException(__('Invalid bid'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Bid->save($this->request->data)) {
				$this->Flash->success(__('The bid has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The bid could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Bid.' . $this->Bid->primaryKey => $id));
			$this->request->data = $this->Bid->find('first', $options);
		}
		$bids = $this->Bid->Bid->find('list');
		$products = $this->Bid->Product->find('list');
		$this->set(compact('bids', 'products'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Bid->id = $id;
		if (!$this->Bid->exists()) {
			throw new NotFoundException(__('Invalid bid'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Bid->delete()) {
			$this->Flash->success(__('The bid has been deleted.'));
		} else {
			$this->Flash->error(__('The bid could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function selectByid(){
		$user = $this->Auth->user();
		$options = array(
						'conditions' => array(
							'Bid.userid' => $user['userid']
						),
						'group' => array('Bid.product_id'),
						"fields" => "Product.product_id,Product.product_name,Product.userid,MAX(Bid.bid_id) as bid_id,MIN(Bid.state) as state,MAX(Bid.bid_price) as bid_price"
					);
		$this->request->data = $this->Bid->find('all', $options);

		$products = $this->Bid->Product->find('list');
		$successes = $this->request->data;
		$this->set('bid',$successes);
		$this->set('userid',$user['userid']);
	}

}
