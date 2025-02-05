<?php
// セッションを開始
session_start();
include '../../../../data/def/def.php';

// セッションからaccount_idを取得
if (isset($_SESSION['account_id'])) {
    $account_id = $_SESSION['account_id'];
} else {
    $account_id = null;
}

// POSTデータの取得
$life_priority = filter_input(INPUT_POST, "life_priority", FILTER_SANITIZE_SPECIAL_CHARS);
$redo = filter_input(INPUT_POST, "redo", FILTER_SANITIZE_SPECIAL_CHARS);
$strength = filter_input(INPUT_POST, "strength", FILTER_SANITIZE_SPECIAL_CHARS);
$weakness = filter_input(INPUT_POST, "weakness", FILTER_SANITIZE_SPECIAL_CHARS);
$growth = filter_input(INPUT_POST, "growth", FILTER_SANITIZE_SPECIAL_CHARS);
$relationship_value = filter_input(INPUT_POST, "relationship_value", FILTER_SANITIZE_SPECIAL_CHARS);
$advice = filter_input(INPUT_POST, "advice", FILTER_SANITIZE_SPECIAL_CHARS);
$stress_management = filter_input(INPUT_POST, "stress_management", FILTER_SANITIZE_SPECIAL_CHARS);
$happiness = filter_input(INPUT_POST, "happiness", FILTER_SANITIZE_SPECIAL_CHARS);
$adaptability = filter_input(INPUT_POST, "adaptability", FILTER_SANITIZE_SPECIAL_CHARS);

// 入力チェック
$error = [
    "status" => true,
    "message" => null,
];

$required_fields = array($life_priority, $redo, $strength, $weakness, $growth, $relationship_value, $advice, $stress_management, $happiness, $adaptability);
foreach ($required_fields as $field) {
    if ($field == null) {
        $error["status"] = false;
        $error["message"] .= "NULLあり<br>";
    }
}

$sucsess = true;
$error_message = null;

if ($error["status"]) {
    try {
        // データベース接続
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($conn->connect_error) {
            throw new Exception("Connect failed: " . $conn->connect_error);
        }

        // INSERT文の準備
        $stmt = $conn->prepare("INSERT INTO " . TBL_ANS . " (account_id, memorable_event, accomplishment, lesson, core_values, compliment, coping, challenge_feelings, ideal_self, future_self, contribution) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            throw new Exception("プリペアドステートメントの準備に失敗しました: " . $conn->error);
        }
        $stmt->bind_param("issssssssss", $account_id, $life_priority, $redo, $strength, $weakness, $growth, $relationship_value, $advice, $stress_management, $happiness, $adaptability);

        if (!$stmt->execute()) {
            throw new Exception("データベースエラー: " . $stmt->error);
        }

        $stmt->close();
        $success = true;
    } catch (Exception $e) {
        $error_message = "エラー: " . $e->getMessage();
        $success = false;
    } finally {
        $conn->close();
    }
} else {
    $success = false;
    $error_message = $error["message"];
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ロード中</title>
    <link rel="stylesheet" href="../css/loding.css">
</head>

<body>
    <!-- ロード画面 -->
    <div id="loading" data-success="<?php echo $success ? 'true' : 'false'; ?>" data-error-message="<?php echo htmlspecialchars($error_message); ?>">
        <div class="spinner"></div>
        <p>Loading...</p>
    </div>

    <!-- 外部JSファイル -->
    <script src="../js/loading.js"></script>
</body>

</html>