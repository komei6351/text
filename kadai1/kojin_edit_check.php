<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="utf-8">
        <title>個人情報</title>
        <link type="text/css" href="kojin_list.css" rel="stylesheet">
        <meta http-equiv="Cache-Control" content="no-cache">

    </head>
    <body>

    <?php
$kojin_id   = $_POST['id'];
$kojin_name   = $_POST['name'];
$kojin_huri   = $_POST['huri'];
$kojin_yubin  = $_POST['yubin'];
$kojin_jusyo  = $_POST['jusyo'];
$kojin_den    = $_POST['den'];
$kojin_mail   = $_POST['mail'];

$kojin_name  = htmlspecialchars($kojin_name,ENT_QUOTES,'UTF-8');
$kojin_huri  = htmlspecialchars($kojin_huri,ENT_QUOTES,'UTF-8');
$kojin_yubin = htmlspecialchars($kojin_yubin,ENT_QUOTES,'UTF-8');
$kojin_jusyo = htmlspecialchars($kojin_jusyo,ENT_QUOTES,'UTF-8');
$kojin_den   = htmlspecialchars($kojin_den,ENT_QUOTES,'UTF-8');
$kojin_mail  = htmlspecialchars($kojin_mail,ENT_QUOTES,'UTF-8');

if ($kojin_name == '') {
    print'氏名が入力されていません。<br />';
} else {
    print '氏名 :';
    print $kojin_name;
    print '<br />';
}

if ($kojin_huri == '') {
    print'ふりがなが入力されていません。<br />';
} 

if ($kojin_yubin == '') {
    print'郵便番号が入力されていません。<br />';
}

if ($kojin_jusyo == '') {
    print'住所が入力されていません。<br />';
}

if ($kojin_den == '') {
    print'電話番号が入力されていません。<br />';
} 

if ($kojin_mail == '') {
    print'E-メールアドレスが入力されていません。<br />';
} 

    if ($kojin_name == '' || $kojin_huri == '' || $kojin_yubin == '' || $kojin_jusyo == '' || $kojin_den == '' || $kojin_mail == '') {
        print '<form>';
        print '<button type="button" onclick="history.back()">戻る</button>';
        print '</form>';
    } else {
        print '<form method="post" action="kojin_edit_done.php">';
        print '<input type="hidden" name="id" value="'.$kojin_id .'">';
        print '<input type="hidden" name="name" value="'.$kojin_name .'">';
        print '<input type="hidden" name="huri" value="'.$kojin_huri .'">';
        print '<input type="hidden" name="yubin" value="'.$kojin_yubin .'">';
        print '<input type="hidden" name="jusyo" value="'.$kojin_jusyo .'">';
        print '<input type="hidden" name="den" value="'.$kojin_den .'">';
        print '<input type="hidden" name="mail" value="'.$kojin_mail .'">';
        print '<br />';
        print '<button type="button" onclick="history.back()">戻る</button>';
        print '<button type="submit">ＯＫ</button>';
        print '</form>';
    }

    ?>

    </body>
</html>