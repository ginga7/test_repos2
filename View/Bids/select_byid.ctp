<div class="successes index">
	<h2><?php echo __('入札一覧'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('bid_id','商品ID'); ?></th>
			<th><?php echo $this->Paginator->sort('product_name','商品名'); ?></th>
			<th><?php echo $this->Paginator->sort('bid_price','入札価格'); ?></th>
			<th><?php echo $this->Paginator->sort('state','入札状況'); ?></th>
			<th class="actions"><?php echo __('機能'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php	foreach ($bid as $success): ?>
	<?php if($success['Product']['userid'] == $userid):?>
		<?php continue;?>
	<?php endif;?>
	<tr>
		<td><?php echo h($success[0]['bid_id']); ?>&nbsp;</td>
		<td>
			<?php echo ($success['Product']['product_name']); ?>
		</td>
		<td><?php echo h($success[0]['bid_price']); ?>&nbsp;</td>
		<td>
			<?php switch($success[0]['state']){
			case 0:
				echo "最高入札者";
				break;
			case 1:
				echo "";
				break;
			}?>&nbsp;
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('商品詳細'), array('controller'=>'products','action' => 'view', $success['Product']['product_id'])); ?>
			<?php echo $this->Html->link(__('入札'), array('action' => 'add', $success['Product']['product_id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
</div>
<div class="actions">
	<h3><?php echo __('サブメニュー'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('マイメニュー'), array('controller'=>'Users','action'=>'myMenu')); ?> </li>
	</ul>
</div>
