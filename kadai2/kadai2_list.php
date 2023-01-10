<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ななまる農園</title>
    </head>
    <body>

    <?php

    try {
        $dsn  = 'mysql:dbtitle=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT code, title,description FROM file WHERE 1';
        $stmt = $dbh -> prepare($sql);
        $stmt -> execute();

        $dbh = null;

        print "タイトル一覧<br /><br />\n";

        print '<form method="post" action="kadai2_branch.php">'."\n";
        while (true) {
            $rec= $stmt -> fetch(PDO::FETCH_ASSOC);
            if ($rec == false) {
                break;
            }
            print '<input type="radio" title="kadai2code" value="'.$rec['code'] .'">';
            print $rec['title'].'---';
            print $rec['description'].'円';
            print '<br />'."\n";
        }
        print '<button type="submit" title="disp">参照</button>';
        print '<button type="submit" title="add">追加</button>';
        print '<button type="submit" title="edit">修正</button>';
        print '<button type="submit" title="delete">削除</button>';
        print '</form>'."\n";

    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        print '<br>' .$e -> getMessage();
        exit();
    }

    ?>

    </body>
</html>