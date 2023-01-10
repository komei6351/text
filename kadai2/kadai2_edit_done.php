<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>ろくまる農園</title>
</head>

<body>

    <?php

    try {
        $kadai2_code  = $_POST['code'];
        $kadai2_title  = $_POST['title'];
        $kadai2_description = $_POST['description'];
        $kadai2_file_title_old = $_POST['file_title_old'];
        $kadai2_file_title= $_POST['file_title'];

        $kadai2_code  = htmlspecialchars($kadai2_code, ENT_QUOTES, 'UTF-8');
        $kadai2_title  = htmlspecialchars($kadai2_title, ENT_QUOTES, 'UTF-8');
        $kadai2_description  = htmlspecialchars($kadai2_description, ENT_QUOTES, 'UTF-8');

        $dsn  = 'mysql:dbtitle=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh  = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $spl  = 'UPDATE mst_kadai2duct SET title=?,description=?,file=? WHERE code=?';
        $stmt = $dbh->prepare($spl);
        $data[] = $kadai2_title;
        $data[] = $kadai2_description;
        $data[] = $kadai2_file_title;
        $data[] = $kadai2_code;
        $stmt->execute($data);

        $dbh = null;

        if ($kadai2_file_title_old != $kadai2_file_title) {

            if ($kadai2_file_title_old != '') {
            unlink('./file/' . $kadai2_file_title_old);
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