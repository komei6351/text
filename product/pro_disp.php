<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ろくまる農園</title>
    </head>
    <body>

    <?php

    try {

        $pro_code = $_GET['procode'];

        $dsn  = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT name,price FROM mst_product WHERE code=?';
        $stmt = $dbh -> prepare($sql);
        $data[] = $pro_code;
        $stmt -> execute($data);

        $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
        $pro_name = $rec['name'];
        $pro_price = $rec['price'];

        $dbh = null;

    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }

    ?>

    商品情報参照<br />
    <br />
    スタッフコード<br />
    <?php print $pro_code; ?>
    <br />
    スタッフ名<br />
    <?php print $pro_name; ?>
    <br />
    <br />
    <form>
    <button type="button" onclick="history.back()">戻る</button>
    </form>

    </body>
</html>