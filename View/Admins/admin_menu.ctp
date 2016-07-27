<div class="users form">
	<h3><?php echo __('管理者メニュ－'); ?></h3>
	<dl>
		<dt>商品機能</dt>
		<dd>
			<?php echo $this->Html->link(__('商品一覧'), array('controller' => 'Products','action' =>'index'),array('target' => '_blank')); ?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo $this->Html->link(__('落札一覧'), array('controller'=>'Successes','action' => 'index')); ?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</dd>
		<dt>ユーザー機能</dt>
		<dd>
			<?php echo $this->Html->link(__('ユーザー一覧'), array('controller'=>'Users','action' => 'index')); ?>
			&nbsp;
		</dd>
</div>
<div class="actions">
	<h3><?php echo __('サブメニュー'); ?></h3>
	<ul>
			<li><?php echo $this->Html->link(__('ログアウト'), array('action' => 'logout')); ?> </li>
	</ul>
</div>