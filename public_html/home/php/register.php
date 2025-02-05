<?php
session_start();
include '../../../data/def/def.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? null;
    $name = $_POST['name'] ?? null;
    $password = $_POST['password'] ?? null;
    $confirmPassword = $_POST['confirm_password'] ?? null;

    // 入力チェック
    if (empty($email) || empty($name) || empty($password) || empty($confirmPassword)) {
        die('すべてのフィールドを入力してください。');
    }

    // パスワード一致チェック
    if ($password !== $confirmPassword) {
        die('パスワードが一致しません。');
    }

    // パスワード要件を確認（大文字、小文字、数字、8文字以上）
    $passwordRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/';
    if (!preg_match($passwordRegex, $password)) {
        die('パスワードは8文字以上で、大文字、小文字、数字を含めてください。');
    }

    // パスワードをハッシュ化
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        // データベース接続
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$conn) {
            throw new Exception('データベース接続に失敗しました: ' . mysqli_connect_error());
        }

        // メールアドレスが既に登録されているか確認
        $checkStmt = $conn->prepare('SELECT account_id FROM user WHERE email = ?');
        if (!$checkStmt) {
            throw new Exception('ステートメントの準備に失敗しました: ' . $conn->error);
        }
        $checkStmt->bind_param('s', $email);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            // メールアドレスが既に存在する場合
            echo '<script>alert("このメールアドレスは既に使用されています。ログイン画面に遷移します。");</script>';
            echo '<script>window.location.href = "login.php";</script>';
            exit;
        }
        $checkStmt->close();

        // 新規登録
        $stmt = $conn->prepare('INSERT INTO user (email, uname, password) VALUES (?, ?, ?)');
        if (!$stmt) {
            throw new Exception('ステートメントの準備に失敗しました: ' . $conn->error);
        }
        $stmt->bind_param('sss', $email, $name, $hashedPassword);

        // 実行
        if (!$stmt->execute()) {
            throw new Exception('データベースへの挿入に失敗しました: ' . $stmt->error);
        }

        // 成功時の処理
        echo '<script>alert("登録が完了しました。ログイン画面に遷移します。");</script>';
        echo '<script>window.location.href = "login.php";</script>';
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        die('エラー: ' . $e->getMessage());
    }
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>新規登録</title>
    <link rel="stylesheet" href="../css/register.css">
</head>

<body>
    <header>
        <h1>TrueHue - 新規登録</h1>
    </header>
    <main>
        <div class="container">
            <div class="card">
                <h2>新規登録</h2>
                <form id="registerForm" method="POST" action="register.php">
                    <label for="email">メールアドレス:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="name">ニックネーム:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="password">パスワード:</label>
                    <input type="password" id="password" name="password" required placeholder="大文字、小文字、数字を含む8文字以上">

                    <label for="confirm_password">パスワード確認:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>

                    <div id="passwordError" style="color: red; font-size: 0.9em;"></div>

                    <button class="button" type="submit">登録</button>
                </form>
                <p>既にアカウントをお持ちの方は <a href="login.php">ログイン</a></p>
            </div>
        </div>
    </main>
    <script src="../js/register.js"></script>
</body>

</html>