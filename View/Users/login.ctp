<div class="users form">
<?php echo $this->Form->create('User'); ?>
<fieldset>
<legend><?php echo __('ログイン'); ?></legend>
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
		<li><?php echo $this->Html->link(__('商品一覧'), array('controller'=>'Products','action' => 'index')); ?></li>
		<br><bt>
		<li><?php echo $this->Html->link(__('新規会員登録'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('管理者ログイン'), array('controller'=>'Admins','action' => 'login')); ?></li>
	</ul>
</div>