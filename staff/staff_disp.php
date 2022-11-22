<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ろくまる農園</title>
    </head>
    <body>

    <?php

    try {

        $staff_code = $_GET['staffcode'];

        $dsn  = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT name FROM mst_staff WHERE code=?';
        $stmt = $dbh -> prepare($sql);
        $data[] = $staff_code;
        $stmt -> execute($data);

        $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
        $staff_name = $rec['name'];

        $dbh = null;

    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }

    ?>

    スタッフ情報参照<br />
    <br />
    スタッフコード<br />
    <?php print $staff_code; ?>
    <br />
    スタッフ名<br />
    <?php print $staff_name; ?>
    <br />
    <br />
    <form>
    <button type="button" onclick="history.back()">戻る</button>
    </form>

    </body>
</html>