<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="utf-8">
        <title>個人情報</title>
    </head>
    <body>

    <?php

$kojin_id     = $_POST['id'];
$kojin_name   = $_POST['name'];
$kojin_huri   = $_POST['huri'];
$kojin_yubin  = $_POST['yubin'];
$kojin_jusyo = $_POST['jusyo'];
$kojin_den    = $_POST['den'];
$kojin_mail   = $_POST['mail'];

$kojin_id  = htmlspecialchars($kojin_id,ENT_QUOTES,'UTF-8');
$kojin_name  = htmlspecialchars($kojin_name,ENT_QUOTES,'UTF-8');
$kojin_huri = htmlspecialchars($kojin_huri,ENT_QUOTES,'UTF-8');
$kojin_yubin = htmlspecialchars($kojin_yubin,ENT_QUOTES,'UTF-8');
$kojin_jusyo = htmlspecialchars($kojin_jusyo,ENT_QUOTES,'UTF-8');
$kojin_den = htmlspecialchars($kojin_den,ENT_QUOTES,'UTF-8');
$kojin_mail = htmlspecialchars($kojin_mail,ENT_QUOTES,'UTF-8');

if ($kojin_id == '') {
    print'スタッフ名が入力されていません。<br />';
} else {
    print 'スタッフ名 :';
    print $kojin_id;
    print '<br />';
}

if ($kojin_name == '') {
    print'スタッフ名が入力されていません。<br />';
} else {
    print 'スタッフ名 :';
    print $kojin_name;
    print '<br />';
}

if ($kojin_huri == '') {
    print'スタッフ名が入力されていません。<br />';
} else {
    print 'スタッフ名 :';
    print $kojin_huri;
    print '<br />';
}

if ($kojin_yubin == '') {
    print'スタッフ名が入力されていません。<br />';
} else {
    print 'スタッフ名 :';
    print $kojin_yubin;
    print '<br />';
}

if ($kojin_jusyo == '') {
    print'スタッフ名が入力されていません。<br />';
} else {
    print 'スタッフ名 :';
    print $kojin_jusyo;
    print '<br />';
}

if ($kojin_den == '') {
    print'スタッフ名が入力されていません。<br />';
} else {
    print 'スタッフ名 :';
    print $kojin_den;
    print '<br />';
}

if ($kojin_mail == '') {
    print'スタッフ名が入力されていません。<br />';
} else {
    print 'スタッフ名 :';
    print $kojin_mail;
    print '<br />';
}

    if ($kojin_id == '' || $kojin_name == '' || $kojin_huri == '' || $kojin_yubin == '' || $kojin_jusyo == '' || $kojin_den == '' || $kojin_mail == '') {
        print '<form>';
        print '<button type="button" onclick="history.back()">戻る</button>';
        print '</form>';
    } else {
        $kojin_pass = md5($kojin_pass);
        print '<form method="post" action="kojin_edit_done.php">';
        print '<input type="hidden" name="name" value="'.$kojin_id .'">';
        print '<input type="hidden" name="pass" value="'.$kojin_name .'">';
        print '<input type="hidden" name="name" value="'.$kojin_huri .'">';
        print '<input type="hidden" name="pass" value="'.$kojin_yubin .'">';
        print '<input type="hidden" name="name" value="'.$kojin_jusyo .'">';
        print '<input type="hidden" name="pass" value="'.$kojin_den .'">';
        print '<input type="hidden" name="pass" value="'.$kojin_mail .'">';
        print '<br />';
        print '<button type="button" onclick="history.back()">戻る</button>';
        print '<button type="submit">ＯＫ</button>';
        print '</form>';
    }

    ?>

    </body>
</html>