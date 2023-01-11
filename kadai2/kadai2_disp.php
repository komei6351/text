<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>ろくまる農園</title>
    <h1>画像の表示</h1>
</head>

<body>

    <?php

    try {

        $kadai2_id = $_GET['kadai2id'];

        $dsn  = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT title,description,file FROM image WHERE id=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $kadai2_id;
        $stmt->execute($data);

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        $kadai2_title = $rec['title'];
        $kadai2_description = $rec['description'];
        $kadai2_file_name = $rec['file'];

        $dbh = null;

        if ($kadai2_file_name == "") {
            $disp_file = "";
        } else {
            $disp_file = '<img src="./image/' . $kadai2_file_name . '">';
        }
    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }

    ?>

    タイトル情報参照<br />
    <br />
    タイトルコード<br />
    <?php print $kadai2_id; ?>
    <br />
    タイトル名<br />
    <?php print $kadai2_title; ?>
    <br />
    説明<br />
    <?php print $kadai2_description; ?>
    <br />
    <?php print $disp_file; ?>
    <br />
    <br />
    <form>
        <button type="button" onclick="history.back()">戻る</button>
    </form>

</body>

</html>