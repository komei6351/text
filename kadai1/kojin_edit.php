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

    データ修正<br />
    <br />
    個人コード<br />
    <?php print $kojin_code; ?>
    <br />
    <br />
    <form method="post" action="kojin_edit_check.php">
    <input type="hidden" name="code" value="<?php print $kojin_code; ?>">    
    氏名<br />
    <input type="text" name="name" style="width:200px" value="<?php print $kojin_name; ?>"><br />

    パスワードを入力してください。 <br />
    <input type="password" name="pass" style="width:100px"><br />
    パスワードをもう一度入力してください。 <br />
    IDを入力してください。<br />
        <input type="id" name="id" style="width:200px"><br />
        氏名を入力してください。<br />
        <input type="text" name="name" style="width:100px"><br />
        ふりがなを入力してください。<br />
        <input type="text" name="huri" style="width:100px"><br />
        郵便番号を入力してください。<br />
        <input type="text" name="yubin" style="width:100px"><br />
        住所を入力してください。<br />
        <input type="text" name="jusyo" style="width:100px"><br />
        電話番号を入力してください。<br />
        <input type="text" name="den" style="width:100px"><br />
        E-mailアドレスを入力してください。<br />
        <input type="text" name="mail" style="width:100px"><br />
    <input type="password" name="pass2" style="width:100px"><br />
    <br />
    <button type="button" onclick="history.back()">戻る</button>
    <button type="submit">Ｏｋ</button>
    </form>

    </body>
</html>