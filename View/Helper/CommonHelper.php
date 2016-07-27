<?php
App::uses('AppHelper', 'View/Helper');
class CommonHelper extends AppHelper {
public $helpers = array('Number');
    public function format($num) {
       $price = $this->Number->format($num, array(
    		'places' => 0,
    		'before' => '¥ ',
    		'escape' => false,
    		'decimals' => '.',
    		'thousands' => ','
		));
		return $price;
    }
}