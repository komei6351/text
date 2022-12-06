<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>個人情報</title>
        <link type="text/css" href="kojin_list.css" rel="stylesheet">
        <meta http-equiv="Cache-Control" content="no-cache">

    </head>
    <body>

    <?php

    try {

        $kojin_id = $_GET['kojinid'];

        $dsn  = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT id,name FROM kojin WHERE id=?';
        $stmt = $dbh -> prepare($sql);
        $data[] = $kojin_id;
        $stmt -> execute($data);

        $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
        $kojin_name = $rec['name'];

        $dbh = null;

    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        print '<br>' .$e -> getMessage();
        exit();
    }

    ?>

    個別表示<br />
    <br />
    個人ID<br />
    <?php print $kojin_id; ?>
    <br />
    氏名<br />
    <?php print $kojin_name; ?>
    <br />
    <br />
    <form>
    <button type="button" onclick="history.back()">戻る</button>
    </form>

    </body>
</html>