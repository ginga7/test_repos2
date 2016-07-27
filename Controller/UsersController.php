<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator' => array('limit' => 10), 'Session', 'Flash','Auth','Filebinder.Ring');

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('login');
		$this->Auth->allow('add');
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void自作
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('ユーザー登録が完了いたしました。'));
				return $this->redirect(array('action' => 'login'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	/**
	 * ログインログアウト機能
	 */
	public function login(){
		if ($this->request->is('post')) {
            //$this->User->create();

			if ($this->Auth->login($this->request->data['User'])) {
				$user = $this->User->find('first', array(
					'conditions' => array(
						'email' => $this->Auth->user('email')
					)
				));
				unset($user['User']['password']);
				$this->Auth->login($user['User']);
				$user = $this->Auth->user();
				$this->Flash->success(__('ログインに成功しました。'));
				//return $this->redirect(array('controller' => 'users', 'action' => 'index'));
				//ログイン後の遷移先
				if($this->Session->check('bid')){
					//商品詳細から移動してきた場合には、そこへ戻る
					return $this->redirect(array('controller' =>'Products','action' => 'index'));
				}else{
					return $this->redirect(array('controller' =>'Products','action' => 'index'));
				}
			}else{
	    		$this->Flash->error(__('ユーザー名又はパスワードが違います。'));
			}
		}
	}

	public function logout(){
	  $this->Auth->logout();
	  $this->Session->destroy();
	  //ログアウト後の遷移先
	  $this->redirect(array('action'=>'login'));

	}

	public function myMenu(){
		if($this->Auth->user() != null){
			$user = $this->Auth->user();
//			var_dump($user);
//			exit;
			$this->set('userid',$user['userid']);
		}else{
			return $this->redirect(array('action' => 'login'));
		}
	}
}
