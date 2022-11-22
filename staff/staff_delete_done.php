<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ろくまる農園</title>
    </head>
    <body>

    <?php

    try {
        $staff_code = $_POST['code'];

        $dsn  = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh  = new PDO($dsn, $user, $password);
        $dbh  -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $spl  = 'DELETE FROM mst_staff WHERE code=?';
        $stmt = $dbh -> prepare($spl);
        $data[] = $staff_code;
        $stmt -> execute($data);

        $dbh = null;


    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        print '<br>' .$e -> getMessage();
        exit();
    }

    ?>

    削除しました。 <br />
    <br />

    <a href="staff_list.php">戻る</a>

    </body>
</html>