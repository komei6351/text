<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ろくまる農園</title>
        <h1>画像の修正</h1>
    </head>
    <body>

    <?php

    try {

        $kadai2_id = $_GET['kadai2id'];

        $dsn  = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT title,description,file FROM image WHERE id=?';
        $stmt = $dbh -> prepare($sql);
        $data[] = $kadai2_id;
        $stmt -> execute($data);

        $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
        $kadai2_title = $rec['title'];
        $kadai2_description = $rec['description'];
        $kadai2_file_name_old=$rec['file'];

        $dbh = null;

        if ($kadai2_file_name_old=="") {
            $disp_file="";
        } else {
            $disp_file = '<img src="./image/' . $kadai2_file_name_old . '">';
        }

    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }

    ?>

    タイトル修正<br />
    <br />
    タイトルコード<br />
    <?php print $kadai2_id; ?>
    <br />
    <br />
    <form method="post" action="kadai2_edit_check.php"enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php print $kadai2_id; ?>"> 
    <input type="hidden" name="file_name_old" value="<?php print $kadai2_file_name_old; ?>">     
    タイトル名<br />
    <input type="text" name="title" style="width:200px" value="<?php print $kadai2_title; ?>"><br />
    説明 <br />
    <input type="text" name="description" style="width:50px"><br />
    <br />
    <?php print $disp_file;?>
    <br />
    画像を選んでください。<br />
        <input type="file" name="file" style="width:400px"><br />
        <br />
    <button type="button" onclick="history.back()">戻る</button>
    <button type="submit">Ｏｋ</button>
    </form>

    </body>
</html>