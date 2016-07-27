<?php
App::uses('AppController', 'Controller');
App::uses('PhotographsController', 'Controller');
App::uses('BidsController', 'Controller');

/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class ProductsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator' => array(
										'conditions'=>array(
												'Product.state'=>'1'
											),
											'limit' => 10,
										),
										'Session','Common','Flash','Auth','Filebinder.Ring'
									);
	public $helpers = array('Photo');
	public function beforeFilter()
	{
		parent::beforeFilter();
		if($this->Auth->user() != null){
			$this->Session->write('user',$this->Auth->user());
		}

		$category_arr = array(
		"1" => "総記",
		"2" => "哲学",
		"3" => "歴史",
		"4" => "社会科学",
		"5" => "自然科学",
		"6" => "技術・工学・工業",
		"7" => "産業",
		"8" => "芸術・美術",
		"9" => "言語",
		"10" => "文学",
		"11" => "その他",
		);
    $this->set('category_arr', $category_arr);
    $state_arr = array(
		"1" => "未使用品",
		"2" => "新品未開封",
		"3" => "美品",
		"4" => "使用感有り",
		"5" => "難あり",
		);
	$this->set('state_arr', $state_arr);
	$region_arr = array(
		"北海道" => "北海道",
		"東北" => "東北",
		"北陸" => "北陸",
		"関東" => "関東",
		"関西" => "関西",
		"四国" => "四国",
		"九州" => "九州",
		"沖縄" => "沖縄",
		);
    $this->set('region_arr', $region_arr);

	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Product->recursive = 0;
		$this->set('products', $this->Paginator->paginate());
		$products = $this->Paginator->paginate();
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->Product->hasMany['Bid']['conditions'] = array('Bid.state' => 0);
		$options = array(
			'conditions' => array(
				'Product.' . $this->Product->primaryKey => $id,
				//'Product.state' => '1',
				//'Bid.state' => 0,
			),
		);
		$this->Session->write('data',$this->Product->find('first', $options));
		$product = $this->Product->find('first', $options);
//		if($product['Product']['state'] == 0){
//			$this->Common->successful($product);
//		}
		$this->set('product',$product);
	}
/**
 * add method
 *
 * @return void
 */
	//テストソース
//	public function index(){
//		if($this->request->is('post')){
//			$this->Ring->bindUp('User');
//			var_dump($this->request->data);
//			if($this->User->save($this->request->data)){
//				$this->Flash->success('登録完了しました');
//			}else{
//				$this->Flash->error('登録が失敗しました');
//			}
//			var_dump($this->User->validationErrors);
//		}
//	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Ring->bindUp('Product');
			$user = $this->Auth->user();
			$this->request->data['Product']['userid'] =$user['userid'];
			$this->request->data['Product']['state'] = $this->Common->enum(0);
			$data = $this->request->data;

			if($this->Product->save($data)){
				$options = array(
					'conditions' => array(
						'Product.product_name' => $data['Product']['product_name'],
					),
				);
				$results = $this->Product->find('first', $options);
				$data['Product']['product_id'] = $results['Product']['product_id'];

				$BidCon = new BidsController();
				$BidCon->farstbid($data);
				$this->Flash->success(__('商品の出品が完了致しました。'));
				return $this->redirect(array('action'=>'view', $results['Product']['product_id']));
			} else {
			$this->Flash->error(__('The product could not be saved. Please, try again.'));
			}
		}
		$states = $this->Product->State->find('list');
		$categories = $this->Product->Category->find('list');
		$this->set(compact('states', 'categories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Product->save($this->request->data)){
				$this->Flash->success(__('商品の情報更新が完了しました。'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__(''));
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
		}
		$states = $this->Product->State->find('list');
		$categories = $this->Product->Category->find('list');
		$this->set(compact('states', 'categories'));
	}
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Product->delete()) {
			$this->Flash->success(__('商品を削除しました。'));
		} else {
			$this->Flash->error(__('The product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
/*
 * ステータス変更
 */
	public function updateState($id,$state){
		$this->autoRender = false;
		$results['Product']['product_id'] = $id;
		$results['Product']['state'] = $state+1;

		if ($this->Product->save($results)){
			if($this->request->is(array('post'))){
				return $this->redirect(array('controller'=>'users','action' => 'myMenu'));
			}else{
				return $this->redirect(array('action' => 'view',$id));
			}
		}else{
			$this->Flash->error(__('むりむり'));
		}
	}

	public function updateStateAuto($id,$state){
		$this->autoRender = false;
		$results['Product']['product_id'] = $id;
		$results['Product']['state'] = $state+1;
		$this->Product->save($results);
	}
/*
 * 自分の出品している商品一覧
 */
	public function selectByid(){
		$user = $this->Auth->user();
		$options = array(
			'conditions' => array(
				'Product.userid' => $user['userid'],
				'Product.state'  => 1,
			),
		);
		$this->request->data = $this->Product->find('all', $options);
		$states = $this->Product->State->find('list');
		$categories = $this->Product->Category->find('list');
		$products = $this->request->data;
//		var_dump($products);
//		exit;
		$this->set('products',$products);
	}
}
