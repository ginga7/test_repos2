<?=$name?>様

この度は弊社より書籍をご購入頂き真にありがとうございます。

下記のご注文を確かに承りました。
ご購入された商品の詳細をお送りいたします。
内容にお間違いなどないかご確認くださいませ。

---------------------------------------------
<?php foreach($books as $book):?>
<?php $total+=$book['Book']['price'] ?>
商品名:<?=$book['Book']['title']."\n"?>
値段:<?= $book['Book']['price']."円\n"?>

<?php endforeach;?>


合計：<?=$total?>円
---------------------------------------------

お届けまでお待たせしてしまい恐縮ですが、
もう少々お待ち頂ければ幸いです。
また商品や配送方法などについて何か気になる点など
ございましたらお気軽にご連絡くださいませ。

改めてこの度は当店をご利用頂きありがとうございました。
またのご利用お待ち申し上げています。
