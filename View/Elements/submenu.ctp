<div class="actions">
	<h3><?php echo __('遷移一覧'); ?></h3>
	<ul>

<!-- 書籍view -->
<?php if($cmd == "topBook"):?>
		<li>書籍機能</li>
		<li><?php echo $this->Html->link(__('書籍登録'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('カート確認'), array('action' => 'showCart')); ?></li>
		<br><br>
		<li>ユーザー機能</li>
		<li><?php echo $this->Html->link(__('ユーザーリスト'), array('controller' =>'Users','action' => 'index')); ?></li>
<?php elseif($cmd == "addBook"):?>
		<li>書籍機能</li>
		<li><?php echo $this->Html->link(__('書籍一覧'), array('controller' =>'Books','action' => 'index')); ?></li>
		<br><br>
		<li>ユーザー機能</li>
<?php elseif($cmd == "viewBook"):?>
		<li>書籍機能</li>
		<li><?php echo $this->Html->link(__('書籍一覧'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('書籍登録'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('書籍更新'), array('action' => 'edit', $book['Book']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('書籍削除'), array('action' => 'delete', $book['Book']['id']), array('confirm' => __('Isbn'.$book['Book']['isbn'].DELETE_CHECK, $book['Book']['id']))); ?></li>
		<br><br>
		<li>ユーザー機能</li>
<?php elseif($cmd == "editBook"):?>
		<li>書籍機能</li>
		<li><?php echo $this->Form->postLink(__('書籍削除'), array('action' => 'delete', $this->Form->value('Book.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Book.id')))); ?></li>
		<li><?php echo $this->Html->link(__('書籍一覧'), array('action' => 'index')); ?></li>
		<br><br>
		<li>ユーザー機能</li>
<?php elseif($cmd == "showCart"):?>
		<li>書籍機能</li>
		<li><?php echo $this->Html->link(__('書籍一覧'), array('action' => 'index')); ?></li>
		<br><br>
		<li>ユーザー機能</li>


<!-- ユーザーview -->
<?php elseif($cmd == "login"):?>
		<li>ユーザー機能</li>
		<li><?php echo $this->Html->link(__('会員登録'), array('action' => 'add')); ?></li>
<?php elseif($cmd == "topUser"):?>
		<li>書籍機能</li>
		<li><?php echo $this->Html->link(__('書籍一覧'), array('controller'=>'Books','action' => 'index')); ?></li>
		<br><br>
		<li>ユーザー機能</li>
		<li><?php echo $this->Html->link(__('ユーザー登録'), array('action' => 'add')); ?></li>
<?php elseif($cmd == "addUser"):?>
		<li>ユーザー機能</li>
		<li><?php echo $this->Html->link(__('ユーザー一覧'), array('action' => 'index')); ?></li>
<?php elseif($cmd == "viewUser"):?>
		<li>ユーザー機能</li>
		<li><?php echo $this->Html->link(__('ユーザー情報更新'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('ユーザー削除'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('ユーザーリスト'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('ユーザー登録'), array('action' => 'add')); ?> </li>
<?php elseif($cmd == "editUser"):?>
		<li>ユーザー機能</li>
		<li><?php echo $this->Form->postLink(__('ユーザー削除'), array('action' => 'delete', $this->Form->value('User.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('User.id')))); ?></li>
		<li><?php echo $this->Html->link(__('ユーザーリスト'), array('action' => 'index')); ?></li>

<?php endif;?>

<!-- ログイン時以外は表示する -->
<?php if($cmd != "login"):?>
		<li><?php echo $this->Html->link(__('ログアウト'), array('action' => 'logout')); ?></li>
<?php endif;?>
	</ul>
</div>