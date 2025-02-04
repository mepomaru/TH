<?php
session_start();
include '../../../data/def/def.php'; // データベース接続設定ファイル

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

// 初回アクセス時にセッションをクリア（remind.php から来た場合）
if ($_SERVER['REQUEST_METHOD'] === 'GET' && !isset($_SESSION['from_confirm'])) {
    unset($_SESSION['form_data']);
}

// confirm.php から戻った場合、セッションデータを保持
if (isset($_SESSION['from_confirm'])) {
    unset($_SESSION['from_confirm']);
}

// フォーム送信時（POST のみ処理）
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
    $_SESSION['form_data'] = $_POST;
    $_SESSION['from_confirm'] = true;
    header('Location: confirm.php');
    exit;
}

// フォームの初期値をセッションから取得
$form_data = $_SESSION['form_data'] ?? [];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>自己分析用フォーム</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/analyzeForm.css">
    <script src="../js/analyzeForm.js" defer></script>
</head>

<body>
    <header>
        <h1>自己分析用フォーム</h1>
    </header>
    <main>
        <div class="container">
            <div class="card">
                <form method="POST" action="analyzeForm.php">
                    <h2>自己分析の質問</h2>

                    <?php foreach ($questions as $key => $question): ?>
                        <div>
                            <label for="<?php echo $key; ?>">
                                <h3><?php echo htmlspecialchars($question, ENT_QUOTES, 'UTF-8'); ?></h3>
                            </label>
                            <textarea id="<?php echo $key; ?>" name="<?php echo $key; ?>" rows="7" cols="50" required><?php echo htmlspecialchars($form_data[$key] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                            <span id="<?php echo $key; ?>_count">0</span>文字
                        </div>
                    <?php endforeach; ?>

                    <button type="submit" class="button">確認画面へ</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>