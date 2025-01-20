<?php
// セッションを開始
session_start();
include '../../../data/def/def.php';

//名前をindex.phpから取得する
$uname = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);

//入力チェック
$error = [
    "status" => true,
    "message" => null
];

//NULL判定
if (!$uname) {
    $error["status"] = false;
    $error["message"] = '名前が入力されていません。';     //必要に応じて表示
}

//phpが最後まで実行されたかを確認するフラグ
$sucsess = true;

if ($error["status"]) {
    try {
        // データベース接続
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        // 接続チェック
        if ($conn->connect_error) {
            die("Connect failed: " . $conn->connect_error);
        }

        // プリペアドステートメントを使用してユーザー情報を挿入する
        $stmt = $conn->prepare("INSERT INTO " . TBL_USER . " (uname) VALUES (?)");
        if (!$stmt) {
            die(" プリペアドステートメントの準備に失敗しました: " . $conn->error);
        }

        $stmt->bind_param("s", $uname);

        // プリペアドステートメントを実行
        if (!$stmt->execute()) {
            throw new Exception("データベースエラー: " . $stmt->error);
        }

        // 成功した場合
        $error_message = "データが正常に登録されました";
        $stmt->close();
    } catch (mysqli_sql_exception $e) {
        $error_message = "データ登録に失敗されました";
    } catch (Exception $e) {
        $error_message = "データ登録に失敗されました";
        // エラーメッセージの表示
        $error_message = "エラー: " . $e->getMessage();
    }
    // データベースとの接続を閉じる
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrueHue - 登録画面</title>
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
            <form action="./analyzeForm.php" method="post">
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