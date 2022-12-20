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
    $pro_pass  = $_POST['pass'];
    $pro_pass2 = $_POST['pass2'];

    $pro_name  = htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
    $pro_pass  = htmlspecialchars($pro_pass,ENT_QUOTES,'UTF-8');
    $pro_pass2 = htmlspecialchars($pro_pass2,ENT_QUOTES,'UTF-8');

    if ($pro_name == '') {
        print'スタッフ名が入力されていません。<br />';
    } else {
        print 'スタッフ名 :';
        print $pro_name;
        print '<br />';
    }

    if ($pro_pass == '') {
        print 'パスワードが入力されていません。<br />';
    }

    if ($pro_pass != $pro_pass2) {
        print 'パスワードが一致しません。<br />';
    }

    if ($pro_name == '' || $pro_pass == '' || $pro_pass2 == '') {
        print '<form>';
        print '<button type="button" onclick="history.back()">戻る</button>';
        print '</form>';
    } else {
        $pro_pass = md5($pro_pass);
        print '<form method="post" action="pro_edit_done.php">';
        print '<input type="hidden" name="code" value="'.$pro_code .'">';
        print '<input type="hidden" name="name" value="'.$pro_name .'">';
        print '<input type="hidden" name="pass" value="'.$pro_pass .'">';
        print '<br />';
        print '<button type="button" onclick="history.back()">戻る</button>';
        print '<button type="submit">ＯＫ</button>';
        print '</form>';
    }

    ?>

    </body>
</html>