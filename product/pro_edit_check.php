<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="utf-8">
        <title>ろくまる農園</title>
    </head>
    <body>

    <?php

    $pro_code  = $_POST['code'];
    $pro_name  = $_POST['name'];
    $pro_price  = $_POST['price'];

    $pro_code  = htmlspecialchars($pro_code,ENT_QUOTES,'UTF-8');
    $pro_name  = htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
    $pro_price = htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');

    if ($pro_name == '') {
        print'商品名が入力されていません。<br />';
    } else {
        print '商品名 :';
        print $pro_name;
        print '<br />';
    }

    if ($pro_price == '') {
        print '価格が入力されていません。<br />';
    }

    if ($pro_name == '' || $pro_price == '') {
        print '<form>';
        print '<button type="button" onclick="history.back()">戻る</button>';
        print '</form>';
    } else {
        print '上期のように変更します。<br />';
        print '<form method="post" action="pro_edit_done.php">';
        print '<input type="hidden" name="code" value="'.$pro_code .'">';
        print '<input type="hidden" name="name" value="'.$pro_name .'">';
        print '<input type="hidden" name="pass" value="'.$pro_price .'">';
        print '<br />';
        print '<button type="button" onclick="history.back()">戻る</button>';
        print '<button type="submit">ＯＫ</button>';
        print '</form>';
    }

    ?>

    </body>
</html>