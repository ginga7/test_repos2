<div class="bids form">
<?php echo $this->Form->create('Bid',array('onsubmit' => 'return check()')); ?>
	<fieldset>
		<legend><?php echo __('入札'); ?></legend>
	<?php
		$now = $now_bid_price+1;
		echo $this->Form->input('bid_price',array('value' => $now));
	?>
	</fieldset>
<?php echo $this->Form->end(__('入札')); ?>
</div>
<div class="actions">
	<h3><?php echo __('サブメニュ－'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('商品詳細'), array('controller'=>'Products','action' => 'view',$product_id)); ?></li>
	</ul>
</div>
<?php $this->Html->scriptStart(array('inline' => false)); ?>

function check(){
	if (confirm('この商品に入札を致します。よろしいですか？')) {
		if(<?php echo $now_bid_price?> >= document.getElementById("BidBidPrice").value){
			alert("入札金額が現在の最高入札額より低いです。");
			return false;
		}
	} else {
		alert('入札はキャンセルされました。');
		return false;
	}
}
<?php $this->Html->scriptEnd(); ?>