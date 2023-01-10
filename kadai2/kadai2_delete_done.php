<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ろくまる農園</title>
    </head>
    <body>

    <?php

    try {
        $kadai2_code = $_POST['code'];
        $kadai2_file_title = $_POST['file_title'];

        $dsn  = 'mysql:dbtitle=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh  = new PDO($dsn, $user, $password);
        $dbh  -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $spl  = 'DELETE FROM mst_kadai2duct WHERE code=?';
        $stmt = $dbh -> prepare($spl);
        $data[] = $kadai2_code;
        $stmt -> execute($data);

        $dbh = null;

        if ($kadai2_file_title !='') {
            unlink('./file/'.$kadai2_file_title);
        }
    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        print '<br>' .$e -> getMessage();
        exit();
    }

    ?>

    削除しました。 <br />
    <br />

    <a href="kadai2_list.php">戻る</a>

    </body>
</html>