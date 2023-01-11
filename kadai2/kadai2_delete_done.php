<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ろくまる農園</title>
        <h1>画像削除確認</h1>
    </head>
    <body>

    <?php

    try {
        $kadai2_id = $_POST['id'];
        $kadai2_file_name = $_POST['file_name'];

        $dsn  = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh  = new PDO($dsn, $user, $password);
        $dbh  -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $spl  = 'DELETE FROM image WHERE id=?';
        $stmt = $dbh -> prepare($spl);
        $data[] = $kadai2_id;
        $stmt -> execute($data);

        $dbh = null;

        if ($kadai2_file_name !='') {
            unlink('./image/'.$kadai2_file_name);
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