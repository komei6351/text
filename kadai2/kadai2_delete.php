<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ろくまる農園</title>
        <h1>画像削除</h1>
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

        $sql = 'SELECT title,file FROM image WHERE id=?';
        $stmt = $dbh -> prepare($sql);
        $data[] = $kadai2_id;
        $stmt -> execute($data);

        $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
        $kadai2_title = $rec['title'];
        $kadai2_file_name = $rec['file'];

        $dbh = null;

        if ($kadai2_file_name=='') {
            $disp_file='';
        } else {
            $disp_file='<img src="./image/'.$kadai2_file_name.'">';
        }
    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }

    ?>

    タイトル削除<br />
    <br />
    タイトルコード<br />
    <?php print $kadai2_id; ?>
    <br />
    タイトル名<br />
    <?php print $kadai2_title;?>
    <br />
    <?php print $disp_file;?>
    <br />
    このタイトルを削除してよろしいですか？<br />
    <br />
    <form method="post" action="kadai2_delete_done.php">
    <input type="hidden" name="id" value="<?php print $kadai2_id; ?>">
    <input type="hidden" name="file_name" value="<?php print $kadai2_file_name; ?>">   
    <button type="button" onclick="history.back()">戻る</button>
    <button type="submit">Ｏｋ</button>
    </form>

    </body>
</html>