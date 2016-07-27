<?php
App::uses('AppController', 'Controller');
/**
 * Admins Controller
 *
 * @property Admin $Admin
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class AdminsController extends AppController {

	public $components = array('Paginator', 'Session', 'Flash','Auth');
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('login');
		$this->Auth->allow('add');
	}
/**
 * Components
 *
 * @var array
 */public function add() {
		if ($this->request->is('post')) {
			$this->Admin->create();
			if ($this->Admin->save($this->request->data)) {
				$this->Flash->success(__('ユーザー登録が完了いたしました。'));
				return $this->redirect(array('action' => 'login'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}
	}


		public function login(){
		if ($this->request->is('post')) {
            $this->Admin->create();

			if ($this->Auth->login($this->request->data)) {
				//$user = $this->Auth->user();
				//$this->Session->set('User',$user);
				$this->Flash->success(__('ログインに成功しました。'));
				//return $this->redirect(array('controller' => 'users', 'action' => 'index'));
				//ログイン後の遷移先
					//商品詳細から移動してきた場合には、そこへ戻る
					return $this->redirect(array('action' => 'adminMenu'));
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
	public function adminMenu(){
		if($this->Auth->user() != null){
			$user = $this->Auth->user();
//			var_dump($user);
//			exit;
		}else{
			return $this->redirect(array('action' => 'login'));
		}
	}

}
