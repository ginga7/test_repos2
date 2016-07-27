<?php
App::uses('AppHelper', 'View/Helper');
class PhotoHelper extends AppHelper {

	public function path($data){
		$path = $data['model']."/".$data['model_id'].
			"/".$data['field_name']."/".$data['file_name'];
		return $path;
	}
}