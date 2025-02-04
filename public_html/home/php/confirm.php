<?php
session_start();
include '../../../data/def/def.php'; // データベース接続設定ファイル

// セッションデータがない場合、フォームページにリダイレクト
if (!isset($_SESSION['form_data'])) {
    header('Location: analyzeForm.php');
    exit;
}

// 「修正する」ボタンを押した場合 → analyzeForm.php に遷移
if (isset($_GET['edit'])) {
    $_SESSION['from_confirm'] = true; // `analyzeForm.php` でデータを保持するためのフラグ
    header('Location: analyzeForm.php');
    exit;
}

// 入力データを取得
$form_data = $_SESSION['form_data'];

// データベース接続
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$conn) {
    die("データベース接続エラー: " . mysqli_connect_error());
}

// 質問をデータベースから取得
$questions = [];
$result = mysqli_query($conn, "SELECT question_key, question_text FROM questions");
while ($row = mysqli_fetch_assoc($result)) {
    $questions[$row['question_key']] = $row['question_text'];
}
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>入力内容の確認</title>
    <link rel="stylesheet" href="../css/confirm.css">
</head>

<body>
    <header>
        <h1>入力内容の確認</h1>
    </header>
    <main>
        <div class="container">
            <div class="card">
                <h2>以下の内容で送信します</h2>

                <form method="POST" action="./submit.php">
                    <?php foreach ($form_data as $key => $value): ?>
                        <div class="form-group">
                            <h3><?php echo isset($questions[$key]) ? htmlspecialchars($questions[$key], ENT_QUOTES, 'UTF-8') : htmlspecialchars($key); ?></h3>
                            <p><?php echo nl2br(htmlspecialchars($value, ENT_QUOTES, 'UTF-8')); ?></p>
                        </div>
                    <?php endforeach; ?>

                    <div class="button-group">
                        <!-- 「修正する」ボタンを押すと analyzeForm.php に遷移 -->
                        <a href="confirm.php?edit=true" class="button">修正する</a>
                        <button type="submit" class="button">送信する</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>