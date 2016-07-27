<div class="successes view">
<h2><?php echo __('Success'); ?></h2>
	<dl>
		<dt><?php echo __('Successful Bid Id'); ?></dt>
		<dd>
			<?php echo h($success['Success']['successful_bid_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($success['Product']['product_id'], array('controller' => 'products', 'action' => 'view', $success['Product']['product_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Userid'); ?></dt>
		<dd>
			<?php echo h($success['Success']['userid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Successful Bid Price'); ?></dt>
		<dd>
			<?php echo h($success['Success']['successful_bid_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Successful Bid Day'); ?></dt>
		<dd>
			<?php echo h($success['Success']['successful_bid_day']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Success'), array('action' => 'edit', $success['Success']['successful_bid_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Success'), array('action' => 'delete', $success['Success']['successful_bid_id']), array('confirm' => __('Are you sure you want to delete # %s?', $success['Success']['successful_bid_id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Successes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Success'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
