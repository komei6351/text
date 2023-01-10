<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ろくまる農園</title>
    </head>
    <body>

    タイトル追加<br />
    <br />
    <form method="post" action="kadai2_add_check.php"enctype="multipart/form-data">
        タイトルを入力してください。<br />
        <input type="text" name="title" style="width:200px"><br />
        説明を入力してください。<br />
        <input type="text" name="description" style="width:50px"><br />
        画像を選んでください。<br />
        <input type="file" name="file" style="width:400px"><br />
        <br />
        <button type="button" onclick="history.back()">戻る</button>
        <button type="submit">ＯＫ</button>
    </form>

    </body>
</html>