<div class="successes index">
	<h2><?php echo __('落札一覧'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('successful_bid_id','落札商品ID'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id','商品ID'); ?></th>
			<th><?php echo $this->Paginator->sort('nickname','落札者'); ?></th>
			<th><?php echo $this->Paginator->sort('successful_bid_price','落札価格'); ?></th>
			<th><?php echo $this->Paginator->sort('successful_bid_day','落札日'); ?></th>
			<th><?php echo $this->Paginator->sort('state','商品状況'); ?></th>
			<th class="actions"><?php echo __('機能'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($successes as $success): ?>
	<tr>
		<td><?php echo h($success['Success']['successful_bid_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($success['Product']['product_id'], array('controller' => 'products', 'action' => 'view', $success['Product']['product_id'])); ?>
		</td>
		<td><?php echo h($success['User']['nickname']); ?>&nbsp;</td>
		<td><?php echo h($success['Success']['successful_bid_price']); ?>&nbsp;</td>
		<td><?php echo h($success['Success']['successful_bid_day']); ?>&nbsp;</td>
		<td>
			<?php switch($success['Product']['state']){
			case 2:
				echo "出品終了";
				break;
			case 3:
				echo "落札者入金待ち";
				break;
			case 4:
				echo "出品者入金待ち";
				break;
			case 5:
				echo "出品者入金済み";
				break;
			case 6:
				echo "取引完全成立";
				break;
			}?>&nbsp;
		</td>
		<td class="actions">
		<?php if($success['Product']['state'] == 5):?>
			<?php echo $this->Form->postLink(__('取引完全成立'), array('controller'=>'Products','action' =>'updateState',$success['Product']['product_id'],6)); ?>
		<?php else:?>

		<?php endif;?>
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
		<li><?php echo $this->form->postLink(__('管理者メニュー'), array('controller'=>'Admins','action'=>'adminMenu')); ?> </li>
	</ul>
</div>
