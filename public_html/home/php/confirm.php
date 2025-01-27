<?php
// セッションの開始
session_start();

// セッションデータが存在しない場合、フォームページにリダイレクト
if (!isset($_SESSION['form_data'])) {
    header('Location: analyzeForm.php');
    exit;
}

// セッションからデータを取得
$form_data = $_SESSION['form_data'];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>入力内容の確認</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/confirm.css">
</head>

<body>
    <header>
        <h1>入力内容の確認</h1>
    </header>

    <main>
        <div class="container">
            <div class="card">
                <h2>以下の内容でよろしいですか？</h2>

                <form method="POST" action="submit.php">
                    <?php foreach ($form_data as $key => $value): ?>
                        <div class="form-group">
                            <h3><?php echo htmlspecialchars(ucwords(str_replace('_', ' ', $key))); ?></h3>
                            <p><?php echo nl2br(htmlspecialchars($value)); ?></p>
                        </div>
                    <?php endforeach; ?>

                    <div class="button-group">
                        <a href="analyzeForm.php" class="button">修正する</a>
                        <button type="submit" class="button">送信する</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>