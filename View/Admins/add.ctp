<div class="admins form">
<?php echo $this->Form->create('Admin'); ?>
	<fieldset>
		<legend><?php echo __('Add Admin'); ?></legend>
	<?php
		echo $this->Form->input('password');
		echo $this->Form->input('admins_name');
		echo $this->Form->input('insartday');
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Admins'), array('action' => 'index')); ?></li>
	</ul>
</div>