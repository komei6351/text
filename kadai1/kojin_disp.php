<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>個人情報</title>
    </head>
    <body>

    <?php

    try {

        $kojin_code = $_GET['kojincode'];

        $dsn  = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT name FROM kojin WHERE code=?';
        $stmt = $dbh -> prepare($sql);
        $data[] = $kojin_code;
        $stmt -> execute($data);

        $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
        $kojin_name = $rec['name'];

        $dbh = null;

    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }

    ?>

    個人情報参照<br />
    <br />
    個人コード<br />
    <?php print $kojin_code; ?>
    <br />
    スタッフ名<br />
    <?php print $kojin_name; ?>
    <br />
    <br />
    <form>
    <button type="button" onclick="history.back()">戻る</button>
    </form>

    </body>
</html>