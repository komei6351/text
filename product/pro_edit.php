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

        $sql = 'SELECT name FROM mst_pro WHERE code=?';
        $stmt = $dbh -> prepare($sql);
        $data[] = $pro_code;
        $stmt -> execute($data);

        $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
        $pro_name = $rec['name'];

        $dbh = null;

    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }

    ?>

    スタッフ修正<br />
    <br />
    スタッフコード<br />
    <?php print $pro_code; ?>
    <br />
    <br />
    <form method="post" action="pro_edit_check.php">
    <input type="hidden" name="code" value="<?php print $pro_code; ?>">    
    スタッフ名<br />
    <input type="text" name="name" style="width:200px" value="<?php print $pro_name; ?>"><br />

    パスワードを入力してください。 <br />
    <input type="password" name="pass" style="width:100px"><br />
    パスワードをもう一度入力してください。 <br />
    <input type="password" name="pass2" style="width:100px"><br />
    <br />
    <button type="button" onclick="history.back()">戻る</button>
    <button type="submit">Ｏｋ</button>
    </form>

    </body>
</html>