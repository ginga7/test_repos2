<div class="successes form">
<?php echo $this->Form->create('Success'); ?>
	<fieldset>
		<legend><?php echo __('Edit Success'); ?></legend>
	<?php
		echo $this->Form->input('successful_bid_id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('userid');
		echo $this->Form->input('successful_bid_price');
		echo $this->Form->input('successful_bid_day');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Success.successful_bid_id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Success.successful_bid_id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Successes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
