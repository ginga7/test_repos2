<div class="users index">
	<h2><?php echo __('Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('userid'); ?></th>
			<th><?php echo $this->Paginator->sort('nickname','ニックネーム'); ?></th>
			<th><?php echo $this->Paginator->sort('name','本名'); ?></th>
			<th><?php echo $this->Paginator->sort('address','住所'); ?></th>
			<th><?php echo $this->Paginator->sort('phone','電話番号'); ?></th>
			<th><?php echo $this->Paginator->sort('sex','性別'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('insertday','登録日'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['userid']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['nickname']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['address']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['phone']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['sex']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['insertday']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('詳細'), array('action' => 'view', $user['User']['userid'])); ?>
			<?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $user['User']['userid']), array('confirm' => __('このユーザーを削除してもよろしいですか？', $user['User']['userid']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('サブメニュー'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('管理者メニュー'), array('controller'=>'Admins','action'=>'adminMenu')); ?> </li>
	</ul>
</div>
