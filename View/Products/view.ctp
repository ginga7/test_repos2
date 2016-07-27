<div class="products view">
<h2><?php $now = date('Y/m/d H:i:s');
	echo __('商品詳細'); ?></h2>
	<dl>
		<dt><?php echo __('商品ID'); ?></dt>
		<dd>
			<?php echo h($product['Product']['product_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('商品名'); ?></dt>
		<dd>
			<?php echo h($product['Product']['product_name']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('商品画像'); ?></dt>
		<dd>
		<?php for($i = 1;$i < 4;$i++): ?>
			<?php if ($product['Product']['photo'.$i] != null ): ?>
				<?php echo $this->Html->image($this->Photo->path($product['Product']['photo'.$i]),array('width'=>'340','height'=>'300'));?>
			<?php elseif($i == 1): ?>
				<?php echo $this->Html->image('noimage.jpg', array('alt' => 'CakePHP','width'=>'340','height'=>'300'));
					break;?>
			<?php endif;?>
		<?php endfor; ?>
		</dd>
		<dt><?php echo __('商品詳細'); ?></dt>
		<dd>
			<?php echo h($product['Product']['description_of_item']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('商品状態'); ?></dt>
		<dd>
			<?php echo h($product['State']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('カテゴリー'); ?></dt>
		<dd>
			<?php echo h($product['Category']['category']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('自動延長'); ?></dt>
		<dd>
			<?php if($product['Product']['auto_extension'] == 0): ?>
				<?php echo "なし"?>
			<?php else:?>
				<?php echo "あり"?>
			<?php endif;?>
			&nbsp;
		</dd>
		<dt><?php echo __('開始価格'); ?></dt>
		<dd>
			<?php echo h($product['Product']['starting_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('現在価格'); ?></dt>
		<dd>
			<?php echo h($price = $product['Bid'][0]['bid_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('即決価格'); ?></dt>
		<dd>
			<?php if($product['Product']['decision_price'] === '0'):
					echo "即決価格無し";
			else:?>
					<?php echo $product['Product']['decision_price'];?>
			<?php endif;?>
			&nbsp;
		</dd>
		<dt><?php echo __('開始日'); ?></dt>
		<dd>
			<?php echo h($product['Product']['start_day']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('終了時間'); ?></dt>
		<dd>
			<?php $date=strtotime($product['Product']['end_day'])-strtotime($now);?>
			<?php echo gmdate('d',$date)."日と".gmdate('H:i:s',$date); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('出品者名'); ?></dt>
		<dd>
			<?php echo h($product['User']['nickname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('出品地域'); ?></dt>
		<dd>
			<?php echo h($product['Product']['region']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('入札'); ?></dt>
		<?php
		if($product['Product']['decision_price'] <= $price && $product['Product']['decision_price'] != 0):?>
		<dd>
			<p>この商品は既に終了しています。</p>
		</dd>
		<?php elseif(strtotime($now) >= strtotime($product['Product']['end_day'])):?>
		<dd>
			<p>この商品は既に終了しています。</p>
		</dd>
		<?php else:?>
		<dd>
			<?php echo $this->Html->link(__('入札'), array('controller' => 'Bids','action' => 'add',$product['Product']['product_id'],$price)); ?>
			&nbsp;
		</dd>
		<?php endif;?>
	</dl>

</div>
</form>
<div class="actions">
	<h3><?php echo __('サブメニュー'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('商品一覧'), array('action' => 'index')); ?> </li>
	</ul>
</div>