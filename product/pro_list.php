<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ななまる農園</title>
    </head>
    <body>

    <?php

    try {
        $dsn  = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT code, name,price FROM mst_product WHERE 1';
        $stmt = $dbh -> prepare($sql);
        $stmt -> execute();

        $dbh = null;

        print "商品一覧<br /><br />\n";

        print '<form method="post" action="pro_branch.php">'."\n";
        while (true) {
            $rec= $stmt -> fetch(PDO::FETCH_ASSOC);
            if ($rec == false) {
                break;
            }
            print '<input type="radio" name="procode" value="'.$rec['code'] .'">';
            print $rec['name'].'---';
            print $rec['price'].'円';
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

    </body>
</html>