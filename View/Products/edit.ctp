<div class="products form">
<?php echo $this->Form->create('Product'); ?>
	<fieldset>
		<legend><?php echo __('商品編集'); ?></legend>
	<?php
		echo $this->Form->input('description_of_item');
		echo $this->Form->input('starting_price');
		echo $this->Form->input('decision_price');
		echo $this->Form->input('start_day');
		echo $this->Form->input('end_day');
	?>
	</fieldset>
<?php echo $this->Form->end(__('更新')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('マイメニュー'), array('myMenu')); ?></li>
	</ul>
</div>
