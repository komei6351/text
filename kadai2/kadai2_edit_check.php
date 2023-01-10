<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>ろくまる農園</title>
</head>

<body>

    <?php

    $kadai2_code  = $_POST['code'];
    $kadai2_title  = $_POST['title'];
    $kadai2_description  = $_POST['description'];
    $kadai2_file_title_old = $_POST['file_title_old'];
    $kadai2_file  = $_FILES['file'];

    $kadai2_code  = htmlspecialchars($kadai2_code, ENT_QUOTES, 'UTF-8');
    $kadai2_title  = htmlspecialchars($kadai2_title, ENT_QUOTES, 'UTF-8');
    $kadai2_description = htmlspecialchars($kadai2_description, ENT_QUOTES, 'UTF-8');

    if ($kadai2_title == '') {
        print 'タイトル名が入力されていません。<br />';
    } else {
        print 'タイトル名 :';
        print $kadai2_title;
        print '<br />';
    }

    if ($kadai2_description == '') {
        print '説明が入力されていません。<br />';
    } if ($kadai2_file['size'] > 0) {
        if ($kadai2_file['size'] > 1000000) {
            print '画像が大きすぎます';
        } else {
            move_uploaded_file($kadai2_file['tmp_title'],'./file/'. $kadai2_file['title']);
            print '<img src="./file/' . $kadai2_file['title'] . '">';
            print '<br />';
        }
    } if ($kadai2_title == '' || preg_match('/\A[0-9]+\z/', $kadai2_description) == 0 || $kadai2_file['size'] > 1000000) {
        print '<form>';
        print '<button type="button" onclick="history.back()">戻る</button>';
        print '</form>';
    } else {
        print '上期のように変更します。<br />';
        print '<form method="post" action="kadai2_edit_done.php">';
        print '<input type="hidden" title="code" value="' . $kadai2_code . '">';
        print '<input type="hidden" title="title" value="' . $kadai2_title . '">';
        print '<input type="hidden" title="description" value="' . $kadai2_description . '">';
        print '<input type="hidden" title="file_title_old" value="' . $kadai2_file_title_old . '">';
        print '<input type="hidden" title="file_title" value="' . $kadai2_file['title'] . '">';
        print '<br />';
        print '<button type="button" onclick="history.back()">戻る</button>';
        print '<button type="submit">ＯＫ</button>';
        print '</form>';
    }


    ?>

</body>

</html>