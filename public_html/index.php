<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrueHue - 登録画面</title>
    <link rel="stylesheet" href="./home/css/index.css">
</head>

<body>
    <!-- ヘッダー -->
    <header>
        <h1>TrueHue</h1>
    </header>

    <!-- 登録フォームのコンテナ -->
    <div class="container">
        <div class="card">
            <h2>登録画面</h2>
            <form action="./home/php/remind.php" method="post">
                <!-- 名前の入力欄 -->
                <label for="name">ニックネームを入力してください</label>
                <input type="text" id="name" name="name" placeholder="" required>

                <!-- 登録ボタン -->
                <button type="submit" class="button">登録する</button>
            </form>
        </div>
    </div>
</body>

</html>