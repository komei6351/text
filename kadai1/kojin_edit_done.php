<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>個人情報</title>
    </head>
    <body>

    <?php

    try {
        $kojin_code = $_POST['code'];
        $kojin_name = $_POST['name'];
        $kojin_pass = $_POST['pass'];

        $kojin_name  = htmlspecialchars($kojin_name,ENT_QUOTES,'UTF-8');
        $kojin_pass  = htmlspecialchars($kojin_pass,ENT_QUOTES,'UTF-8');

        $dsn  = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh  = new PDO($dsn, $user, $password);
        $dbh  -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $spl  = 'UPDATE mst_kojin SET name=?,password=? WHERE code=?';
        $stmt = $dbh -> prepare($spl);
        $data[] = $kojin_name;
        $data[] = $kojin_pass;
        $data[] = $kojin_code;
        $stmt -> execute($data);

        $dbh = null;


    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        print '<br>' .$e -> getMessage();
        exit();
    }

    ?>

    修正しました。 <br />
    <br />

    <a href="kojin_list.php">戻る</a>

    </body>
</html>