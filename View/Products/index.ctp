<div class="products index">
	<h2><?php echo __('商品一覧'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
		<th></th>
		<th><?php echo $this->Paginator->sort('product_id','出品ID'); ?></th>
		<th><?php echo $this->Paginator->sort('product_name','出品名'); ?></th>
		<th><?php echo $this->Paginator->sort('nickname','出品者名'); ?></th>
		<th><?php echo $this->Paginator->sort('category_id','カテゴリー'); ?></th>
		<th><?php echo $this->Paginator->sort('starting_price','開始価格'); ?></th>
		<th><?php echo $this->Paginator->sort('decision_price','即決価格'); ?></th>
		<th><?php echo $this->Paginator->sort('end_day','終了日'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php $i = 0;
		foreach ($products as $product):
	?>
	<?php if($product['Product']['end_day'] == null){
		  		//continue;
		  }?>
	<tr>
		<td>
			<?php if (!empty($product['Photograph'])): ?>
				<?php for($i=0;$i<count($product['Photograph']);$i++): ?>
						<?php echo $this->ImageLabel->image($product['Photograph'][$i]['photo_path'], array('alt' => 'CakePHP','width'=>'50px', 'height'=>'50px'));?>
				<?php endfor; ?>
			<?php else: ?>

			<?php endif;?>
		</td>
		<td><?php echo h($product['Product']['product_id']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['product_name']); ?>&nbsp;</td>
		<td><?php echo h($product['User']['nickname']); ?>&nbsp;</td>
		<td><?php echo h($product['Category']['category']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['starting_price']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['decision_price']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['end_day']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('詳細'), array('action' => 'view', $product['Product']['product_id'])); ?>
			<?php echo $this->Html->link(__('入札'), array('controller'=>'Bids','action' => 'add', $product['Product']['product_id'],$product['Product']['starting_price'])); ?>
		</td>
	</tr>
<?php
	$i++;
	endforeach;
?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('全{:pages} ページ中{:page}ページ目, 全{:count}商品中{:current}商品を観覧しています。,starting on record {:start}, ending on {:end}')
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
		<?php if($this->Session->check('user')):?>
			<li><?php echo $this->Html->link(__('マイメニュー'), array('controller' => 'Users','action' =>'myMenu')); ?> </li>
		<?php else:?>
			<li><?php echo $this->Html->link(__('ユーザーログイン'), array('controller' => 'Users','action' => 'login')); ?> </li>
		<?php endif;?>
	</ul>
</div>
