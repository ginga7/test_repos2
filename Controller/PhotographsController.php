<?php
App::uses('AppController', 'Controller');
/**
 * Photographs Controller
 *
 * @property Photograph $Photograph
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class PhotographsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash','Filebinder.Ring');

	public function add($data){
		$num = 0;
		//$this->Ring = $this->Components->load('Ring');
		//$this->Ring->bindUp();
		$addData['Photograph']['product_id'] = $data['Product']['product_id'];
		for($i = 0; $i < 3;$i++){
			if($data['photo_path'][$i] == ""){
				continue;
			}
			$addData['Photograph']['photo_path'] = $data['photo_path'][$i];
			if($this->Photograph->save($addData)){
				$num++;
			}
		}
		if($num > 0){
			return;
		}else{
			$this->Flash = $this->Components->load('Flash');
			$this->Flash->error(__('むりむり。'));
		}
	}
}
