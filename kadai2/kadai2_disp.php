<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>ろくまる農園</title>
</head>

<body>

    <?php

    try {

        $kadai2_code = $_GET['kadai2code'];

        $dsn  = 'mysql:dbtitle=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT title,description,file FROM mst_kadai2duct WHERE code=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $kadai2_code;
        $stmt->execute($data);

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        $kadai2_title = $rec['title'];
        $kadai2_description = $rec['description'];
        $kadai2_file_title = $rec['file'];

        $dbh = null;

        if ($kadai2_file_title == "") {
            $disp_file = "";
        } else {
            $disp_file = '<img src="./file/' . $kadai2_file_title . '">';
        }
    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }

    ?>

    タイトル情報参照<br />
    <br />
    タイトルコード<br />
    <?php print $kadai2_code; ?>
    <br />
    タイトル名<br />
    <?php print $kadai2_title; ?>
    <br />
    説明<br />
    <?php print $kadai2_description; ?>円
    <br />
    <?php print $disp_file; ?>
    <br />
    <br />
    <form>
        <button type="button" onclick="history.back()">戻る</button>
    </form>

</body>

</html>