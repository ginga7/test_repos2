<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('password');
		echo $this->Form->input('nickname');
		echo $this->Form->input('name');
		echo $this->Form->input('address');
		echo $this->Form->input('phone');
		echo $this->Form->input('sex');
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('更新')); ?>
</div>
<div class="actions">
	<h3><?php echo __('サブメニュー'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('マイメニュー'), array('myMenu')); ?></li>
	</ul>
</div>
