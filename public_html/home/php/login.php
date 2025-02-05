<?php
session_start();
include '../../../data/def/def.php';

$errorMessage = ""; // エラーメッセージ用変数

// フォームが送信された場合
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password']; // パスワードはそのまま処理

    if (!$email || !$password) {
        $errorMessage = "メールアドレスまたはパスワードが入力されていません。";
    } else {
        // データベース接続
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (!$conn) {
            die("データベース接続エラー: " . mysqli_connect_error());
        }

        // ユーザー検索クエリ
        $stmt = $conn->prepare("SELECT account_id, password FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($account_id, $hashed_password);
            $stmt->fetch();

            // パスワード検証
            if (password_verify($password, $hashed_password)) {
                $_SESSION['account_id'] = $account_id; // セッションにユーザーIDを保存
                header('Location: remind.php'); // ログイン成功後にリダイレクト
                exit;
            } else {
                $errorMessage = "メールアドレスまたはパスワードが間違っています。";
            }
        } else {
            $errorMessage = "メールアドレスまたはパスワードが間違っています。";
        }

        $stmt->close();
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <header>
        <h1>TrueHue - 新規登録</h1>
    </header>
    <div class="container">
        <div class="card">
            <h2>ログイン</h2>
            <?php if (!empty($errorMessage)): ?>
                <div class="error-message">
                    <?php echo htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8'); ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="login.php">
                <div>
                    <label for="email">メールアドレス</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="password">パスワード</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="button">ログイン</button>
            </form>
            <p>アカウントをお持ちでないですか？ <a href="register.php">新規登録</a></p>
        </div>
    </div>
</body>

</html>