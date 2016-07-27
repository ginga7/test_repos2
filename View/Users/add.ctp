<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('新規会員登録'); ?></legend>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('name');
		echo $this->Form->input('nickname');
		echo $this->Form->input('address');
		echo $this->Form->input('phone');
		$options = array('1' => '男性', '2' => '女性');
		$attributes = array('value' => '1');
		echo $this->Form->radio('sex',$options,$attributes);
	?>
	</fieldset>
<?php echo $this->Form->end(__('登録')); ?>
</div>
<div class="actions">
	<h3><?php echo __('サブメニュ－'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('商品一覧'), array('action' => 'index')); ?></li>
		<br><br>
		<li><?php echo $this->Html->link(__('ユーザーログイン'), array('action' => 'login')); ?></li>
		<li><?php echo $this->Html->link(__('管理者ログイン'), array('controller'=>'Admin','action' => 'login')); ?></li>
	</ul>
</div>
