<div class="users form">
	<h3><?php echo __('マイメニュ－'); ?></h3>
	<dl>
		<dt><?php echo __('購入機能'); ?></dt>
		<dd>
			<?php echo $this->Html->link(__('入札一覧'), array('controller'=>'Bids','action' => 'selectByid')); ?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo $this->Html->link(__('落札一覧'), array('controller'=>'Successes','action' => 'selectByid')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('売却機能'); ?></dt>
		<dd>
			<?php echo $this->Html->link(__('新規出品'), array('controller'=>'Products','action' => 'add')); ?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo $this->Html->link(__('出品中一覧'), array('controller'=>'Products','action' => 'selectByid')); ?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo $this->Html->link(__('出品終了一覧'), array('controller'=>'Successes','action' => 'selectByPid')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('その他'); ?></dt>
		<dd>
			<?php echo $this->Html->link(__('ユーザー情報変更'), array('action' => 'edit',$userid)); ?>
			&nbsp;
		</dd>
</div>
<div class="actions">
	<h3><?php echo __('サブメニュー'); ?></h3>
	<ul>
			<li><?php echo $this->Html->link(__('商品一覧'), array('controller' => 'Products','action' =>'index')); ?> </li>
			<li><?php echo $this->Html->link(__('ログアウト'), array('controller' => 'Users','action' => 'logout')); ?> </li>
	</ul>
</div>