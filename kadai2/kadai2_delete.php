<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ろくまる農園</title>
    </head>
    <body>

    <?php

    try {

        $kadai2_code = $_GET['kadai2code'];

        $dsn  = 'mysql:dbtitle=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT title,file FROM mst_kadai2duct WHERE code=?';
        $stmt = $dbh -> prepare($sql);
        $data[] = $kadai2_code;
        $stmt -> execute($data);

        $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
        $kadai2_title = $rec['title'];
        $kadai2_file_title = $rec['file'];

        $dbh = null;

        if ($kadai2_file_title=='') {
            $disp_file='';
        } else {
            $disp_file='<img src="./file/'.$kadai2_file_title.'">';
        }
    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }

    ?>

    タイトル削除<br />
    <br />
    タイトルコード<br />
    <?php print $kadai2_code; ?>
    <br />
    タイトル名<br />
    <?php print $kadai2_title;?>
    <br />
    <?php print $disp_file;?>
    <br />
    このタイトルを削除してよろしいですか？<br />
    <br />
    <form method="post" action="kadai2_delete_done.php">
    <input type="hidden" title="code" value="<?php print $kadai2_code; ?>">
    <input type="hidden" title="file_title" value="<?php print $kadai2_file_title; ?>">   
    <button type="button" onclick="history.back()">戻る</button>
    <button type="submit">Ｏｋ</button>
    </form>

    </body>
</html>