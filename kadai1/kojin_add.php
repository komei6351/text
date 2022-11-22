<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>個人情報</title>
    </head>
    <body>

    スタッフ追加<br />
    <br />
    <form method="post" action="kojin_add_check.php">
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
        <br />
        <button type="button" onclick="history.back()">戻る</button>
        <button type="submit">ＯＫ</button>
    </form>

    </body>
</html>