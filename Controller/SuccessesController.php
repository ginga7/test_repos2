<?php
App::uses('AppController', 'Controller');
/**
 * Successes Controller
 *
 * @property Success $Success
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class SuccessesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator' => array('limit' => 10), 'Session', 'Flash','Auth','Common');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Success->recursive = 0;
		$this->set('successes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Success->exists($id)) {
			throw new NotFoundException(__('Invalid success'));
		}
		$options = array('conditions' => array('Success.' . $this->Success->primaryKey => $id));
		$this->set('success', $this->Success->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id,$price,$userid) {
		$this->autoRender = false;
		$this->Success->create();
		$data['Success']['product_id'] = $id;
		$data['Success']['successful_bid_price'] = $price;
		$data['Success']['userid'] = $userid;
		$data['Success']['successful_bid_day'] = date('Y/m/d H:i:s');
		if ($this->Success->save($data)) {
			return;
		} else {
			$this->Flash->error(__('The success could not be saved. Please, try again.'));
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
		if (!$this->Success->exists($id)) {
			throw new NotFoundException(__('Invalid success'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Success->save($this->request->data)) {
				$this->Flash->success(__('The success has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The success could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Success.' . $this->Success->primaryKey => $id));
			$this->request->data = $this->Success->find('first', $options);
		}
		$products = $this->Success->Product->find('list');
		$this->set(compact('products'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Success->id = $id;
		if (!$this->Success->exists()) {
			throw new NotFoundException(__('Invalid success'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Success->delete()) {
			$this->Flash->success(__('The success has been deleted.'));
		} else {
			$this->Flash->error(__('The success could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function selectByid(){
		$user = $this->Auth->user();
		$options = array('conditions' => array('Success.userid' => $user['userid']));
		$this->request->data = $this->Success->find('all', $options);
		$products = $this->Success->Product->find('list');
		$successes = $this->request->data;
		$this->set(compact('successes'));
	}

	public function selectByPid(){
		$user = $this->Auth->user();
		$options = array('conditions' => array('Product.userid' => $user['userid']));
		$this->request->data = $this->Success->find('all', $options);
		$products = $this->Success->Product->find('list');
		$successes = $this->request->data;
		$this->set(compact('successes'));
	}
}