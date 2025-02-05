<?php
session_start();
include '../../../data/def/def.php'; // データベース接続設定ファイル

// `$_SESSION['account_id']` がなければ `register.php` にリダイレクト
if (!isset($_SESSION['account_id'])) {
    header("Location: register.php");
    exit;
}

// ユーザーIDを取得
$account_id = $_SESSION['account_id'];

// データベース接続
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$conn) {
    die("データベース接続エラー: " . mysqli_connect_error());
}

// `user` テーブルから `uname` を取得
$sql = "SELECT uname FROM user WHERE account_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $account_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);
mysqli_close($conn);

// ユーザーが存在しない場合は登録画面へリダイレクト
if (!$user) {
    session_unset();
    session_destroy();
    header("Location: register.php");
    exit;
}

// `uname` をセッションに保存（リマインダー目的）
$_SESSION['uname'] = $user['uname'];
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrueHue - ご使用上の注意</title>
    <link rel="stylesheet" href="../css/remind.css">
</head>

<body>
    <!-- ヘッダー -->
    <header>
        <h1>TrueHue</h1>
    </header>

    <!-- 登録フォームのコンテナ -->
    <div class="container">
        <div class="card">
            <h2>ご利用の際の注意事項</h2>
            <form action="./analyzeForm.php" method="GET">
                <ul>
                    <li>この分析が必ずしも正しいとは限りません。<br>分析を参考としてご利用ください。</li>
                    <li>解答にご自身の名前を記入しないようにしてください。</li>
                    <li>できるだけ正直に解答してください。</li>
                </ul>
                <button type="submit" class="button">解答へ進む</button>
            </form>
        </div>
    </div>
</body>

</html>