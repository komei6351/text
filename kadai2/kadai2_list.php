<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ななまる農園</title>
        <h1>画像一覧</h1>
    </head>
    <body>

    <?php

    try {
        $dsn  = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT id, title,description FROM image WHERE 1';
        $stmt = $dbh -> prepare($sql);
        $stmt -> execute();

        $dbh = null;


        print '<form method="post" action="kadai2_branch.php">'."\n";
        while (true) {
            $rec= $stmt -> fetch(PDO::FETCH_ASSOC);
            if ($rec == false) {
                break;
            }
            print '<input type="radio" name="kadai2id" value="'.$rec['id'] .'">';
            print $rec['title'].'<br />';
            print $rec['description'];
            print '<br />'."\n";
        }
        print '<button type="submit" name="disp">参照</button>';
        print '<button type="submit" name="add">追加</button>';
        print '<button type="submit" name="edit">修正</button>';
        print '<button type="submit" name="delete">削除</button>';
        print '</form>'."\n";

    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        print '<br>' .$e -> getMessage();
        exit();
    }

    ?>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>タイトル</th>
            <th>サムネイル</th>
        </tr>
        <tr>
            <th><?=$title?></th>
            <th></th>
            <th></th>
        </tr>
    </table>
    </body>
</html>