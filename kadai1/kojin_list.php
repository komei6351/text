<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>個人情報一覧</title>
        <link type="text/css" href="kojin_list.css" rel="stylesheet">
        <meta http-equiv="Cache-Control" content="no-cache">
    </head>
    <body>

    <?php

    try {
        $dsn  = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT id, name, huri FROM kojin WHERE 1';
        $stmt = $dbh -> prepare($sql);
        $stmt -> execute();

        $dbh = null;

        print "個人情報<br /><br />\n";

        print '<form method="post" action="kojin_branch.php">'."\n";
        while (true) {
            $rec= $stmt -> fetch(PDO::FETCH_ASSOC);
            if ($rec == false) {
                break;
            }
            print '<input type="radio" name="kojinid" value="'.$rec['id'] .'">';
            print "  ID". " ". $rec['id']. '<br />';
            print "　　氏名". " ". $rec['name']. '<br />';
            print "ふりがな". " ". $rec['huri']. '<br />'. "\n";

        }
        print'<br />';
        print '<button type="submit" name="disp">個別表示</button>';
        print '<button type="submit" name="edit">データ修正</button>';
        print '<button type="submit" name="add">新規登録</button>';
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