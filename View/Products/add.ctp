<div class="products form">
<?php echo $this->Form->create('Product',array('url' => 'add', 'type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('新規出品'); ?></legend>
	<?php
		echo $this->Form->input('product_name',array('type' => 'text'));
		echo $this->Form->input('photo1',array('type' => 'file'));
		echo $this->Form->input('photo2',array('type' => 'file'));
		echo $this->Form->input('photo3',array('type' => 'file'));
		//テキストエリア
		echo $this->Form->textarea('description_of_item', array("cols"=>20, "rows"=>5,'type' => 'text'));
		//セレクトボックス
		echo __('商品状態')."<br>";
		echo $this->Form->input('state_id',array('type'=>'select', 'div'=>false, 'label'=>false, 'options'=>$state_arr, 'empty'=>'選択してください'))."<br>";
		//セレクトボックス
		echo __('カテゴリー')."<br>";
		echo $this->Form->input('category_id',array('type'=>'select', 'div'=>false, 'label'=>false, 'options'=>$category_arr, 'empty'=>'選択してください'))."<br>";
		//セレクトボックス
		$options = array('0' => '自動延長なし', '1' => '自動延長あり');
		$attributes = array('value' => '0');
		echo $this->Form->radio('auto_extension',$options,$attributes);
		//セレクトボックス
		echo __('出品地域')."<br>";
		echo $this->Form->input('region',array('type'=>'select', 'div'=>false, 'label'=>false, 'options'=>$region_arr, 'empty'=>'選択してください'));
		echo $this->Form->input('starting_price',array('value' => '1','type' => 'text'));
		echo $this->Form->input('decision_price',array('value' => '0','type' => 'text'));
		echo $this->Form->input('minimum_amount',array('value' => '0','type' => 'text'));
		echo $this->Form->input('start_day');
		echo $this->Form->input('end_day');
	?>
	</fieldset>
<?php echo $this->Form->end(__('出品')); ?>
</div>
<div class="actions">
	<h3><?php echo __('サブメニュー'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('マイメニュー'), array('controller' => 'Users','action'=>'myMenu')); ?></li>
	</ul>
</div>
