<div class="users form">
<?php echo $this->Form->create('User'); ?>
<fieldset>
<legend><?php echo __('管理者ログイン'); ?></legend>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('password');
	?>
</fieldset>
<?php   echo$this->Form->end('ログイン')?>
</div>
<div class="actions">
	<h3><?php echo __('サブメニュ－'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('商品一覧'), array('action' => 'add')); ?></li>
		<br><bt>
		<li><?php echo $this->Html->link(__('ユーザーログイン'), array('controller'=>'Users','action' => 'login')); ?></li>
	</ul>
</div>