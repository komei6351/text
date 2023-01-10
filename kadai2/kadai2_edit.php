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

        $sql = 'SELECT title,description,file FROM mst_kadai2duct WHERE code=?';
        $stmt = $dbh -> prepare($sql);
        $data[] = $kadai2_code;
        $stmt -> execute($data);

        $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
        $kadai2_title = $rec['title'];
        $kadai2_description = $rec['description'];
        $kadai2_file_title_old=$rec['file'];

        $dbh = null;

        if ($kadai2_file_title_old=="") {
            $disp_file="";
        } else {
            $disp_file='<img src="./file/'.$kadai2_file_title_old.'">';
        }

    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }

    ?>

    タイトル修正<br />
    <br />
    タイトルコード<br />
    <?php print $kadai2_code; ?>
    <br />
    <br />
    <form method="post" action="kadai2_edit_check.php"enctype="multipart/form-data">
    <input type="hidden" title="code" value="<?php print $kadai2_code; ?>"> 
    <input type="hidden" title="file_title_old" value="<?php print $kadai2_file_title_old; ?>">     
    タイトル名<br />
    <input type="text" title="title" style="width:200px" value="<?php print $kadai2_title; ?>"><br />
    説明 <br />
    <input type="text" title="description" style="width:50px"><br />
    <br />
    <?php print $disp_file;?>
    <br />
    画像を選んでください。<br />
        <input type="file" title="file" style="width:400px"><br />
        <br />
    <button type="button" onclick="history.back()">戻る</button>
    <button type="submit">Ｏｋ</button>
    </form>

    </body>
</html>