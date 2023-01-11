<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>ろくまる農園</title>
    <h1>画像の修正</h1>
</head>

<body>

    <?php

    try {
        $kadai2_id  = $_POST['id'];
        $kadai2_title  = $_POST['title'];
        $kadai2_description = $_POST['description'];
        $kadai2_file_name_old = $_POST['file_name_old'];
        $kadai2_file_name= $_POST['file_name'];

        $kadai2_id  = htmlspecialchars($kadai2_id, ENT_QUOTES, 'UTF-8');
        $kadai2_title  = htmlspecialchars($kadai2_title, ENT_QUOTES, 'UTF-8');
        $kadai2_description  = htmlspecialchars($kadai2_description, ENT_QUOTES, 'UTF-8');

        $dsn  = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh  = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $spl  = 'UPDATE image SET title=?,description=?,file=? WHERE id=?';
        $stmt = $dbh->prepare($spl);
        $data[] = $kadai2_title;
        $data[] = $kadai2_description;
        $data[] = $kadai2_file_name;
        $data[] = $kadai2_id;
        $stmt->execute($data);

        $dbh = null;

        if ($kadai2_file_name_old != $kadai2_file_name) {

            if ($kadai2_file_name_old != '') {
            unlink('./image/' . $kadai2_file_name_old);
            }
        }
    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        print '<br>' . $e->getMessage();
        exit();
    }

    ?>

    修正しました。 <br />
    <br />

    <a href="kadai2_list.php">戻る</a>

</body>

</html>