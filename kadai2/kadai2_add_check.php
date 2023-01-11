<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>ろくまる農園</title>
    <h1>画像の登録確認</h1>
</head>

<body>

    <?php

    $kadai2_title = $_POST['title'];
    $kadai2_description = $_POST['description'];
    $kadai2_file = $_FILES['file'];

    $kadai2_title = htmlspecialchars($kadai2_title, ENT_QUOTES, 'UTF-8');
    $kadai2_description = htmlspecialchars($kadai2_description, ENT_QUOTES, 'UTF-8');

    if ($kadai2_title == '') {
        print 'タイトルが入力されていません。<br />';
    } else {
        print 'タイトル名';
        print $kadai2_title;
        print '<br />';
    }
    if ($kadai2_description == '') {
        print '説明を入力してください。 <br />';
    } else {
        print '説明';
        print $kadai2_description;
        print '<br />';
    }
    if ($kadai2_file['size'] > 0) {
        if ($kadai2_file['size'] > 1000000) {
            print '画像が大きすぎます';
        } else {
            move_uploaded_file($kadai2_file['tmp_name'], './image/' . $kadai2_file['name']);
            print '<img src="./image/' . $kadai2_file['name'] . '">';
            print '<br />';
        }
    }
        if ($kadai2_title == '' ||  $kadai2_description == '' || $kadai2_file['size'] > 1000000) {
            print '<form>';
            print '<button type="button" onclick="history.back()">戻る</button>';
            print '</form>';
        } else {
        print '上記のタイトルを追加します。<br />';
        print '<form method="post"action="kadai2_add_done.php">';
        print '<input type="hidden" name="title" value="' . $kadai2_title . '">';
        print '<input type="hidden" name="description" value="' . $kadai2_description . '">';
        print '<input type="hidden" name="file_name" value="' . $kadai2_file['name'] . '">';
        print '<br />';
        print '<button type="button" onclick="history.back()">戻る</button>';
        print '<button type="submit">ＯＫ</button>';
        print '</form>';
    }


    ?>

</body>

</html>