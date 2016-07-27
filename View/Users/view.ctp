<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Userid'); ?></dt>
		<dd>
			<?php echo h($user['User']['userid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('メールアドレス'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('パスワード'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ニックネーム'); ?></dt>
		<dd>
			<?php echo h($user['User']['nickname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('本名'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('住所'); ?></dt>
		<dd>
			<?php echo h($user['User']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('電話番号'); ?></dt>
		<dd>
			<?php echo h($user['User']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('性別'); ?></dt>
		<dd>
			<?php echo h($user['User']['sex']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('登録日'); ?></dt>
		<dd>
			<?php echo h($user['User']['insertday']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('管理者メニュー'), array('adminsMenu')); ?> </li>
		<li><?php echo $this->Form->postLink(__('ユーザー削除'), array('action' => 'delete', $user['User']['userid']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['userid']))); ?> </li>
		<li><?php echo $this->Html->link(__('ユーザー一覧'), array('action' => 'index')); ?> </li>

	</ul>
</div>