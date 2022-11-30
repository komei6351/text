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

        $sql = 'SELECT name FROM kojin WHERE id=?';
        $stmt = $dbh -> prepare($sql);
        $data[] = $kojin_id;
        $stmt -> execute($data);

        $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
        $kojin_name = $rec['name'];

        $dbh = null;

    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }

    ?>

    データ修正<br />
    <br />
    個人コード<br />
    <?php print $kojin_id; ?>
    <br />
    <br />
    <form method="post" action="kojin_edit_check.php">
    <input type="hidden" name="id" value="<?php print $kojin_id; ?>">    
    氏名を変更してください<br />
    <input type="text" name="name" style="width:300px" value="<?php print $kojin_name; ?>"><br />
    ふりがなを入力してください。<br />
    <input type="text" name="huri" style="width:300px"><br />
    郵便番号を入力してください。<br />
    <input type="text" name="yubin" style="width:300px"><br />
    住所を入力してください。<br />
    <input type="text" name="jusyo" style="width:300px"><br />
    電話番号を入力してください。<br />
    <input type="text" name="den" style="width:300px"><br />
    E-mailアドレスを入力してください。<br />
    <input type="text" name="mail" style="width:300px"><br />
    <br />
    <button type="button" onclick="history.back()">戻る</button>
    <button type="submit">Ｏｋ</button>
    </form>

    </body>
</html>