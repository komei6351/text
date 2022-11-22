<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>個人情報</title>
    </head>
    <body>

    <?php

    try {
        $kojin_id     = $_POST['id'];
        $kojin_name   = $_POST['name'];
        $kojin_huri   = $_POST['huri'];
        $kojin_yubin  = $_POST['yubin'];
        $kojin_jyusyo = $_POST['jyusyo'];
        $kojin_den    = $_POST['den'];
        $kojin_mail   = $_POST['mail'];
    
        $kojin_id  = htmlspecialchars($kojin_id,ENT_QUOTES,'UTF-8');
        $kojin_name  = htmlspecialchars($kojin_name,ENT_QUOTES,'UTF-8');
        $kojin_huri = htmlspecialchars($kojin_huri,ENT_QUOTES,'UTF-8');
        $kojin_yubin = htmlspecialchars($kojin_yubin,ENT_QUOTES,'UTF-8');
        $kojin_jyusyo = htmlspecialchars($kojin_jyusyo,ENT_QUOTES,'UTF-8');
        $kojin_den = htmlspecialchars($kojin_den,ENT_QUOTES,'UTF-8');
        $kojin_mail = htmlspecialchars($kojin_mail,ENT_QUOTES,'UTF-8');

        $dsn  = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh  = new PDO($dsn, $user, $password);
        $dbh  -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $spl  = 'INSERT INTO mst_kojin(name, password) VALUES (?,?)';
        $stmt = $dbh -> prepare($spl);
        $data[] = $kojin_id;
        $data[] = $kojin_name;
        $data[] = $kojin_huri;
        $data[] = $kojin_yubin;
        $data[] = $kojin_jyusyo;
        $data[] = $kojin_den;
        $data[] = $kojin_mail;
        $stmt -> execute($data);

        $dbh = null;

        print $kojin_name;
        print 'さんを追加しました。 <br />';

    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        print '<br>' .$e -> getMessage();
        exit();
    }

    ?>

    <a href="kojin_list.php">戻る</a>

    </body>
</html>